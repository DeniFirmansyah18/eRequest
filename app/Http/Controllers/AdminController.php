<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
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
        $pengajuan = Pengajuan::all(); // Ambil semua pengajuan
        return view('pages.admin.pengajuan.daftar-pengajuan', compact('role', 'pengajuan'));
    }

    public function tindakLanjut()
    {
        $role = Auth::user()->role;
        $pengajuan = Pengajuan::whereHas('user', function ($query) {
            $query->where('role', '!=', 'admin');
        })->get()->groupBy('user.name_opd');

        return view('pages.admin.pengajuan.tindak-lanjut', compact('role', 'pengajuan'));
    }

    public function detail($id)
    {
        $role = Auth::user()->role;
        $pengajuan = Pengajuan::with('user')->findOrFail($id); // Ambil pengajuan berdasarkan ID
        return view('pages.admin.pengajuan.detail-tindak-lanjut', compact('role', 'pengajuan'));
    }

    public function riwayat()
    {
        $role = Auth::user()->role;
        $pengajuan = Pengajuan::where('status', '!=', 'Pending')->get(); // Ambil pengajuan dengan status selain 'Pending'
        return view('pages.admin.riwayat.riwayat', compact('role', 'pengajuan'));
    }

    public function detail_riwayat($id)
    {
        $role = Auth::user()->role;
        $pengajuan = Pengajuan::with('user')->findOrFail($id); // Ambil pengajuan berdasarkan ID
        return view('pages.admin.riwayat.detail-riwayat', compact('role', 'pengajuan'));
    }

    public function reject($id)
    {
        $pengajuan = Pengajuan::find($id);
        if ($pengajuan) {
            $pengajuan->status = 'Ditolak';
            $pengajuan->save();
            return redirect()->back()->with('ditolak', 'Pengajuan telah ');
        }
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::find($id);
        if ($pengajuan) {
            $pengajuan->status = 'Disetujui';
            $pengajuan->save();
            return redirect()->back()->with('disetujui', 'Pengajuan telah ');
        }
    }
}
