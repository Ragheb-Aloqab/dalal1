<?php

namespace Database\Factories;

use App\Models\Feedback;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feedback>
 */
class FeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Feedback::class;

    public function definition()
    {
        return [
            'user_id' => User::pluck('id')->random(), // Pluck a random user_id
            'content' => $this->faker->paragraph, // Generate random content
            'rating' => $this->faker->numberBetween(1, 5), // Generate a random rating between 1 and 5
            'type' => $this->faker->randomElement(['general', 'complaint', 'suggestion']), // Randomly select a type
            'admin_response' => $this->faker->sentence, // Generate a random admin response (optional)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
