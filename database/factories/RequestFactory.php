<?php

namespace Database\Factories;

use App\Models\Request;
use App\Models\Response;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    protected $model = Request::class;

    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id, // Associate with a random user
            'request_type' => $this->faker->randomElement(['support', 'complaint', 'inquiry','viewing']),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected', 'completed']),
        ];
    }
}
