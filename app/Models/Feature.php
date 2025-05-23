<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $fillable = ['name','real_estate_id'];

    // Belongs to RealEstate
    public function realEstate()
    {
        return $this->belongsTo(RealEstate::class);
    }
}
