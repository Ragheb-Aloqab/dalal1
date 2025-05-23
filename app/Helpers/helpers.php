<?php

use App\Models\User;
use App\Services\RecommendationService;
use Illuminate\Support\Facades\Auth;

if (!function_exists('get_user_recommendations')) {
    /**
     * Get recommendations for the authenticated user or a specific user ID.
     *
     * @param int|null $userId
     * @param int $limit
     * @return \Illuminate\Support\Collection
     */
    function get_user_recommendations($userId = null, $limit = 10)
    {
        $user = $userId ? User::find($userId) : Auth::user();

        if (!$user) {
            return collect(); // Return empty collection if user is not found
        }

        $recommendationService = new RecommendationService();

        return $recommendationService->getUserRecommendations($user, $limit);
    }
}






if (!function_exists('levenshtein_distance')) {
    /**
     * Calculate the Levenshtein distance between two strings.
     *
     * @param string $str1
     * @param string $str2
     * @return int
     */
    function levenshtein_distance($str1, $str2)
    {
        return levenshtein(mb_strtolower($str1), mb_strtolower($str2));
    }
}

if (!function_exists('get_synonyms')) {
    /**
     * Get an array of synonyms.
     *
     * @return array
     */
    function get_synonyms()
    {
        return [
            // Property Types
            'شقة' => ['شقه', 'شقق', 'apartment', 'flat', 'unit', 'condo', 'دار', 'مسكن'],
            'منزل' => ['بيت', 'مسكن', 'home', 'residence', 'فيلا', 'villa', 'دور'],
            'أرض' => ['ارض', 'قطعة', 'قطعة أرض', 'land', 'lot', 'plaza', 'مزرعة'],
            'مبنى' => ['عمارة', 'بناية', 'building', 'برج', 'tower', 'مجمع'],

            // Property Status
            'للبيع' => ['بيع', 'متاح للبيع', 'sale', 'for sale', 'شراء', 'مطلوب للبيع'],
            'للإيجار' => ['إيجار', 'متاح للإيجار', 'rent', 'for rent', 'استئجار', 'مطلوب للإيجار'],

            // Rooms
            'غرفة' => ['غرف', 'غرفه', 'room', 'rooms', 'نوم', 'نومه'],

            // Bathrooms
            'حمام' => ['حمامات', 'حمام', 'bathroom', 'bathrooms', 'دورة مياه', 'دورات مياه'],

            // Price
            'سعر' => ['قيمة', 'ثمن', 'price', 'cost', 'budget', 'مبلغ'],

            // Area
            'مساحة' => ['مساحه', 'area', 'size', 'مساحة الأرض', 'متمساحة', 'متر'],

            // Features
            'مسبح' => ['حمام سباحة', 'بركة', 'pool', 'swimming pool', 'بسين'],
            'حديقة' => ['حديقه', 'garden', 'yard', 'جنينة'],
            'موقف سيارات' => ['موقف', 'مواقف', 'parking', 'garage', 'كراج'],
            'مصعد' => ['اسانسير', 'elevator', 'lift'],
            'تكييف' => ['مكيف', 'تكييف مركزي', 'air conditioning', 'AC'],

            // Yemeni Cities
            'صنعاء' => ['صنعاء', 'sana\'a', 'sanaa', 'sana'],
            'عدن' => ['عدن', 'aden'],
            'تعز' => ['تعز', 'taiz'],
            'المكلا' => ['المكلا', 'mukalla'],
            'الحديدة' => ['الحديدة', 'hodeidah', 'hodeida'],
            'إب' => ['اب', 'إب', 'ibb'],
            'البيضاء' => ['البيضاء', 'al-bayda'],
            'الجوف' => ['الجوف', 'al-jawf'],
            'شبوة' => ['شبوة', 'shabwah'],
            'الضالع' => ['الضالع', 'aldhale'],
            'لحج' => ['لحج', 'lahij'],
            'العبدية' => ['العبدية', 'al-abdiyah'],
            'صعدة' => ['صعدة', 'saada', 'saadah'],
            'مارب' => ['مارب', 'مأرب', 'marib'],
            'ريمة' => ['ريمة', 'raymah'],
            'المحويت' => ['المحويت', 'al-mahwit'],
            'ذمار' => ['ذمار', 'dhamar'],
            'سقطرى' => ['سقطرى', 'socotra'],
            'حجة' => ['حجة', 'hajjah'],
            'أبين' => ['أبين', 'abyan'],
            'التراث' => ['التراث', 'althurath'],
            'العاصمة' => ['العاصمة', 'capital'],
            // Add more cities as needed
        ];
    }
}

if (!function_exists('stem_word')) {
    /**
     * Reduce a word to its base form (simple stemming).
     *
     * @param string $word
     * @return string
     */
    function stem_word($word)
    {
        // Simple Arabic stemming by removing common prefixes and suffixes
        $prefixes = ['ال', 'و', 'ف', 'ب', 'ك', 'ل', 'لل'];
        $suffixes = ['ه', 'ها', 'ك', 'ي', 'ية', 'ين', 'ون', 'ات', 'ان', 'تان', 'تين', 'هما', 'نا', 'كم', 'هم', 'هن', 'ا', 'وا'];

        // Remove prefixes
        foreach ($prefixes as $prefix) {
            if (mb_substr($word, 0, mb_strlen($prefix)) == $prefix) {
                $word = mb_substr($word, mb_strlen($prefix));
                break;
            }
        }

        // Remove suffixes
        foreach ($suffixes as $suffix) {
            if (mb_substr($word, -mb_strlen($suffix)) == $suffix) {
                $word = mb_substr($word, 0, -mb_strlen($suffix));
                break;
            }
        }

        return $word;
    }
}

if (!function_exists('get_stop_words')) {
    /**
     * Get a list of Arabic stop words.
     *
     * @return array
     */
    function get_stop_words()
    {
        return [
            'في', 'على', 'من', 'إلى', 'عن', 'مع', 'هذا', 'هذه', 'ذلك', 'تلك', 'ما', 'ماذا', 'لماذا', 'هل', 'هو', 'هي', 'هم', 'هن',
            'أنا', 'نحن', 'أنت', 'أنتم', 'أنتن', 'الذي', 'التي', 'الذين', 'اللاتي', 'اللاتي', 'و', 'أو', 'لكن', 'إذا', 'لأن', 'كما',
            'حتى', 'ثم', 'حيث', 'أي', 'أين', 'كيف', 'لم', 'لا', 'لماذا', 'لن', 'ليس', 'إن', 'أن', 'إذن', 'إلا', 'ب', 'ك', 'ل', 'ال',
            'و', 'ف', 'هناك', 'هنا', 'كل', 'فيه', 'فيها', 'عند', 'أيضاً', 'ايضا', 'قد', 'لقد', 'مازال', 'ما زال', 'ما يزال',
            // Add more stop words as needed
        ];
    }
}

if (!function_exists('get_cities_list')) {
    /**
     * Get a list of Yemeni city names.
     *
     * @return array
     */
    function get_cities_list()
    {
        return [
            'صنعاء',
            'عدن',
            'تعز',
            'حضرموت',
            'الحديدة',
            'إب',
            'الجوف',
            'شبوة',
            'المحويت',
            'ذمار',
            'حجة',
        ];
    }
}

if (!function_exists('get_features_list')) {
    /**
     * Get a list of available features.
     *
     * @return array
     */
    function get_features_list()
    {
        // Assuming features are stored in the database
        // Fetch feature names and convert to lowercase
        return \App\Models\Feature::pluck('name')->map(function ($name) {
            return mb_strtolower($name);
        })->unique()->toArray();
    }
}

if (!function_exists('parse_search_query')) {
    /**
     * Parse the user's search query.
     *
     * @param string $query
     * @return array
     */
    function parse_search_query($query)
    {
        $query = mb_strtolower($query);
        $tokens = preg_split('/\s+/', $query);
        $synonyms = get_synonyms();
        $stopWords = get_stop_words();

        $keywords = [];
        $filters = [];
        $prevToken = null;

        foreach ($tokens as $token) {
            $token = trim($token);
            if (in_array($token, $stopWords)) {
                continue; // Skip stop words
            }

            $tokenStemmed = stem_word($token);
            $matched = false;

            // Check for synonyms
            foreach ($synonyms as $standard => $syns) {
                if ($tokenStemmed == $standard || in_array($tokenStemmed, $syns)) {
                    // Determine the type of synonym and add to appropriate filters
                    if (in_array($standard, ['شقة', 'منزل', 'أرض', 'مبنى'])) {
                        $filters['property_type'][] = $standard;
                    } elseif (in_array($standard, ['للبيع', 'للإيجار'])) {
                        $filters['status'] = $standard == 'للبيع' ? 'sale' : 'rent';
                    } elseif (in_array($standard, get_cities_list())) {
                        $filters['city'][] = $standard;
                    } elseif (in_array($standard, get_features_list())) {
                        $filters['features'][] = $standard;
                    } else {
                        $keywords[] = $standard;
                    }
                    $matched = true;
                    break;
                }
            }

            if (!$matched) {
                // Check for numbers
                if (is_numeric($token)) {
                    if ($prevToken) {
                        if (in_array($prevToken, ['غرفة', 'غرف'])) {
                            $filters['rooms_number'] = (int)$token;
                        } elseif (in_array($prevToken, ['حمام', 'حمامات'])) {
                            $filters['bathrooms_number'] = (int)$token;
                        } elseif (in_array($prevToken, ['مساحة'])) {
                            $filters['area'] = (int)$token;
                        } elseif (in_array($prevToken, ['سعر'])) {
                            $filters['price'][] = $token;
                        } else {
                            $filters['price'][] = $token;
                        }
                    } else {
                        $filters['price'][] = $token;
                    }
                    $matched = true;
                } else {
                    $keywords[] = $tokenStemmed;
                }
            }

            $prevToken = $tokenStemmed;
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
}

if (!function_exists('score_advertisement')) {
    /**
     * Calculate a relevance score for an advertisement based on the search parameters.
     *
     * @param \App\Models\Advertisement $ad
     * @param array $searchParams
     * @return int
     */
    function score_advertisement($ad, $searchParams)
    {
        $score = 0;
        $keywords = $searchParams['keywords'];
        $filters = $searchParams['filters'];

        // Combine advertisement text fields
        $adText = mb_strtolower($ad->title . ' ' . ($ad->realEstate->description ?? ''));

        // Increase score for each keyword match
        foreach ($keywords as $keyword) {
            if (mb_strpos($adText, $keyword) !== false) {
                $score += 10;
            } else {
                // Check for fuzzy match using Levenshtein distance
                $words = preg_split('/\s+/', $adText);
                foreach ($words as $word) {
                    $word = stem_word($word);
                    $distance = levenshtein_distance($keyword, $word);
                    if ($distance <= 2) { // Allow up to 2 edits
                        $score += 5;
                        break;
                    }
                }
            }
        }

        // Adjust score based on filters

        // Price filter
        if (isset($filters['min_price']) && isset($filters['max_price'])) {
            $price = $ad->realEstate->price ?? 0;
            if ($price >= $filters['min_price'] && $price <= $filters['max_price']) {
                $score += 10;
            }
        }

        // Status filter
        if (isset($filters['status'])) {
            $status = mb_strtolower($ad->realEstate->status ?? '');
            if ($status == $filters['status']) {
                $score += 8;
            }
        }

        // Property type filter
        if (isset($filters['property_type'])) {
            $propertyType = mb_strtolower(class_basename($ad->realEstate->realEstateable));
            if (in_array($propertyType, $filters['property_type'])) {
                $score += 12;
            }
        }

        // City filter
        if (isset($filters['city'])) {
            $cityName = mb_strtolower($ad->realEstate->city->name ?? '');
            if (in_array($cityName, $filters['city'])) {
                $score += 7;
            }
        }

        // Features filter
        if (isset($filters['features']) && $ad->realEstate->features) {
            $adFeatures = $ad->realEstate->features->pluck('name')->map(function ($name) {
                return mb_strtolower($name);
            })->toArray();

            foreach ($filters['features'] as $feature) {
                if (in_array($feature, $adFeatures)) {
                    $score += 3;
                }
            }
        }

        // Rooms number filter
        if (isset($filters['rooms_number'])) {
            $roomsNumber = null;
            if ($ad->realEstate->realEstateable instanceof \App\Models\Apartment) {
                $roomsNumber = $ad->realEstate->realEstateable->rooms_number;
            }

            if ($roomsNumber !== null && $roomsNumber == $filters['rooms_number']) {
                $score += 6;
            }
        }

        // Bathrooms number filter
        if (isset($filters['bathrooms_number'])) {
            $bathroomsNumber = null;
            if ($ad->realEstate->realEstateable instanceof \App\Models\Apartment) {
                $bathroomsNumber = $ad->realEstate->realEstateable->bathrooms_number;
            }

            if ($bathroomsNumber !== null && $bathroomsNumber == $filters['bathrooms_number']) {
                $score += 4;
            }
        }

        // Area filter
        if (isset($filters['area'])) {
            $area = null;
            if ($ad->realEstate->realEstateable instanceof \App\Models\Land) {
                $area = $ad->realEstate->realEstateable->area;
            } elseif ($ad->realEstate->realEstateable instanceof \App\Models\Apartment) {
                $area = $ad->realEstate->realEstateable->area ?? null;
            }

            if ($area !== null && $area == $filters['area']) {
                $score += 5;
            }
        }

        // You can add more scoring rules based on other features or custom logic

        return $score;
    }
}


