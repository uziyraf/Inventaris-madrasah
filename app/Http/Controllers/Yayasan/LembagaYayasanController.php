<?php

namespace App\Http\Controllers\Yayasan;

use App\Http\Controllers\Controller;
use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaYayasanController extends Controller
{
    public function index()
    {
        // Ambil semua data lembaga yang ada di bawah naungan yayasan
        // (Nantinya kalau relasi udah jalan, bisa ditambah ->withCount(['santris', 'gurus']))
        $lembagas = Lembaga::latest()->get();

        return view('admin.lembaga_yayasan', compact('lembagas'));
    }
}