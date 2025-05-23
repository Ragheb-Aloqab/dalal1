<?php

namespace Database\Factories;

use App\Models\Apartment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Apartment::class;

    public function definition()
    {
        return [
            'floor_number' => $this->faker->numberBetween(1, 30), // Floor number between 1 and 30
            'rooms_number' => $this->faker->numberBetween(1, 5), // Number of rooms between 1 and 5
            'bathrooms_number' => $this->faker->numberBetween(1, 3), // Number of bathrooms between 1 and 3
            'kitchens_number' => $this->faker->numberBetween(1, 2), // Number of kitchens between 1 and 2
            'condition' => $this->faker->randomElement(['new', 'old']), // Condition of the apartment
        ];
    }
}
