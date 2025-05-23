<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;
    // protected $table = 'follows';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }
    public static function isFollowing($userId, $providerId)
    {
        return self::where('user_id', $userId)
                   ->where('provider_id', $providerId)
                   ->exists();
    }
}
