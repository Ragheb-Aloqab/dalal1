<?php

namespace App\Services;

use App\Helpers\SearchHelpers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use App\Models\Advertisement;

class RealEstateSearchService
{
    /**
     * Parse and cache the search query.
     *
     * @param string $query
     * @return array
     */
    private function parseSearchQueryCached($query)
    {
        $cacheKey = 'parsed_query_' . md5($query);
        return Cache::remember($cacheKey, 60, function () use ($query) {
            return $this->parseSearchQuery($query);
        });
    }

    /**
     * Parse the user's search query.
     *
     * @param string $query
     * @return array
     */
    private function parseSearchQuery($query)
    {
        $query = mb_strtolower($query);
        $tokens = SearchHelpers::tokenize($query);
        $synonyms = SearchHelpers::getSynonyms();
        $stopWords = SearchHelpers::getStopWords();
        $citiesList = SearchHelpers::getCitiesList();
        $featuresList = SearchHelpers::getFeaturesList();

        $keywords = [];
        $filters = [];
        $prevToken = null;

        foreach ($tokens as $token) {
            $token = trim($token);
            if (in_array($token, $stopWords)) {
                continue; // Skip stop words
            }

            $tokenStemmed = SearchHelpers::stemWord($token);
            $matched = false;

            // Check for synonyms
            foreach ($synonyms as $standard => $syns) {
                if ($tokenStemmed === $standard || in_array($tokenStemmed, $syns)) {
                    // Determine the type of synonym and add to appropriate filters
                    if (in_array($standard, ['شقة', 'منزل', 'أرض', 'مبنى'])) {
                        $filters['property_type'][] = $standard;
                    } elseif (in_array($standard, ['للبيع', 'للإيجار'])) {
                        $filters['status'] = $standard === 'للبيع' ? 'sale' : 'rent';
                    } elseif (in_array($standard, $citiesList)) {
                        $filters['city'][] = $standard;
                    } elseif (in_array($standard, $featuresList)) {
                        $filters['features'][] = $standard;
                    } else {
                        $keywords[] = $standard;
                    }
                    $matched = true;
                    break;
                }
            }

            if ($matched) {
                $prevToken = null;
                continue;
            }

            // Check if token is a city
            if (in_array($token, $citiesList)) {
                $filters['city'][] = $token;
                $prevToken = null;
                continue;
            }

            // Check for numbers (e.g., price, rooms, etc.)
            if (is_numeric($token)) {
                if ($prevToken) {
                    if (in_array($prevToken, ['غرفة', 'غرف'])) {
                        $filters['rooms_number'] = (int)$token;
                    } elseif (in_array($prevToken, ['حمام', 'حمامات'])) {
                        $filters['bathrooms_number'] = (int)$token;
                    } elseif (in_array($prevToken, ['مساحة'])) {
                        $filters['area'] = (int)$token;
                    } elseif (in_array($prevToken, ['كم'])) { // 'كم' means 'km'
                        $filters['radius'] = (int)$token;
                    } elseif (in_array($prevToken, ['سعر', 'ثمن', 'قيمة', 'مبلغ'])) {
                        $filters['price'][] = (int)$token;
                    } else {
                        $filters['price'][] = (int)$token;
                    }
                } else {
                    $filters['price'][] = (int)$token;
                }
                $prevToken = null;
                continue;
            }

            // Check if token indicates a unit (e.g., 'كم' for kilometers)
            if (in_array($token, ['كم', 'ك', 'م'])) {
                $prevToken = $token;
                continue;
            }

            // If none matched, consider it a keyword
            $keywords[] = $tokenStemmed;
            $prevToken = null;
        }

        // Process price filters
        if (isset($filters['price'])) {
            $prices = array_map('intval', $filters['price']);
            $filters['min_price'] = min($prices);
            $filters['max_price'] = max($prices);
            unset($filters['price']);
        }

        return [
            'keywords' => $keywords,
            'filters' => $filters,
        ];
    }

    /**
     * Perform the real estate search based on user query.
     *
     * @param string $query
     * @return \Illuminate\Support\Collection
     */
    public function search($query)
    {
        // Parse and cache the search query
        $searchParams = $this->parseSearchQueryCached($query);
        $keywords = $searchParams['keywords'];
        $filters = $searchParams['filters'];

        // Build the initial query
        $adsQuery = Advertisement::with(['realEstate.city', 'realEstate.features', 'realEstate.realEstateable']);

        // Apply full-text search if keywords are present
        if (!empty($keywords)) {
            $keywordsString = implode(' ', $keywords);
            $adsQuery->where(function ($q) use ($keywordsString) {
                $q->whereRaw("MATCH(title, description) AGAINST(? IN NATURAL LANGUAGE MODE)", [$keywordsString]);
            });
        }

        // Apply other filters
        if (!empty($filters)) {
            // Price filter
            if (isset($filters['min_price']) && isset($filters['max_price'])) {
                $adsQuery->whereHas('realEstate', function ($q) use ($filters) {
                    $q->whereBetween('price', [$filters['min_price'], $filters['max_price']]);
                });
            }

            // Status filter
            if (isset($filters['status'])) {
                $adsQuery->whereHas('realEstate', function ($q) use ($filters) {
                    $q->where('status', $filters['status']);
                });
            }

            // Property type filter
            if (isset($filters['property_type'])) {
                $adsQuery->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                    $q->whereIn(DB::raw('LOWER(class_basename(real_estateables.real_estateable_type))'), array_map('mb_strtolower', $filters['property_type']));
                });
            }

            // City filter
            if (isset($filters['city'])) {
                $adsQuery->whereHas('realEstate.city', function ($q) use ($filters) {
                    $q->whereIn(DB::raw('LOWER(cities.name)'), array_map('mb_strtolower', $filters['city']));
                });
            }

            // Features filter
            if (isset($filters['features'])) {
                $adsQuery->whereHas('realEstate.features', function ($q) use ($filters) {
                    $q->whereIn(DB::raw('LOWER(features.name)'), array_map('mb_strtolower', $filters['features']));
                });
            }

            // Rooms number filter
            if (isset($filters['rooms_number'])) {
                $adsQuery->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                    $q->where('rooms_number', $filters['rooms_number']);
                });
            }

            // Bathrooms number filter
            if (isset($filters['bathrooms_number'])) {
                $adsQuery->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                    $q->where('bathrooms_number', $filters['bathrooms_number']);
                });
            }

            // Area filter
            if (isset($filters['area'])) {
                $adsQuery->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                    $q->where('area', $filters['area']);
                });
            }

            // Geospatial filter (proximity search)
            if (isset($filters['radius']) && isset($filters['city']) && !empty($filters['city'])) {
                // Assuming you have latitude and longitude for each city
                // Fetch the first city's coordinates
                $city = DB::table('cities')->whereIn('name', $filters['city'])->first();
                if ($city && isset($city->latitude) && isset($city->longitude)) {
                    $lat = $city->latitude;
                    $lng = $city->longitude;
                    $radius = $filters['radius'];

                    $adsQuery->select('*', DB::raw("(
                        6371 * acos(
                            cos(radians($lat)) *
                            cos(radians(real_estate.latitude)) *
                            cos(radians(real_estate.longitude) - radians($lng)) +
                            sin(radians($lat)) *
                            sin(radians(real_estate.latitude))
                        )
                    ) AS distance"))
                    ->having("distance", "<", $radius)
                    ->orderBy("distance", 'asc');
                }
            }
        }

        // Execute the query and get the results
        $ads = $adsQuery->get();

        // Calculate scores
        $adsWithScores = $ads->map(function ($ad) use ($searchParams) {
            $score = SearchHelpers::scoreAdvertisement($ad, $searchParams);
            $ad->score = $score;
            return $ad;
        });

        // Sort ads by score in descending order
        $sortedAds = $adsWithScores->sortByDesc('score')->values();

        // Cache the search results
        $cacheKey = 'search_results_' . md5($query);
        Cache::put($cacheKey, $sortedAds, 300); // Cache for 5 minutes

        return $sortedAds;
    }
}
