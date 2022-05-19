<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(5)->create();

         Listing::factory(6)->create();

//         Listing::create([
//            'title' => 'Full-Stack Developer',
//             'tags' => 'laravel, backend, api',
//             'company' => 'Stark Industries',
//             'location' => 'New York, NY',
//             'email' => 'email1@google.com',
//             'website' => 'https://www.stark1.com',
//             'description' => 'lorem(20)'
//         ]);
//
//        Listing::create([
//            'title' => 'Front-End Developer',
//            'tags' => 'htmls, css, api',
//            'company' => 'Yolo Industries',
//            'location' => 'Florida, FL',
//            'email' => 'email2@google.com',
//            'website' => 'https://www.yolo.com',
//            'description' => 'lorem15'
//        ]);
    }
}
