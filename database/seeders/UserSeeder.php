<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create();
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'phone_number' => '680803678',
                'statut' => true,
                'email' => $faker->unique()->safeEmail,
                'password' => bcrypt('password'), // Mot de passe par défaut
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        DB::table('users')->insert([
            'name' => $faker->name,
            'phone_number' => '680803678',
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Mot de passe par défaut
            'created_at' => now(),
            'role' => 'admin_secondaire',
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'name' => $faker->name,
            'phone_number' => '680803678',
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('password'), // Mot de passe par défaut
            'created_at' => now(),
            'role' => 'admin_principal',
            'updated_at' => now()
        ]);



    }
}
