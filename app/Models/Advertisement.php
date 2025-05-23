<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'provider_id',
        'status',
    ];
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function realEstate()
    {
        return $this->hasOne(RealEstate::class, 'advertisement_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'advertisement_user')
            ->withTimestamps();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function views()
    {
        return $this->hasMany(View::class);
    }
    public function shares()
    {
        return $this->hasMany(Share::class);
    }

    public function responses()
    {
        return $this->belongsToMany(Response::class, 'advertisement_response');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    // Method to calculate the average rating
    public function averageRating()
    {
        return $this->ratings()->avg('rating');
    }
    public function scopeWithBuildings($query)
    {
        return $query->whereHas('realEstate', function ($q) {
            $q->buildings(); // Use the scope from RealEstate model
        });
    }

    public function scopeWithApartments($query)
    {
        return $query->whereHas('realEstate', function ($q) {
            $q->apartments();
        });
    }

    public function scopeWithLands($query)
    {
        return $query->whereHas('realEstate', function ($q) {
            $q->lands();
        });
    }
    // Search scope
    public function scopeSearchApartment(Builder $query, array $filters): Builder
    {

        $query->whereHas('realEstate', function ($q) {
            $q->apartments();
        });

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

        return $query;
    }

    public function scopeSearchBuilding(Builder $query, array $filters): Builder
    {
        $query->whereHas('realEstate', function ($q) {
            $q->buildings();
        });

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

        if (!empty($filters['floors_number'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('floors_number', '>=', $filters['floors_number']);
            });
        }

        if (!empty($filters['apartments_count'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('apartments_count', '>=', $filters['apartments_count']);
            });
        }


        return $query;
    }
    public function scopeSearchLand(Builder $query, array $filters): Builder
    {
        $query->whereHas('realEstate', function ($q) {
            $q->lands();
        });

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

        if (!empty($filters['area'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('area', '>=', $filters['area']);
            });
        }

        if (!empty($filters['water'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('water', '>=', $filters['water']);
            });
        }
        if (!empty($filters['electricity'])) {
            $query->whereHas('realEstate.realEstateable', function ($q) use ($filters) {
                $q->where('electricity', '>=', $filters['electricity']);
            });
        }


        return $query;
    }
}
