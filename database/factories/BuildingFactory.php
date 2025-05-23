<?php

namespace Database\Factories;

use App\Models\Building;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Building>
 */
class BuildingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Building::class;

    public function definition()
    {
        return [
            'floors_number' => $this->faker->numberBetween(1, 20),
            'apartments_count' => $this->faker->numberBetween(1, 20),
        ];
    }
}
