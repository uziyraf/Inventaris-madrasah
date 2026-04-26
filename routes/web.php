<?php

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

Route::get('/murid', [SantriController::class, 'index'])->name('murid');
Route::post('/murid', [SantriController::class, 'store'])->name('murid.store');
Route::put('/murid/{id}', [SantriController::class, 'update'])->name('murid.update');
Route::delete('/murid/{id}', [SantriController::class, 'destroy'])->name('murid.destroy');

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
