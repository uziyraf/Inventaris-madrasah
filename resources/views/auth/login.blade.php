@extends('layouts.auth')

@section('title', 'Masuk ke Akun Anda')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-[#1e293b] mb-2 tracking-tight">Selamat Datang Kembali</h2>
        <p class="text-gray-500 text-[14px]">Silakan masukkan kredensial Anda untuk mengakses sistem.</p>
    </div>

    <form action="#" method="POST" class="space-y-5">
        @csrf
        <!-- Email Input -->
        <div>
            <label for="email" class="block text-[13px] font-bold text-gray-700 mb-1.5">Alamat Email</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                </div>
                <input type="email" name="email" id="email" required class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md text-[14px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 shadow-sm transition-colors" placeholder="nama@institusi.edu">
            </div>
        </div>

        <!-- Password Input -->
        <div>
            <label for="password" class="block text-[13px] font-bold text-gray-700 mb-1.5">Kata Sandi</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                </div>
                <input type="password" name="password" id="password" required class="block w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-md text-[14px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 shadow-sm transition-colors" placeholder="••••••••">
                <button type="button" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
            </div>
        </div>

        <!-- Remember & Forgot -->
        <div class="flex items-center justify-between mt-2">
            <div class="flex items-center">
                <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 text-[#1c7b5b] focus:ring-[#1c7b5b] border-gray-300 rounded cursor-pointer transition-colors">
                <label for="remember-me" class="ml-2 block text-[13px] text-gray-600 cursor-pointer">
                    Ingat saya
                </label>
            </div>

            <div class="text-[13px]">
                <a href="#" class="font-bold text-[#1c7b5b] hover:text-[#155d44] hover:underline transition-all">
                    Lupa kata sandi?
                </a>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-2">
            <button type="submit" class="w-full flex justify-center items-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-[14px] font-bold text-white bg-[#1c7b5b] hover:bg-[#155d44] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1c7b5b] transition-colors">
                Masuk ke Dasbor
            </button>
        </div>
    </form>

    <!-- Register Link -->
    <div class="mt-8 text-center text-[13px] text-gray-600">
        Belum memiliki akun? 
        <a href="{{ route('register') }}" class="font-bold text-[#1c7b5b] hover:text-[#155d44] hover:underline transition-all">
            Daftar sekarang
        </a>
    </div>


@endsection
