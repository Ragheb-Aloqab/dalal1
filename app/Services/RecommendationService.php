<?php

namespace App\Services;

use App\Models\Advertisement;
use App\Models\User;
use App\Models\UserInteraction;
use Illuminate\Support\Facades\DB;

class RecommendationService
{
    public function getUserRecommendations(User $user, $limit = 10)
    {
        // Fetch user interactions
        $userInteractions = $this->getUserInteractions($user);

        if ($userInteractions->isEmpty()) {
            // If no interactions, return popular advertisements
            return $this->getPopularAdvertisements($limit);
        }

        // Build user profile vector
        $userProfile = $this->buildUserProfile($userInteractions);

        // Get advertisement feature matrix
        $advertisementFeatures = $this->getAdvertisementFeatures();

        // Calculate similarity scores
        $recommendations = $this->calculateSimilarity($userProfile, $advertisementFeatures);

        // Exclude advertisements the user has already interacted with
        $interactedAdvertisementIds = $userInteractions->pluck('advertisement_id')->unique();

        $recommendationIds = $recommendations
            ->whereNotIn('advertisement_id', $interactedAdvertisementIds)
            ->sortByDesc('score')
            ->take($limit)
            ->pluck('advertisement_id');

        // Fetch the recommended advertisements
        return Advertisement::whereIn('id', $recommendationIds)->get();
    }

    protected function getUserInteractions(User $user)
    {
        return UserInteraction::where('user_id', $user->id)->get();
    }

    protected function getPopularAdvertisements($limit)
    {
        // You can define popularity based on views, likes, etc.
        return Advertisement::withCount('views')
            ->orderBy('views_count', 'desc')
            ->take($limit)
            ->get();
    }

    protected function buildUserProfile($userInteractions)
    {
        // Assign weights to interaction types
        $interactionWeights = [
            'view' => 1,
            'like' => 2,
            'share' => 3,
            'rating' => 4,
            'favorite' => 5,
        ];

        // Calculate weighted features for each advertisement the user interacted with
        $weightedFeatures = [];

        foreach ($userInteractions as $interaction) {
            $advertisement = $interaction->advertisement;
            $realEstate = $advertisement->realEstate;

            if (!$realEstate) {
                continue;
            }

            $features = $this->extractFeatures($realEstate);
            $weight = $interactionWeights[$interaction->interaction_type] ?? 1;

            foreach ($features as $feature => $value) {
                if (!isset($weightedFeatures[$feature])) {
                    $weightedFeatures[$feature] = 0;
                }
                $weightedFeatures[$feature] += $value * $weight;
            }
        }

        return $weightedFeatures;
    }

    protected function getAdvertisementFeatures()
    {
        $advertisements = Advertisement::with('realEstate')->where('status', 'active')->get();

        $advertisementFeatures = collect();

        foreach ($advertisements as $advertisement) {
            $realEstate = $advertisement->realEstate;

            if (!$realEstate) {
                continue;
            }

            $features = $this->extractFeatures($realEstate);
            $features['advertisement_id'] = $advertisement->id;

            $advertisementFeatures->push($features);
        }

        return $advertisementFeatures;
    }

    protected function extractFeatures($realEstate)
    {
        // Extract features from the real estate object
        $features = [
            'price' => $realEstate->price,
            'city_id' => $realEstate->city_id,
            'status' => $realEstate->status == 'sale' ? 1 : 0,
            // Add more features as needed
        ];

        // One-hot encode categorical features
        $features['city_' . $realEstate->city_id] = 1;

        // Add features from the polymorphic realEstateable relationship
        $realEstateable = $realEstate->realEstateable;

        if ($realEstateable) {
            $type = class_basename($realEstateable);
            $features['type_' . $type] = 1;

            // Add specific attributes based on the type
            if ($type == 'Apartment') {
                $features['rooms_number'] = $realEstateable->rooms_number;
                // Add more Apartment features
            } elseif ($type == 'Land') {
                $features['area'] = $realEstateable->area;
                // Add more Land features
            } elseif ($type == 'Building') {
                $features['floors_number'] = $realEstateable->floors_number;
                // Add more Building features
            }
        }

        return $features;
    }

    protected function calculateSimilarity($userProfile, $advertisementFeatures)
    {
        $recommendations = collect();

        foreach ($advertisementFeatures as $features) {
            $advertisementId = $features['advertisement_id'];
            unset($features['advertisement_id']);

            // Calculate cosine similarity
            $dotProduct = $this->dotProduct($userProfile, $features);
            $userProfileMagnitude = $this->magnitude($userProfile);
            $featuresMagnitude = $this->magnitude($features);

            if ($userProfileMagnitude * $featuresMagnitude == 0) {
                $similarity = 0;
            } else {
                $similarity = $dotProduct / ($userProfileMagnitude * $featuresMagnitude);
            }

            $recommendations->push([
                'advertisement_id' => $advertisementId,
                'score' => $similarity,
            ]);
        }

        return $recommendations;
    }

    protected function dotProduct($vectorA, $vectorB)
    {
        $result = 0;

        foreach ($vectorA as $key => $value) {
            if (isset($vectorB[$key])) {
                $result += $value * $vectorB[$key];
            }
        }

        return $result;
    }

    protected function magnitude($vector)
    {
        $sum = 0;

        foreach ($vector as $value) {
            $sum += $value * $value;
        }

        return sqrt($sum);
    }
}
