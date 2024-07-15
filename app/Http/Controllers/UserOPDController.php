<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserOPDController extends Controller
{
    public function dashboard()
    {
        $role = Auth::user()->role;
        return view('pages.user-opd.dashboard-opd.dashboard-opd', compact('role'));
    }

    public function daftarPengajuan()
    {
        $role = Auth::user()->role;
        return view('pages.user-opd.daftar-pengajuan.daftar-pengajuan', compact('role'));
    }

    public function tambahPengajuan()
    {
        $role = Auth::user()->role;
        return view('pages.user-opd.tambah-pengajuan.tambah-pengajuan', compact('role'));
    }
}
