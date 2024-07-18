<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
    $userId = Auth::id(); // Mendapatkan user_id dari pengguna yang sedang login
    $pengajuans = Pengajuan::where('user_id', $userId)->get(); // Menampilkan pengajuan berdasarkan user_id
    return view('pages.user-opd.daftar-pengajuan.daftar-pengajuan', compact('role', 'pengajuans'));
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
        $request->validate([
            'nama_aplikasi' => 'required',
            'gambaran_umum' => 'required',
            'jenis_pengguna' => 'required',
            'fitur_fitur' => 'required',
            'konsep_file' => 'required|file|mimes:pdf,doc,docx',
            'setuju' => 'accepted'
        ], [
            'nama_aplikasi.required' => 'Nama aplikasi wajib diisi.',
            'nama_aplikasi.alpha' => 'Nama aplikasi hanya boleh berisi huruf.',
            'gambaran_umum.required' => 'Gambaran umum wajib diisi.',
            'jenis_pengguna.required' => 'Jenis pengguna wajib diisi.',
            'fitur_fitur.required' => 'Fitur-fitur wajib diisi.',
            'konsep_file.required' => 'File konsep wajib diunggah.',
            'konsep_file.file' => 'File konsep harus berupa file.',
            'konsep_file.mimes' => 'File konsep harus berupa pdf, doc, atau docx.',
            'setuju.accepted' => 'Anda harus menyetujui syarat dan ketentuan.'
        ]);

        try {
            $file = $request->file('konsep_file');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/konsep_files', $fileName);

            Pengajuan::create([
                'nama_aplikasi' => $request->nama_aplikasi,
                'gambaran_umum' => $request->gambaran_umum,
                'jenis_pengguna' => $request->jenis_pengguna,
                'fitur_fitur' => $request->fitur_fitur,
                'konsep_file' => $filePath,
                'user_id' => Auth::id(),
            ]);

            return redirect()->route('user_opd.tambahPengajuan')->with('success', 'Pengajuan berhasil disimpan!');
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
        $request->validate([
            'nama_aplikasi' => 'required',
            'gambaran_umum' => 'required',
            'jenis_pengguna' => 'required',
            'fitur_fitur' => 'required',
            'konsep_file' => 'nullable|file|mimes:pdf,doc,docx',
        ], [
            'nama_aplikasi.required' => 'Nama aplikasi wajib diisi.',
            'nama_aplikasi.alpha' => 'Nama aplikasi hanya boleh berisi huruf.',
            'gambaran_umum.required' => 'Gambaran umum wajib diisi.',
            'jenis_pengguna.required' => 'Jenis pengguna wajib diisi.',
            'fitur_fitur.required' => 'Fitur-fitur wajib diisi.',
            'konsep_file.file' => 'File konsep harus berupa file.',
            'konsep_file.mimes' => 'File konsep harus berupa pdf, doc, atau docx.',
        ]);

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
            ]);

            return redirect()->route('user_opd.ubahPengajuan', $pengajuan->id)->with('success', 'Pengajuan berhasil diubah!');
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