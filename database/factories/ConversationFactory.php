<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Conversation;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Conversation>
 */
class ConversationFactory extends Factory
{
    protected $model = Conversation::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $user1 = User::clients()->inRandomOrder()->value('id');
        // do {
        //     $user1 = User::inRandomOrder()->value('id');
        // } while ($user1 !== 9);
        $user2 = 1;

        return [
            'user_id1' => $user1,
            'user_id2' => $user2,
        ];
    }
}
