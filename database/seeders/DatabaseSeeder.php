<?php

namespace Database\Seeders;

use App\Models\BookedApartments;
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
        // \App\Models\UserAuthenticated::factory(10)->create();
/*
        User::factory(10)->create();

        $bookedapartments = ['Jankovic' , 'Radulovic', 'Zarkovic'];
        foreach ($bookedapartments as $bookedapartment){

            BookedApartments::create(['name' => $bookedapartment]);

        }
        foreach (User::all() as $user){
            foreach (BookedApartments::all() as $bookedapartment){
                $user->bookedapartments()->attach($bookedapartment->id);
            }

        }
*/
    }
}
