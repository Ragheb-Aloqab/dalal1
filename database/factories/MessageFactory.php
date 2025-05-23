<?php

namespace Database\Factories;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    protected $model = Message::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'conversation_id' => Conversation::inRandomOrder()->value('id'), // Pluck from database
            'sender_id' => User::inRandomOrder()->value('id'),                // Pluck from database
            'receiver_id' => User::inRandomOrder()->value('id'),              // Pluck from database
            'content' => $this->faker->sentence,
            'image' => $this->faker->optional()->imageUrl(),
            'read' => $this->faker->boolean(),
            'read_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
