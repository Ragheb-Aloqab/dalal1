<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

     

        $cities = [
            [
                'name' => 'صنعاء',
                'logo' => 'assets/images/cities/sanaa.jpeg'
            ],
            [
                'name' => 'عدن',
                'logo' => 'assets/images/cities/aden.jpeg'
            ],
            [
                'name' => 'تعز',
                'logo' => 'assets/images/cities/taiz.jpeg'
            ],
            [
                'name' => 'حضرموت',
                'logo' => 'assets/images/cities/hadramout.jpeg'
            ],
            [
                'name' => 'الحديدة',
                'logo' => 'assets/images/cities/hodeidah.jpeg'
            ],
            [
                'name' => 'إب',
                'logo' => 'assets/images/cities/ibb.jpeg'
            ],
            [
                'name' => 'الجوف',
                'logo' => 'assets/images/cities/aljawf.jpeg'
            ],
            [
                'name' => 'شبوة',
                'logo' => 'assets/images/cities/shabwah.jpeg'
            ],
            [
                'name' => 'المحويت',
                'logo' => 'assets/images/cities/almahweet.jpeg'
            ],
            [
                'name' => 'ذمار',
                'logo' => 'assets/images/cities/dhamar.jpeg'
            ],
            [
                'name' => 'حجة',
                'logo' => 'assets/images/cities/hajjah.jpeg'
            ]
        ];

        foreach ($cities as $city) {
            DB::table('cities')->insert([
                'name' => $city['name'],
                'logo' => $city['logo'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
