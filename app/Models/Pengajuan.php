<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_aplikasi',
        'gambaran_umum',
        'jenis_pengguna',
        'fitur_fitur',
        'konsep_file',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}