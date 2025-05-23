<?php

namespace Database\Factories;

use App\Models\Attachment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Attachment::class;

    public function definition()
    {
        $faker = app(Faker::class); // Get an instance of Faker

        // Restrict file types to 'image' and 'video'
        $fileType = $this->faker->randomElement(['image']);
        $filePath = '';

        if ($fileType === 'image') {
            // Generate a fake image URL
            // $filePath = $faker->imageUrl(800, 600, 'nature', true, 'Faker');
            $imageNumber = rand(1, 11);
            $filePath = 'factory/image-' . $imageNumber . '.jpg';
        } else if ($fileType === 'video') {
            // Generate a fake video URL
            $filePath = $faker->url; // Example URL for videos
        }

        return [
            'file_path' => $filePath, // Path to the file
            'file_type' => $fileType, // Type of file (image or video)
            'attachable_id' => function () {
                // Pick a random attachable model
                $model = \App\Models\RealEstate::inRandomOrder()->first();
                return $model ? $model->id : null;
            },
            'attachable_type' => \App\Models\RealEstate::class,
        ];
    }
}
