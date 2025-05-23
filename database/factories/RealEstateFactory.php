<?php

namespace Database\Factories;

use App\Models\Advertisement;
use App\Models\Apartment;
use App\Models\Building;
use App\Models\City;
use App\Models\Land;
use App\Models\Provider;
use App\Models\RealEstate;
use App\Services\RealEstateData;
use Illuminate\Database\Eloquent\Factories\Factory;

class RealEstateFactory extends Factory
{
    protected $model = RealEstate::class;


    public function definition()
    {
        // مصفوفة أنواع العقارات وربطها بالكلاسات
        $types = [
            'Land' => Land::class,
            'Building' => Building::class,
            'Apartment' => Apartment::class,
        ];

        // اختيار نوع عشوائي من الأنواع المتاحة
        $type = $this->faker->randomElement(array_keys($types));

        // إنشاء النموذج المرتبط (Land, Building, Apartment)
        $realEstateable = $types[$type]::factory()->create();

        // إنشاء كائن من RealEstateData
        $dataService = new RealEstateData();

        // الحصول على العنوان بناءً على نوع العقار
        switch ($type) {
            case 'Land':
                $title = $dataService->getRandomTitleLand();
                $description = $dataService->getRandomDescriptionLand();
                $boundary = $dataService->getRandomBoundaryLand();
                break;
            case 'Building':
                $title = $dataService->getRandomTitleBuilding();
                $description = $dataService->getRandomDescriptionBuilding();
                $boundary = $dataService->getRandomBoundaryBuilding();
                break;
            case 'Apartment':
                $title = $dataService->getRandomTitleApartment();
                $description = $dataService->getRandomDescriptionApartment();
                $boundary = $dataService->getRandomBoundaryApartment();
                break;
            default:
                $title = 'عقار للبيع'; // عنوان افتراضي في حالة عدم تحديد النوع
                $description = $this->faker->realText();
                $boundary = $this->faker->text(190);
        }

        // الحصول على الغرض (بيع أو إيجار) والسعر بناءً على النوع والغرض
        $purpose = $dataService->getRandomPurpose();
        $price = $dataService->getRandomPrice($type, $purpose);

        // الحصول على موقع عشوائي من المدن والأحياء والشوارع
        $city = $dataService->getRandomCity();
        $neighborhood = $dataService->getRandomNeighborhood($city);
        $street = $dataService->getRandomStreet($city);
        $location = "$street, $neighborhood, $city";

        // إنشاء إعلان وربطه بالعقار
        $advertisement = Advertisement::factory()->create([
            'title' => $title, // تعيين العنوان من RealEstateData
            'provider_id' => Provider::inRandomOrder()->value('id'),
        ]);
        $cityid = City::where('name', '=',value: $city)->value('id');
        // if(!$cityid){
        //     $cityid = $cityid->id;
        // }

        return [
            'description' => $description, // تعيين الوصف من RealEstateData
            'boundaries' => $boundary,     // تعيين الحدود من RealEstateData
            'location' => $location,       // تعيين الموقع من RealEstateData
            'price' => $price,             // تعيين السعر من RealEstateData
            'city_id' => $cityid, // الحصول على ID المدينة
            'status' => $purpose,          // تعيين الغرض من RealEstateData
            'advertisement_id' => $advertisement->id, // ربط بالإعلان المنشأ
            'commercial_number' => $this->faker->numerify('##########'),
            'real_estateable_id' => $realEstateable->id,
            'real_estateable_type' => $types[$type],
        ];
    }
    // public function definition()
    // {
    //     // Randomly choose one of the types
    //     $types = [
    //         'Land' => Land::class,
    //         'Building' => Building::class,
    //         'Apartment' => Apartment::class,
    //     ];

    //     $type = $this->faker->randomElement(array_keys($types));

    //     // Create the related model
    //     $realEstateable = $types[$type]::factory()->create();

    //     // Create an advertisement and link it to this real estate
    //     $advertisement = Advertisement::factory()->create([
    //         'provider_id'=>Provider::inRandomOrder()->value('id'),
    //     ]);
    //     return [
    //         'description' => $this->faker->realText(),
    //         'boundaries' => $this->faker->text(190),
    //         'location' => $this->faker->address,
    //         'price' => $this->faker->randomFloat(2, 10000, 1000000),
    //         'city_id' =>City::inRandomOrder()->value('id'),
    //         'status' => $this->faker->randomElement(['rent', 'sale']),
    //         'advertisement_id' => $advertisement->id, // Link to the created advertisement
    //         'commercial_number' => $this->faker->numerify('##########'),
    //         'real_estateable_id' => $realEstateable->id,
    //         'real_estateable_type' => $types[$type],
    //     ];
    // }
}
