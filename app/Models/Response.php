<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;
    protected $fillable = ['provider_id', 'request_id', 'has_ads','answer'];

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    public function request()
    {
        return $this->belongsTo(Request::class);
    }

    public function advertisements()
    {
        return $this->belongsToMany(Advertisement::class, 'advertisement_response');
    }
}
