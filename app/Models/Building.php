<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Building extends Model
{
    use HasFactory;
    protected $fillable = ['floors_number','apartments_count'];

    // Polymorphic relationship
    public function realEstate(): MorphOne
    {
        return $this->morphOne(RealEstate::class, 'real_estateable');
    }
}
