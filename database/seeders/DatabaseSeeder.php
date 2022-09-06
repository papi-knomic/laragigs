<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
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
//         User::factory(5)->create();
        $user = User::factory()->create([
            'firstname' =>'John',
            'lastname' => 'Doe',
            'email' => 'john@gmail.com'
        ]);
         Listing::factory(6)->create([
             'user_id' => $user->id
         ]);

    }
}
