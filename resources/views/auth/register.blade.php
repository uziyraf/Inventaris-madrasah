@extends('layouts.auth')

@section('title', 'Daftar Akun Baru')

@section('content')
    <div class="mb-8">
        <h2 class="text-3xl font-extrabold text-[#1e293b] mb-2 tracking-tight">Buat Akun Baru</h2>
        <p class="text-gray-500 text-[14px]">Bergabunglah untuk mulai mengelola atau meminjam inventaris institusi.</p>
    </div>

    <form action="#" method="POST" class="space-y-4">
        @csrf
        
        <!-- Name Input -->
        <div>
            <label for="name" class="block text-[13px] font-bold text-gray-700 mb-1.5">Nama Lengkap</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                </div>
                <input type="text" name="name" id="name" required class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md text-[14px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 shadow-sm transition-colors" placeholder="Cth: Aris Setiawan">
            </div>
        </div>



        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
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

            <!-- Phone Input -->
            <div>
                <label for="phone" class="block text-[13px] font-bold text-gray-700 mb-1.5">Nomor Telepon</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    </div>
                    <input type="tel" name="phone" id="phone" required class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md text-[14px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 shadow-sm transition-colors" placeholder="081234567890">
                </div>
            </div>
        </div>

        <!-- Address Input -->
        <div>
            <label for="address" class="block text-[13px] font-bold text-gray-700 mb-1.5">Alamat Lengkap</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                </div>
                <input type="text" name="address" id="address" required class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md text-[14px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 shadow-sm transition-colors" placeholder="Cth: Jl. Raya Madrasah No. 123">
            </div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <!-- Password Input -->
            <div>
                <label for="password" class="block text-[13px] font-bold text-gray-700 mb-1.5">Kata Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                    </div>
                    <input type="password" name="password" id="password" required class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md text-[14px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 shadow-sm transition-colors" placeholder="••••••••">
                </div>
            </div>

            <!-- Confirm Password Input -->
            <div>
                <label for="password_confirmation" class="block text-[13px] font-bold text-gray-700 mb-1.5">Konfirmasi Sandi</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                    </div>
                    <input type="password" name="password_confirmation" id="password_confirmation" required class="block w-full pl-10 pr-3 py-2.5 border border-gray-300 rounded-md text-[14px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 shadow-sm transition-colors" placeholder="••••••••">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="pt-4">
            <button type="submit" class="w-full flex justify-center items-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-[14px] font-bold text-white bg-[#1c7b5b] hover:bg-[#155d44] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#1c7b5b] transition-colors">
                Daftar Akun
            </button>
        </div>
    </form>

    <!-- Login Link -->
    <div class="mt-6 text-center text-[13px] text-gray-600">
        Sudah memiliki akun? 
        <a href="{{ route('login') }}" class="font-bold text-[#1c7b5b] hover:text-[#155d44] hover:underline transition-all">
            Masuk di sini
        </a>
    </div>
@endsection
