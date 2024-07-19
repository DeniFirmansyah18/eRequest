<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Insert data admin
        DB::table('users')->insert([
            [
                'name' => 'ADMIN',
                'name_opd' => 'DISKOMINFO',
                'phone' => '1234567890',
                'email' => 'admin@gmail.com',
                'alamat' => 'Mojokerto',
                'role' => 'admin',
                'password' => Hash::make('admin12345'),
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert data user
        DB::table('users')->insert([
            [
                'name' => 'USER',
                'name_opd' => 'DISNAKER',
                'phone' => '089218031',
                'email' => 'user@gmail.com',
                'alamat' => 'Mojokerto',
                'role' => 'user_opd',
                'password' => Hash::make('user12345'),
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

        // Insert data user palsu dengan Faker
        for ($i = 0; $i < 10; $i++) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'name_opd' => $faker->company,
                'phone' => $faker->phoneNumber,
                'email' => $faker->unique()->safeEmail,
                'alamat' => $faker->address,
                'role' => $faker->randomElement(['user_opd']),
                'password' => Hash::make('user12345'), // Default password
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
