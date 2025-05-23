<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => 'Facebook',
                'web_icon' => 'facebook.svg', // SVG filename for Tailwind CSS
                'apk_icon' => null,
                'link' => 'https://facebook.com/dalal'
            ],
            [
                'name' => 'Twitter',
                'web_icon' => 'twitter.svg', // SVG filename for Tailwind CSS
                'apk_icon' => null,
                'link' => 'https://twitter.com/dalal'
            ],
            [
                'name' => 'Instagram',
                'web_icon' => 'instagram.svg', // SVG filename for Tailwind CSS
                'apk_icon' => null,
                'link' => 'https://instagram.com/dalal'
            ],
            [
                'name' => 'تطبيق أندرويد',
                'web_icon' => null,
                'apk_icon' => 'apk-icon.png', // Image filename for Flutter
                'link' => 'https://play.google.com/store/apps/details?id=dalal.app'
            ]
        ]);
    }
}
