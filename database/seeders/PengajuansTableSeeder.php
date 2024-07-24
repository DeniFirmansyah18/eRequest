<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PengajuansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Mengisi tabel pengajuans dengan data palsu menggunakan Faker
        for ($i = 0; $i < 50; $i++) {
            DB::table('pengajuans')->insert([
                'nama_aplikasi' => $faker->word,
                'gambaran_umum' => $faker->sentence,
                'jenis_pengguna' => $faker->randomElement(['Admin, user', 'Admin, User, Guest']),
                'fitur_fitur' => $faker->words(3, true),
                'konsep_file' => $faker->sentence,
                'catatan_verifikator' => $faker->sentence,
                'status' => $faker->randomElement(['Selesai', 'Disetujui', 'Ditolak', 'Pending']),
                'progress' => $faker->randomElement(['Dalam Tahap Analisis', '', 'Dalam Tahap Testing']),
                'user_id' => $faker->numberBetween(2, 12), // Sesuaikan dengan user_id yang ada di database Anda
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
