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
use App\Http\Controllers\AuthController;
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
    // Rute-rute ini akan pakai layouts/app.blade.php
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga');
    Route::get('/guru', [GuruController::class, 'index'])->name('guru');
    Route::get('/murid', [SantriController::class, 'index'])->name('murid');
    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
    Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus');

    // (Kalau ada route untuk post/put/delete data lembaga, taro di dalem group ini juga)
});


// ==================================================
// 3. RUTE SUPER ADMIN YAYASAN
// ==================================================
Route::middleware(['auth', 'role:yayasan'])->prefix('admin')->name('admin.')->group(function () {
    // Rute-rute ini akan pakai layouts/admin.blade.php

    // Dasbor
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
});