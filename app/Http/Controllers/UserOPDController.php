<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserOPDController extends Controller
{
    public function dashboard()
    {
        return view('pages.user-opd.dashboard-opd.dashboard-opd');
    }

    public function daftarPengajuan()
    {
        return view('pages.user-opd.daftar-pengajuan.daftar-pengajuan');
    }

    public function tambahPengajuan()
    {
        return view('pages.user-opd.tambah-pengajuan.tambah-pengajuan');
    }
}
