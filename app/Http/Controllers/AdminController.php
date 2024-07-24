<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Notifications\StatusPengajuanNotification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $role = Auth::user()->role;
        // Hitung jumlah pengajuan yang statusnya 'Pending'
        $pendingCount = Pengajuan::where('status', 'Pending')->count();

        return view('pages.admin.dashboard.dashboard', compact('role', 'pendingCount'));
    }

    public function daftarPengajuan(Request $request)
    {
        $role = Auth::user()->role;
        $searchTerm = $request->input('search', ''); // Default to an empty string if search term is not provided

        // Gunakan metode paginate untuk mendapatkan instance LengthAwarePaginator dan filter berdasarkan user_id
        $pengajuan = Pengajuan::where('status', '!=', 'Selesai')
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->where(function ($query) use ($searchTerm) {
                    $query->where('nama_aplikasi', 'like', '%' . $searchTerm . '%')
                        ->orWhere('status', 'like', '%' . $searchTerm . '%');
                });
            })->orderBy('updated_at', 'desc')
            ->paginate(10); // Adjust pagination as needed
        return view('pages.admin.pengajuan.daftar-pengajuan', compact('role', 'pengajuan', 'searchTerm'));
    }

    public function tindakLanjut(Request $request)
    {
        $role = Auth::user()->role;
        $searchTerm = $request->input('search', ''); // Default to an empty string if search term is not provided

        $pengajuanQuery = Pengajuan::whereHas('user', function ($query) {
            $query->where('role', '!=', 'admin');
        })
            ->where('status', '!=', 'Selesai')
            ->when($searchTerm, function ($query) use ($searchTerm) {
                return $query->where(function ($query) use ($searchTerm) {
                    $query->where('nama_aplikasi', 'like', '%' . $searchTerm . '%')
                        ->orWhere('status', 'like', '%' . $searchTerm . '%')
                        ->orWhereHas('user', function ($query) use ($searchTerm) {
                            $query->where('name_opd', 'like', '%' . $searchTerm . '%');
                        });
                });
            })
            ->orderBy('updated_at', 'desc'); // Order by updated_at column in descending order

        // Get the paginated result
        $pengajuanPaginated = $pengajuanQuery->paginate(10);

        // Group the results by user.name_opd
        $pengajuanGroup = $pengajuanPaginated->groupBy('user.name_opd');

        return view('pages.admin.pengajuan.tindak-lanjut', compact('role', 'pengajuanGroup', 'searchTerm', 'pengajuanPaginated'));
    }

    public function detail($id)
    {
        $role = Auth::user()->role;
        $pengajuan = Pengajuan::with('user')->findOrFail($id); // Ambil pengajuan berdasarkan ID
        return view('pages.admin.pengajuan.detail-tindak-lanjut', compact('role', 'pengajuan'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->catatan_verifikator = $request->input('catatan_verifikator');

        $pengajuan->save();

        return redirect()->route('admin.detail.tindakLanjut', $id)->with('success', 'Data berhasil diupdate');
    }

    public function updateProgress(Request $request, $id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->progress = $request->progress;
        $pengajuan->save();

        return response()->json(['success' => true]);
    }


    public function riwayat(Request $request)
    {
        $role = Auth::user()->role;
        $searchTerm = $request->input('search', ''); // Default to an empty string if search term is not provided

        // Gunakan metode paginate untuk mendapatkan instance LengthAwarePaginator dan filter berdasarkan user_id
        $pengajuan = Pengajuan::where('status', '=', 'Selesai')
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->where(function ($query) use ($searchTerm) {
                    $query->where('nama_aplikasi', 'like', '%' . $searchTerm . '%');
                });
            })->orderBy('updated_at', 'desc')
            ->paginate(10); // Adjust pagination as needed
        return view('pages.admin.riwayat.riwayat', compact('role', 'pengajuan', 'searchTerm'));
    }

    public function simpanKeRiwayat($id)
    {
        $pengajuan = Pengajuan::find($id);
        if ($pengajuan) {
            $pengajuan->status = 'Selesai'; // or any other status indicating it is moved to riwayat
            $pengajuan->save();
        }

        // Kirim notifikasi ke user
        $user = $pengajuan->user;
        $namaAplikasi = $pengajuan->nama_aplikasi;
        $message = "Pengajuan Anda ($namaAplikasi) telah selesai.";
        $user->notify(new StatusPengajuanNotification('Selesai', $message, $namaAplikasi));

        return redirect()->route('admin.riwayat');
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

            // Kirim notifikasi ke user
            $user = $pengajuan->user;
            $namaAplikasi = $pengajuan->nama_aplikasi;
            $message = "Pengajuan Anda ($namaAplikasi) ditolak.";
            $user->notify(new StatusPengajuanNotification('Ditolak', $message, $namaAplikasi));

            return redirect()->back()->with('ditolak', 'Pengajuan telah ');
        }
    }

    public function approve($id)
    {
        $pengajuan = Pengajuan::find($id);
        if ($pengajuan) {
            $pengajuan->status = 'Disetujui';
            $pengajuan->save();

            // Kirim notifikasi ke user
            $user = $pengajuan->user;
            $namaAplikasi = $pengajuan->nama_aplikasi;
            $message = "Pengajuan Anda ($namaAplikasi) telah disetujui.";
            $user->notify(new StatusPengajuanNotification('Disetujui', $message, $namaAplikasi));

            return redirect()->back()->with('disetujui', 'Pengajuan telah ');
        }
    }
}
