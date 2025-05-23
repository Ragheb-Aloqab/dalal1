<?php

namespace Database\Factories;

use App\Models\Provider;
use App\Models\Request;
use App\Models\Response;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Response>
 */
class ResponseFactory extends Factory
{


    protected $model = Response::class;

    public function definition()
    {
        return [
            'request_id' => Request::inRandomOrder()->first()->id, // Associate with a random request
            'provider_id' => Provider::inRandomOrder()->first()->id, // Associate with a random user
            'answer' => $this->faker->sentence(),
        ];
    }
}
