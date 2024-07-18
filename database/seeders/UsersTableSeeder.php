<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
            ],
            [
                'name' => 'Jane Doe',
                'name_opd' => 'Dinas Ketenagakerjaan',
                'phone' => '0987654321',
                'email' => 'user@gmail.com',
                'alamat' => '456 Elm St',
                'role' => 'user_opd',
                'password' => Hash::make('user12345'),
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'John Doe',
                'name_opd' => 'Dinas Pertanian dan Perikanan',
                'phone' => '0987654321',
                'email' => 'user1@gmail.com',
                'alamat' => '456 Elm St',
                'role' => 'user_opd',
                'password' => Hash::make('user12345'),
                'remember_token' => Str::random(10),
                'profile_photo_path' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
