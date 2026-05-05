<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

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
