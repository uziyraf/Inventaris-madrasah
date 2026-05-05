<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // 1. Nampilin Halaman Form Login
    public function showLogin()
    {
        // Kalau udah login, jangan biarin dia ke halaman login lagi
        if (Auth::check()) {
            return Auth::user()->role === 'yayasan'
                ? redirect()->route('admin.lembaga_yayasan') // <--- GANTI DI SINI
                : redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    // 2. Proses Cek Email, Password, & Pembagian Role
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Kalau email & password bener
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // CEK ROLE DISINI
            if (Auth::user()->role === 'yayasan') {
                return redirect()->route('admin.dashboard'); // <--- GANTI DI SINI JUGA
            }

            return redirect()->route('dashboard'); // Lempar ke Lembaga
        }

        // Kalau password salah
        return back()->withErrors([
            'email' => 'Email atau Password salah bro.',
        ])->onlyInput('email');
    }

    // 3. Proses Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}