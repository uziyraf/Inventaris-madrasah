<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LembagaController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\SantriController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/users', function () {
    return view('users');
})->name('users');

Route::get('/users/create', function () {
    return view('users-create');
})->name('users.create');

Route::get('/lembaga', [LembagaController::class, 'index'])->name('lembaga');
Route::put('/lembaga/update', [LembagaController::class, 'update'])->name('lembaga.update');

use App\Http\Controllers\GuruController;

// Rute CRUD Guru
Route::get('/guru', [GuruController::class, 'index'])->name('guru');
Route::post('/guru', [GuruController::class, 'store'])->name('guru.store');
Route::put('/guru/{id}', [GuruController::class, 'update'])->name('guru.update');
Route::delete('/guru/{id}', [GuruController::class, 'destroy'])->name('guru.destroy');

Route::get('/murid', [SantriController::class, 'index'])->name('murid');
Route::post('/murid', [SantriController::class, 'store'])->name('murid.store');
Route::put('/murid/{id}', [SantriController::class, 'update'])->name('murid.update');
Route::delete('/murid/{id}', [SantriController::class, 'destroy'])->name('murid.destroy');

// Rute CRUD Inventaris
Route::get('/inventaris', [InventarisController::class, 'index'])->name('inventaris');
Route::post('/inventaris', [InventarisController::class, 'store'])->name('inventaris.store');
Route::put('/inventaris/{id}', [InventarisController::class, 'update'])->name('inventaris.update');
Route::delete('/inventaris/{id}', [InventarisController::class, 'destroy'])->name('inventaris.destroy');

// Rute CRUD Pengurus
Route::get('/pengurus', [PengurusController::class, 'index'])->name('pengurus');
Route::post('/pengurus', [PengurusController::class, 'store'])->name('pengurus.store');
Route::put('/pengurus/{id}', [PengurusController::class, 'update'])->name('pengurus.update');
Route::delete('/pengurus/{id}', [PengurusController::class, 'destroy'])->name('pengurus.destroy');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
