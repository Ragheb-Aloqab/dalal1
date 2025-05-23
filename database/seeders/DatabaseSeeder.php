<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\City;
use App\Models\Client;
use App\Models\Conversation;
use App\Models\Favorite;
use App\Models\Message;
use App\Models\Provider;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            CitiesTableSeeder::class,
        ]);
        $provider = Provider::create([
            'name' => 'مكتب عقاراك ',
            'location' => 'ibb street',
            'personal_id_number' => '67',
            'commercial_number' => '898'

        ]);
       $sp =  User::factory()->create([
            'name' => 'provider',
            'phone' => '783434329',
            'email' => 'provider@gmail.com',

            'password' => Hash::make(value: 'provider123'),
            'userable_id' => $provider->id,
            'userable_type' => Provider::class,
            'city_id' => 1
        ]);

        $client = Client::create();
        User::factory()->create([
            'name' => 'client',
            'email' => 'client@gmail.com',
            'phone' => '783479329',
            'password' => Hash::make('client123'),
            'userable_id' => $client->id,
            'userable_type' => Client::class,
            'city_id' => 1

        ]);

        for ($i = 1; $i <= 20; $i++) {
            $client = Client::create();
           $sc =  User::factory()->create([
                'name' => "client{$i}",
                'email' => "client{$i}@gmail.com",
                'phone' => '71347932' . $i,
                'password' => Hash::make('client123'),
                'userable_id' => $client->id,
                'userable_type' => Client::class,
                'city_id' => 1
            ]);
            // Conversation::create(['user_id1'=>$sp->id,'user_id2'=>$sc->id])
        }






        for ($i = 1; $i <= 20; $i++) {
            $provider = Provider::create([
                'name' => 'مكتب الامل'.$i,
                // 'city_id' => 1,
                'location' => 'ibb street',
                'personal_id_number' => '67'. $i,
                'commercial_number' => '898'. $i

            ]);
            //
            User::factory()->create([
                'name' => "provider{$i}",
                'email' => "provider{$i}@gmail.com",
                'phone' => '725307932' . $i,
                'password' => Hash::make('client123'.$i),
                'userable_id' => $provider->id,
                'userable_type' => Provider::class,
                'city_id' => City::inRandomOrder()->value('id'),
            ]);
        }

        $admin = Admin::create();
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '7834394829',
            'password' => Hash::make('admin123'),
            'userable_id' => $admin->id,
            'userable_type' => Admin::class,
            'city_id' => 1
        ]);
        $this->call(RealEstateSeeder::class);

        // if (Provider::count() > 0 && Client::count() > 0 && User::count() > 0) {
        //     // Create Conversations with Messages
        //     $cons =  Conversation::factory()
        //         ->count(10)
        //         // Creates 5 messages per conversation
        //         ->create();
        //     $cons->each(function ($con) {
        //         Message::factory()->count(20)->create([
        //             'sender_id' => $con->user_id1,
        //             'receiver_id' => $con->user_id2
        //         ]);
        //     });
        // } else {
        //     $this->command->info('Please ensure there are providers, clients, and users in the database before running this seeder.');
        // }


        $this->call([
            SettingsTableSeeder::class,
            HelpsTableSeeder::class,
            ContactsTableSeeder::class,
            SlidersTableSeeder::class,
            AboutTableSeeder::class,
            ConditionsTableSeeder::class,
            FqsTableSeeder::class,
            FollowSeeder::class,
            ConversationSeeder::class
        ]);
    }
}
