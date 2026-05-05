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

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/users', function () {
    return view('users');
})->name('users');

Route::get('/users/create', function () {
    return view('users-create');
})->name('users.create');

Route::get('/lembaga', function () {
    return view('lembaga');
})->name('lembaga');

Route::get('/guru', function () {
    return view('guru');
})->name('guru');

Route::get('/murid', function () {
    return view('murid');
})->name('murid');

Route::get('/kelas', function () {
    return view('kelas');
})->name('kelas');

Route::get('/inventaris', function () {
    return view('inventaris');
})->name('inventaris');

Route::get('/pengurus', function () {
    return view('pengurus');
})->name('pengurus');

// Authentication Routes
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// ==========================================
// USER ROUTES (Role = 'user')
// ==========================================
Route::get('/dashboard', function () { return view('dashboard', ['role' => 'user']); })->name('dashboard');
Route::get('/guru', function () { return view('guru', ['role' => 'user']); })->name('guru');
Route::get('/murid', function () { return view('murid', ['role' => 'user']); })->name('murid');
Route::get('/kelas', function () { return view('kelas', ['role' => 'user']); })->name('kelas');
Route::get('/inventaris', function () { return view('inventaris', ['role' => 'user']); })->name('inventaris');
Route::get('/pengurus', function () { return view('pengurus', ['role' => 'user']); })->name('pengurus');

// ==========================================
// ADMIN ROUTES (Role = 'admin')
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard', ['role' => 'admin']); })->name('dashboard');
    Route::get('/lembaga', function () { return view('lembaga', ['role' => 'admin']); })->name('lembaga');
    Route::get('/guru', function () { return view('guru', ['role' => 'admin']); })->name('guru');
    Route::get('/murid', function () { return view('murid', ['role' => 'admin']); })->name('murid');
    Route::get('/kelas', function () { return view('kelas', ['role' => 'admin']); })->name('kelas');
    Route::get('/inventaris', function () { return view('inventaris', ['role' => 'admin']); })->name('inventaris');
    Route::get('/pengurus', function () { return view('pengurus', ['role' => 'admin']); })->name('pengurus');
    Route::get('/users', function () { return view('users', ['role' => 'admin']); })->name('users');
    Route::get('/users/create', function () { return view('users-create', ['role' => 'admin']); })->name('users.create');
});
