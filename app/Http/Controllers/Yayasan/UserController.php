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
        $lembagas = Lembaga::orderBy('nama_madrasah')->get();

        return view('admin.user_management', compact('users', 'lembagas'));
    }

    // 2. Proses Simpan User Baru
    public function store(Request $request)
    {
        $request->merge([
            'nama_madrasah' => trim((string) $request->nama_madrasah),
        ]);

        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'role' => 'required|in:yayasan,lembaga',
            'nama_madrasah' => 'required_if:role,lembaga|nullable|string|max:255'
        ]);

        $lembagaId = null;

        if ($request->role === 'lembaga') {
            $lembaga = Lembaga::firstOrCreate([
                'nama_madrasah' => trim($request->nama_madrasah),
            ]);

            $lembagaId = $lembaga->id;
        }

        // Bikin akun ke database
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'lembaga_id' => $lembagaId,
        ]);

        return redirect()->back()->with('success', 'Akun pengguna berhasil dibuat!');
    }
}
