<?php

namespace Database\Seeders;

use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $conversations =  Conversation::factory()
            ->count(10)
            ->create();
        $conversations->each(function ($con) {
            Message::factory()->count(20)->create(function () use ($con) {
                // Randomly pick who will be the sender and receiver, ensuring they are not the same
                $isUser1Sender = random_int(0, 1) === 1;
                return [
                    'conversation_id' => $con->id,
                    'sender_id' => $isUser1Sender ? $con->user_id1 : $con->user_id2,
                    'receiver_id' => $isUser1Sender ? $con->user_id2 : $con->user_id1,
                ];
            });
        });
    }
}
