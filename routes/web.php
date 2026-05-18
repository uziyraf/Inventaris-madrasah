<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\SantriController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\Yayasan\LembagaYayasanController;
use App\Http\Controllers\Yayasan\RekapDataController;
use App\Http\Controllers\Yayasan\UserController;
use App\Http\Controllers\Yayasan\LaporanYayasanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;

// ==================================================
// 1. RUTE AUTENTIKASI & PUBLIK
// ==================================================
Route::get('/', function () {
    return redirect()->route('login');
});

// Ini rute yang tadi ilang bro!
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// ==================================================
// 2. RUTE ADMIN LEMBAGA (User Biasa)
// ==================================================
Route::middleware(['auth', 'role:lembaga'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga');
    Route::put('/lembaga/update', [LembagaController::class, 'update'])->name('lembaga.update');

    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
    Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
    Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

    Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus');
    Route::post('/pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
    Route::put('/pengurus/{id}', [PengurusController::class, 'update'])->name('pengurus.update');
    Route::delete('/pengurus/{id}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

    Route::get('/data-kelas', [KelasController::class, 'index'])->name('kelas');

    Route::get('/murid', [SantriController::class, 'index'])->name('murid');
    Route::post('/murid', [SantriController::class, 'store'])->name('murid.store');
    Route::put('/murid/{id}', [SantriController::class, 'update'])->name('murid.update');
    Route::delete('/murid/{id}', [SantriController::class, 'destroy'])->name('murid.destroy');

    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
    Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
    Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
    Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

    // Export Routes
    Route::get('/guru/export', [GuruController::class, 'exportCsv'])->name('guru.export');
    Route::get('/pengurus/export', [PengurusController::class, 'exportCsv'])->name('pengurus.export');
    Route::get('/data-kelas/export', [KelasController::class, 'exportCsv'])->name('kelas.export');
    Route::get('/murid/export', [SantriController::class, 'exportCsv'])->name('murid.export');
    Route::get('/inventaris/export', [InventarisController::class, 'exportCsv'])->name('inventaris.export');

    // Import Routes
    Route::post('/guru/import', [GuruController::class, 'importCsv'])->name('guru.import');
    Route::get('/guru/template', [GuruController::class, 'downloadTemplate'])->name('guru.template');
    
    Route::post('/pengurus/import', [PengurusController::class, 'importCsv'])->name('pengurus.import');
    Route::get('/pengurus/template', [PengurusController::class, 'downloadTemplate'])->name('pengurus.template');
    
    Route::post('/murid/import', [SantriController::class, 'importCsv'])->name('murid.import');
    Route::get('/murid/template', [SantriController::class, 'downloadTemplate'])->name('murid.template');
    
    Route::post('/inventaris/import', [InventarisController::class, 'importCsv'])->name('inventaris.import');
    Route::get('/inventaris/template', [InventarisController::class, 'downloadTemplate'])->name('inventaris.template');

    // Laporan Routes
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
    Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.store');
    Route::delete('/laporan/{id}', [LaporanController::class, 'destroy'])->name('laporan.destroy');

});


// ==================================================
// 3. RUTE SUPER ADMIN YAYASAN
// ==================================================
Route::middleware(['auth', 'role:yayasan'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [RekapDataController::class, 'dashboard'])->name('dashboard');

    // Manajemen Lembaga & User
    Route::get('/lembaga', [LembagaYayasanController::class, 'index'])->name('lembaga');
    Route::get('/users', [UserController::class, 'index'])->name('users');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');

    // Rekap Data Gabungan
    Route::get('/guru', [RekapDataController::class, 'guru'])->name('guru');
    Route::get('/murid', [RekapDataController::class, 'murid'])->name('murid');
    Route::get('/kelas', [RekapDataController::class, 'kelas'])->name('kelas');
    Route::get('/pengurus', [RekapDataController::class, 'pengurus'])->name('pengurus');
    Route::get('/inventaris', [RekapDataController::class, 'inventaris'])->name('inventaris');

    // Laporan Yayasan
    Route::get('/laporan', [LaporanYayasanController::class, 'index'])->name('laporan');
    Route::patch('/laporan/{id}/status', [LaporanYayasanController::class, 'updateStatus'])->name('laporan.status');
});