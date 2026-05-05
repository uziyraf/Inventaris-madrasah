<?php

namespace App\Http\Controllers\Yayasan;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Lembaga;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // 1. Nampilin Halaman Manajemen User
    public function index()
    {
        // Ambil semua user (bisa lihat siapa aja yang terdaftar)
        $users = User::with('lembaga')->latest()->get();

        // Ambil data lembaga buat pilihan dropdown di form tambah user
        $lembagas = Lembaga::all();

        return view('admin.manajemen_user', compact('users', 'lembagas'));
    }

    // 2. Proses Simpan User Baru
    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:yayasan,lembaga',
            // required_if artinya: wajib diisi kalau rolenya 'lembaga'
            'lembaga_id' => 'required_if:role,lembaga'
        ]);

        // Bikin akun ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            // Kalau dia yayasan, id_lembaganya dibikin kosong (null). Kalau lembaga, sesuai pilihan.
            'lembaga_id' => $request->role === 'yayasan' ? null : $request->lembaga_id,
        ]);

        return redirect()->back()->with('success', 'Akun pengguna berhasil dibuat!');
    }
}