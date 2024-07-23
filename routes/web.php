<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataFeedController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\CampaignController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserOPDController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::redirect('/', 'login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        // Route untuk pengajuan dengan role admin
        Route::post('/pengajuan/{id}/approve', [AdminController::class, 'approve'])->name('pengajuan.approve');
        Route::post('/pengajuan/{id}/reject', [AdminController::class, 'reject'])->name('pengajuan.reject');
        Route::post('/admin/pengajuan/update/{id}', [AdminController::class, 'update'])->name('admin.pengajuan.update');
        Route::post('/admin/pengajuan/updateProgress/{id}', [AdminController::class, 'updateProgress'])->name('admin.pengajuan.updateProgress');
        Route::post('/admin/simpan-ke-riwayat/{id}', [AdminController::class, 'simpanKeRiwayat'])->name('admin.simpanKeRiwayat');


        // Route admin dashboard
        Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

        // Route pengajuan daftar dan tindak lanjut
        Route::get('/admin/pengajuan/daftar-pengajuan', [AdminController::class, 'daftarPengajuan'])->name('admin.daftarPengajuan');
        Route::get('/admin/pengajuan/tindak-lanjut', [AdminController::class, 'tindakLanjut'])->name('admin.tindakLanjut');

        // Route riwayat
        Route::get('/admin/riwayat', [AdminController::class, 'riwayat'])->name('admin.riwayat');
        Route::get('/admin/riwayat/detail-riwayat/{id}', [AdminController::class, 'detail_riwayat'])->name('admin.detail.riwayat');

        // Route detail tindak lanjut
        Route::get('/admin/pengajuan/tindak-lanjut/detail-tindak-lanjut/{id}', [AdminController::class, 'detail'])->name('admin.detail.tindakLanjut');
    });

    Route::middleware(['auth', 'role:user_opd'])->group(function () {
        Route::get('/user-opd/dashboard', [UserOPDController::class, 'dashboard'])->name('user_opd.dashboard');
        Route::get('/user-opd/daftar-pengajuan', [UserOPDController::class, 'daftarPengajuan'])->name('user_opd.daftarPengajuan');
        Route::get('/user-opd/detail-pengajuan/{id}', [UserOPDController::class, 'detailPengajuan'])->name('user_opd.detailPengajuan');
        Route::delete('/user-opd/{id}', [UserOPDController::class, 'destroy'])->name('user_opd.destroy');
        Route::get('/user-opd/tambah-pengajuan', [UserOPDController::class, 'tambahPengajuan'])->name('user_opd.tambahPengajuan');
        Route::post('/user-opd/tambah-pengajuan', [UserOPDController::class, 'store'])->name('pengajuan.store');
        Route::get('/user-opd/ubah-pengajuan/{pengajuan}', [UserOPDController::class, 'ubahPengajuan'])->name('user_opd.ubahPengajuan');
        Route::post('/user-opd/pengajuan/{pengajuan}/update', [UserOPDController::class, 'update'])->name('pengajuan.update');
    });
});
