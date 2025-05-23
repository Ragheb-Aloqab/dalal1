<?php

namespace Database\Factories;

use App\Models\Follow;
use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FollowFactory extends Factory
{
    protected $model = Follow::class;

    public function definition()
    {
        // Get all user_ids and provider_ids
        $userIds = User::clients()->pluck('id')->toArray();
        $providerIds = Provider::pluck('id')->toArray();

        // Initialize user_id and provider_id
        $userId = $this->faker->randomElement($userIds);
        $providerId = 1;

        // Ensure the user does not follow themselves (i.e., user_id != provider_id)
        // while ($userId == $providerId) {
        //     $providerId = $this->faker->randomElement($providerIds);
        // }

        return [
            'user_id' => $userId,
            'provider_id' => $providerId,
        ];
    }
}
