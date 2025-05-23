<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Client extends Model
{
    use HasFactory;
    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'userable');
    }
    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    // If you want to get all messages sent by a client
    public function sentMessages()
    {
        return $this->hasMany(Message::class, 'sender_id');
    }

    // If you want to get all messages received by a client
    public function receivedMessages()
    {
        return $this->hasMany(Message::class, 'receiver_id');
    }
}
