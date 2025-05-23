<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Apartment extends Model
{
    use HasFactory;
    protected $fillable = ['floor_number', 'rooms_number','bathrooms_number','kitchens_number','condition'];

    // Polymorphic relationship
    public function realEstate(): MorphOne
    {
        return $this->morphOne(RealEstate::class, 'realEstateable');
    }
}
