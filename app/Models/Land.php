<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Land extends Model
{
    use HasFactory;
    protected $fillable = ['area','water','electricity','sewage','gas','access'];

    // Polymorphic relationship
    public function realEstate()
    {
        return $this->morphOne(RealEstate::class, 'realEstateable');
    }

}
