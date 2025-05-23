<?php

namespace Database\Seeders;

use App\Models\Attachment;
use App\Models\Comment;
use App\Models\Feature;
use App\Models\Feedback;
use App\Models\RealEstate;
use App\Models\Request;
use App\Models\Response;
use App\Services\RealEstateData;
use Illuminate\Database\Seeder;

class RealEstateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $realEstates = RealEstate::factory()->count(1000)->create();

        $realEstates->each(function ($realEstate) {
            $realData = new RealEstateData();
            $filePath = '';

            if ($realEstate->isLand()) {
                $imageNumber = rand(1, 15);
                $filePath = 'factory/land (' . $imageNumber . ').jpg';

                // Create features with random land names
                for ($i = 0; $i < rand(3, 6); $i++) {
                    Feature::factory()->create([
                        'real_estate_id' => $realEstate->id,
                        'name' => $realData->getRandomFeatureLand()
                    ]);
                }
            } else {
                $imageNumber = rand(1, 62);
                $filePath = 'factory/real (' . $imageNumber . ').jpg';

                // Create features with random building names
                for ($i = 0; $i < rand(2, 5); $i++) {
                    Feature::factory()->create([
                        'real_estate_id' => $realEstate->id,
                        'name' => $realData->getRandomFeatureBuilding()
                    ]);
                }
            }

            // Randomly add attachments
            if (rand(0, 1)) {
                Attachment::factory()->count(rand(3, 5))->create([
                    'attachable_id' => $realEstate->id,
                    'attachable_type' => RealEstate::class,
                    'file_path' => $filePath
                ]);
            }

            Comment::factory()->count(rand(20, 50))->create([
                'advertisement_id' => $realEstate->advertisement_id
            ]);
        });

        $requests = Request::factory()->count(10)->create();

        $requests->each(function ($request) {
            Response::factory()->count(1)->create([
                'request_id' => $request->id,
            ]);
        });

        // Feedback::factory()->count(rand(10, 20))->create();
    }
}
