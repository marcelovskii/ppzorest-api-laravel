<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('App\people');

        for($i=1; $i <=200; $i ++)
        {
        DB::table('people')->insert([
            'first_name' => $faker->name(),
            'last_name' => $faker->lastName(),
            'phone_number' => $faker->phoneNumber(),
            'email' => $faker->email(),
            'country' => $faker->country(),
            'city' => $faker->city(),
            'street' => $faker->streetName(),
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),  
            
        ]);
        }
    }
}
