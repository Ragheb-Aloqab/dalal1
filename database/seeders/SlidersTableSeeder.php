<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            [
                'path' => 'images/slider1.jpg',
                'title' => 'مرحبا بكم في دلال',
                'description' => 'اكتشف محتوى رائع هنا.'
            ],
            [
                'path' => 'images/slider2.jpg',
                'title' => 'انضم إلينا اليوم',
                'description' => 'كن عضواً واستمتع بالمزايا الحصرية.'
            ]
        ]);
    }
}
