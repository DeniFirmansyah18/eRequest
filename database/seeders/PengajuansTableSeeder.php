<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengajuansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pengajuans')->insert([
            [
                'nama_aplikasi' => 'Aplikasi Cuti',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'fitur_fitur' => 'CRUD',
                'konsep_file' => ' ',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => '',
                'progress' => 'Sedang dikerjakan',
                'user_id' => 2, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi Pegawai',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'fitur_fitur' => 'CRUD',
                'konsep_file' => ' ',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => '',
                'progress' => 'Sedang dikerjakan',
                'user_id' => 2, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi Keuangan',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'fitur_fitur' => 'CRUD',
                'konsep_file' => ' ',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => '',
                'progress' => 'Sedang dikerjakan',
                'user_id' => 2, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi Administrasi',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'fitur_fitur' => 'CRUD',
                'konsep_file' => ' ',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => '',
                'progress' => 'Sedang dikerjakan',
                'user_id' => 2, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi Monitoring',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'fitur_fitur' => 'CRUD',
                'konsep_file' => ' ',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => '',
                'progress' => 'Sedang dikerjakan',
                'user_id' => 3, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi Kepegawaian',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'fitur_fitur' => 'CRUD',
                'konsep_file' => ' ',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => '',
                'progress' => 'Sedang dikerjakan',
                'user_id' => 3, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_aplikasi' => 'Aplikasi Keuangan',
                'gambaran_umum' => 'Gambaran umum aplikasi A',
                'jenis_pengguna' => 'Pengguna A',
                'fitur_fitur' => 'CRUD',
                'konsep_file' => ' ',
                'catatan_verifikator' => 'Catatan verifikator A',
                'status' => '',
                'progress' => 'Sedang dikerjakan',
                'user_id' => 3, // Asumsikan user_id 1 ada di tabel users
                'created_at' => now(),
                'updated_at' => now(),
            ],
            
        ]);
    }
}
