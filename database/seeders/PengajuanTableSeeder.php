<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajuan')->insert([
            [
                'nama_aplikasi' => 'Aplikasi A',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'detail_aplikasi' => 'Detail aplikasi A',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => 'Pending',
                'progress' => 0,
                'user_id' => 1, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi APA',
                'gambaran_umum' => 'Gambaran umum aplikasi APA',
                'jenis_pengguna' => 'Pengguna A',
                'detail_aplikasi' => 'Detail aplikasi A',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => 'Pending',
                'progress' => 0,
                'user_id' => 1, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi HJJA',
                'gambaran_umum' => 'Gambaran umum aplikasi AJKDA',
                'jenis_pengguna' => 'Pengguna A',
                'detail_aplikasi' => 'Detail aplikasi A',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => 'Pending',
                'progress' => 'hampir jadi',
                'user_id' => 1, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi B',
                'gambaran_umum' => 'Gambaran umum aplikasi B',
                'jenis_pengguna' => 'Pengguna B',
                'detail_aplikasi' => 'Detail aplikasi B',
                'catatan_verifikator' => 'Catatan verifikator B',
                'status' => 'Approved',
                'progress' => 100,
                'user_id' => 2, // Asumsikan user_id 2 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi OPMM',
                'gambaran_umum' => 'Gambaran umum aplikasi B',
                'jenis_pengguna' => 'Pengguna B',
                'detail_aplikasi' => 'Detail aplikasi B',
                'catatan_verifikator' => 'Catatan verifikator B',
                'status' => 'Approved',
                'progress' => 100,
                'user_id' => 3, // Asumsikan user_id 2 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi APA AJA SUKA',
                'gambaran_umum' => 'Gambaran umum aplikasi B',
                'jenis_pengguna' => 'Pengguna B',
                'detail_aplikasi' => 'Detail aplikasi B',
                'catatan_verifikator' => 'Catatan verifikator B',
                'status' => 'Approved',
                'progress' => 100,
                'user_id' => 3, // Asumsikan user_id 2 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
