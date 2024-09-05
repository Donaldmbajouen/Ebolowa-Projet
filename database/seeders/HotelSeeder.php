<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 3; $i++) {
            DB::table('hotels')->insert([
                'name'=> $faker->name,
                'image'=>$faker->text($maxNbChars = 20),
                'type'=>'2',
                'description'=> $faker->text($maxNbChars = 20),
                'longitude'=>'451289456',
                'lattitude'=>'451289456',
                'gerant_id' => 1,
            ]);

        }
    }
}
