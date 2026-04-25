<?php

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

Route::get('/inventaris', function () {
    return view('inventaris');
})->name('inventaris');
