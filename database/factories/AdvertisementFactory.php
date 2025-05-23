<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdvertisementFactory extends Factory
{
    protected $model = Advertisement::class;

    public function definition()
    {
        return [
            'title'=>$this->faker->sentence(10),
            'views_count' => $this->faker->numberBetween(0, 1000),
            'shares_count' => $this->faker->numberBetween(0, 1000),
            'rating' => $this->faker->optional()->randomFloat(2, 1, 5),
            'likes_count' => $this->faker->numberBetween(0, 1000),
            'status' => $this->faker->randomElement(['active', 'inactive', 'expired']),
            'provider_id' => Provider::inRandomOrder()->first()->id, // Random provider
        ];
    }
}
