<?php

namespace App\Services;

use App\Models\Advertisement;
use Illuminate\Database\Eloquent\Builder;

class AdvertisementSearch
{
    public function search(array $filters): Builder
    {
        $query = Advertisement::query();

        // Apply basic search filters
        $this->applyBasicSearchFilters($query, $filters);

        // Apply real estate filters
        $this->applyRealEstateSearchFilters($query, $filters);

        // Apply rating filters
        $this->applyRatingSearchFilters($query, $filters);

        return $query;
    }

    protected function applyBasicSearchFilters(Builder $query, array $filters): void
    {
        if (!empty($filters['title'])) {
            $query->where('title', 'like', '%' . $filters['title'] . '%');
        }

        if (!empty($filters['provider_id'])) {
            $query->where('provider_id', $filters['provider_id']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }
    }

    protected function applyRealEstateSearchFilters(Builder $query, array $filters): void
    {
        if (!empty($filters['price_min'])) {
            $query->whereHas('realEstate', function ($q) use ($filters) {
                $q->where('price', '>=', $filters['price_min']);
            });
        }

        if (!empty($filters['price_max'])) {
            $query->whereHas('realEstate', function ($q) use ($filters) {
                $q->where('price', '<=', $filters['price_max']);
            });
        }

        if (!empty($filters['city_id'])) {
            $query->whereHas('realEstate.city', function ($q) use ($filters) {
                $q->where('id', $filters['city_id']);
            });
        }

        if (!empty($filters['rooms_number'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('rooms_number', '>=', $filters['rooms_number']);
            });
        }

        if (!empty($filters['bathrooms_number'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('bathrooms_number', '>=', $filters['bathrooms_number']);
            });
        }

        if (!empty($filters['condition'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('condition', $filters['condition']);
            });
        }
    }

    protected function applyRatingSearchFilters(Builder $query, array $filters): void
    {
        if (!empty($filters['average_rating'])) {
            $query->whereHas('ratings', function ($q) use ($filters) {
                $q->selectRaw('advertisement_id, AVG(rating) as avg_rating')
                    ->groupBy('advertisement_id')
                    ->having('avg_rating', '>=', $filters['average_rating']);
            });
        }
    }
}
