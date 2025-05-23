<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Builder;

class RealEstate extends Model
{
    use HasFactory;
    protected $fillable = ['description','boundaries','location', 'province', 'status', 'price', 'commercial_number','advertisement_id','city_id'];


    // One-to-Many relationship with features
    public function features()
    {
        return $this->hasMany(Feature::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Polymorphic relationship
    public function realEstateable(): MorphTo
    {
        return $this->morphTo();
    }
    public function scopeBuildings(Builder $query): Builder
    {
        return $query->where('real_estateable_type', operator: Building::class);
    }

    public function scopeApartments(Builder $query): Builder
    {
        return $query->where('real_estateable_type', operator: Apartment::class);
    }

    public function scopeLands(Builder $query): Builder
    {
        return $query->where('real_estateable_type', operator: Land::class);
    }
     // Check if the object is a Building
     public function isBuilding(): bool
     {
         return $this->real_estateable_type === Building::class;
     }

     // Check if the object is an Apartment
     public function isApartment(): bool
     {
         return $this->real_estateable_type === Apartment::class;
     }

     // Check if the object is a Land
     public function isLand(): bool
     {
         return $this->real_estateable_type === Land::class;
     }

    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'favorites')->withTimestamps();
    }
    public function advertisement()
    {
        return $this->belongsTo(Advertisement::class, 'advertisement_id');
    }
}
