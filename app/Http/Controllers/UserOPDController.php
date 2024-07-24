<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use App\Models\User;
use App\Notifications\PengajuanNotification;
use App\Notifications\StatusPengajuanNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserOPDController extends Controller
{
    public function dashboard()
    {
        $role = Auth::user()->role;
        return view('pages.user-opd.dashboard-opd.dashboard-opd', compact('role'));
    }

    public function daftarPengajuan(Request $request)
    {
        $role = Auth::user()->role;
        $userId = Auth::id(); // Mendapatkan user_id dari pengguna yang sedang login
        $searchTerm = $request->input('search', ''); // Default to an empty string if search term is not provided

        // Gunakan metode paginate untuk mendapatkan instance LengthAwarePaginator dan filter berdasarkan user_id
        $pengajuans = Pengajuan::where('user_id', $userId)
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->where(function ($query) use ($searchTerm) {
                    $query->where('nama_aplikasi', 'like', '%' . $searchTerm . '%')
                        ->orWhere('status', 'like', '%' . $searchTerm . '%');
                });
            })->paginate(10); // Adjust pagination as needed

        return view('pages.user-opd.daftar-pengajuan.daftar-pengajuan', compact('role', 'pengajuans', 'searchTerm'));
    }



    public function detailPengajuan($id)
    {
        $role = Auth::user()->role;
        $pengajuan = Pengajuan::with('user')->findOrFail($id);
        return view('pages.user-opd.daftar-pengajuan.detail-pengajuan', compact('role', 'pengajuan'));
    }

    public function tambahPengajuan()
    {
        $role = Auth::user()->role;
        return view('pages.user-opd.tambah-pengajuan.tambah-pengajuan', compact('role'));
    }

    public function store(Request $request)
    {
        // Validasi dan penyimpanan pengajuan

        try {
            $file = $request->file('konsep_file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/konsep_files', $fileName);

            $pengajuan = Pengajuan::create([
                'nama_aplikasi' => $request->nama_aplikasi,
                'gambaran_umum' => $request->gambaran_umum,
                'jenis_pengguna' => $request->jenis_pengguna,
                'fitur_fitur' => $request->fitur_fitur,
                'konsep_file' => $filePath,
                'status' => $request->input('status', 'Pending'),
                'user_id' => Auth::id(),
            ]);

            // Kirim notifikasi ke admin
            $adminUsers = User::where('role', 'admin')->get();
            foreach ($adminUsers as $admin) {
                $admin->notify(new PengajuanNotification('Pengajuan baru (' . $pengajuan->nama_aplikasi . ') telah diajukan oleh ' . Auth::user()->name, $pengajuan->nama_aplikasi));
            }

            return redirect()->route('user_opd.tambahPengajuan')->with('success', 'Pengajuan berhasil disimpan! , Silahkan menunggu konfirmasi');
        } catch (\Exception $e) {
            return redirect()->route('user_opd.tambahPengajuan')->with('error', 'Pengajuan gagal disimpan! Silakan coba lagi.');
        }
    }

    public function ubahPengajuan(Pengajuan $pengajuan)
    {
        return view('pages.user-opd.daftar-pengajuan.ubah-pengajuan', compact('pengajuan'));
    }

    public function update(Request $request, Pengajuan $pengajuan)
    {
        // Validasi dan update pengajuan

        try {
            if ($request->hasFile('konsep_file')) {
                // Hapus file lama jika ada
                if ($pengajuan->konsep_file) {
                    Storage::delete($pengajuan->konsep_file);
                }

                // Simpan file baru
                $file = $request->file('konsep_file');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->storeAs('public/konsep_files', $fileName);

                $pengajuan->konsep_file = $filePath;
            }

            // Update fields lainnya
            $pengajuan->update([
                'nama_aplikasi' => $request->nama_aplikasi,
                'gambaran_umum' => $request->gambaran_umum,
                'jenis_pengguna' => $request->jenis_pengguna,
                'fitur_fitur' => $request->fitur_fitur,
                'status' => $request->input('status', 'Pending'),
            ]);

            // Kirim notifikasi ke admin
            $adminUsers = User::where('role', 'admin')->get();
            foreach ($adminUsers as $admin) {
                $admin->notify(new PengajuanNotification('Pengajuan (' . $pengajuan->nama_aplikasi . ') telah diubah oleh ' . Auth::user()->name, $pengajuan->nama_aplikasi));
            }

            return redirect()->route('user_opd.ubahPengajuan', $pengajuan->id)->with('success', 'Pengajuan berhasil diubah, Silahkan menunggu konfirmasi perubahan');
        } catch (\Exception $e) {
            return redirect()->route('user_opd.ubahPengajuan', $pengajuan->id)->with('error', 'Pengajuan gagal diubah! Silakan coba lagi.');
        }
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect()->route('user_opd.daftarPengajuan')->with('success', 'Pengajuan berhasil dihapus!');
    }
}
