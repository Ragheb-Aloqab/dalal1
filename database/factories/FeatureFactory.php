<?php

namespace Database\Factories;

use App\Models\Feature;
use App\Models\RealEstate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Feature>
 */
class FeatureFactory extends Factory
{
    protected $model = Feature::class;

    public function definition()
    {
        // Create a random RealEstate or use an existing one
        $realEstate = RealEstate::inRandomOrder()->first();
        if (!$realEstate) {
            $realEstate = RealEstate::factory()->create();
        }

        return [
            'real_estate_id' => $realEstate->id,
            'name' => $this->faker->word,
        ];
    }
}
