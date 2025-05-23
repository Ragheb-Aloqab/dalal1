<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'province',
        'location',
        'commercial_number',
        'commercial_certificate_image',
        'personal_id_image',
        'personal_id_number',
        'account_status',
    ];


    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }
    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
 
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    // If you want to get all messages sent by a provider
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // If you want to get all messages received by a provider
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
    public function advertisements(){
        return $this->hasMany(Advertisement::class,'provider_id');
    }
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'provider_id', 'user_id');
    }
}
