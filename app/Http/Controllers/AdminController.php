<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $role = Auth::user()->role;
        return view('pages.admin.dashboard.dashboard', compact('role'));
    }

    public function daftarPengajuan()
    {
        $role = Auth::user()->role;
        return view('pages.admin.pengajuan.daftar-pengajuan', compact('role'));
    }

    public function tindakLanjut()
    {
        $role = Auth::user()->role;
        return view('pages.admin.pengajuan.tindak-lanjut', compact('role'));
    }

    public function riwayat()
    {
        $role = Auth::user()->role;
        return view('pages.admin.riwayat.riwayat', compact('role'));
    }
}
