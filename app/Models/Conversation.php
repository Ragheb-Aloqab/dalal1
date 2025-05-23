<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = ['user_id1', 'user_id2'];

    public function user1()
    {
        return $this->belongsTo(User::class,  'user_id1');
    }

    // Define user2 relationship explicitly with foreign key
    public function user2()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id2');
    }
    public function messages()
    {
        return $this->hasMany(Message::class);
    }


    public static function getUserConversations($authUserId)
    {
        return self::where('user_id1', $authUserId)
                    ->orWhere('user_id2', $authUserId)
                    ->with(['messages' => function ($query) {
                        // Load the latest message first
                        $query->latest()->first();
                    }, 'user1', 'user2'])
                    ->get()
                    ->map(function ($conversation) use ($authUserId) {
                        // Determine who the other user is in the conversation
                        $otherUser = $conversation->user_id1 == $authUserId ? $conversation->user2 : $conversation->user1;

                        // Get the last message and date
                        $lastMessage = $conversation->messages->first();

                        return [
                            'conversation_id' => $conversation->id,
                            'other_user_id' => $otherUser->id,
                            'other_user_name' => $otherUser->name,
                            'other_user_image' => $otherUser->profile_image, // Assuming there's a profile image field
                            'last_message' => $lastMessage ? $lastMessage->content : 'No messages yet',
                            'last_message_date' => $lastMessage ? $lastMessage->created_at->format('Y-m-d H:i:s') : null,
                        ];
                    });
    }


    public static function getUserConversation($user1_id, $user2_id)
    {
        // Find the conversation where the two users are participants
        $conversation = self::where(function ($query) use ($user1_id, $user2_id) {
            $query->where('user1', $user1_id)
                ->where('user2', $user2_id);
        })
            ->orWhere(function ($query) use ($user1_id, $user2_id) {
                $query->where('user1', $user2_id)
                    ->where('user2', $user1_id);
            })
            // Eager load the messages associated with the conversation
            ->with('messages')
            ->first();

        return $conversation;
    }
}
