@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-[13px] font-medium mb-3">
        <a href="{{ route('users') }}" class="text-[#1c7b5b] hover:underline">Manajemen Pengguna</a>
        <span class="text-gray-400">
            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
        <span class="text-gray-500">Buat Pengguna Baru</span>
    </div>

    <!-- Page Header -->
    <div class="mb-8">
        <h2 class="text-[22px] font-bold text-gray-900 mb-1.5 tracking-tight">Buat Pengguna Baru</h2>
        <p class="text-gray-500 text-[14px]">Konfigurasikan detail akun. Pengguna ini akan memiliki akses ke portal institusi berdasarkan peran yang diberikan.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 pb-20">
        <!-- Main Form Area -->
        <div class="lg:col-span-8 bg-white rounded-sm shadow-sm border border-gray-100 p-8">
            <form action="#" method="POST">
                <!-- Section 1: Identitas Pengguna -->
                <div class="mb-8">
                    <h3 class="text-[10px] font-bold text-[#1c7b5b] tracking-wider uppercase mb-5">IDENTITAS PENGGUNA</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[13px] font-medium text-gray-700 mb-1.5">Nama Pengguna</label>
                            <input type="text" placeholder="misal: jsmith_admin" class="w-full border border-gray-200 rounded-sm px-3 py-2 text-[13px] focus:ring-1 focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 transition-colors">
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-gray-700 mb-1.5">Alamat Email</label>
                            <input type="email" placeholder="jsmith@lembaga.edu" class="w-full border border-gray-200 rounded-sm px-3 py-2 text-[13px] focus:ring-1 focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400 transition-colors">
                        </div>
                    </div>
                </div>

                <hr class="border-gray-100 mb-8">

                <!-- Section 2: Akses & Keamanan -->
                <div class="mb-8">
                    <h3 class="text-[10px] font-bold text-[#1c7b5b] tracking-wider uppercase mb-5">AKSES & KEAMANAN</h3>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-[13px] font-medium text-gray-700 mb-1.5">Penetapan Peran</label>
                            <div class="relative">
                                <select class="w-full border border-gray-200 rounded-sm px-3 py-2 text-[13px] focus:ring-1 focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-700 appearance-none bg-white transition-colors cursor-pointer">
                                    <option value="" disabled selected>Pilih peran...</option>
                                    <option value="admin">Admin</option>
                                    <option value="guru">Guru</option>
                                    <option value="staf">Staf</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-gray-700 mb-1.5">Lembaga</label>
                            <div class="relative">
                                <select class="w-full border border-gray-200 rounded-sm pl-3 pr-10 py-2 text-[13px] focus:ring-1 focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-700 appearance-none bg-white transition-colors cursor-pointer">
                                    <option value="kampus_pusat" selected>Kampus Pusat</option>
                                    <option value="cabang_utara">Cabang Utara</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 border-l border-gray-100">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="ml-2"><path d="M4 10h16"/><path d="M4 14h16"/><path d="M4 22h16"/><path d="M2 22h20"/><path d="M12 2 2 7l10 5 10-5-10-5z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-[13px] font-medium text-gray-700 mb-1.5">Kata Sandi</label>
                            <div class="relative">
                                <input type="password" value="password123" class="w-full border border-gray-200 rounded-sm px-3 py-2 text-[13px] focus:ring-1 focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 transition-colors tracking-widest font-mono">
                                <button type="button" class="absolute inset-y-0 right-0 flex items-center px-3 text-gray-400 hover:text-gray-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="block text-[13px] font-medium text-gray-700 mb-1.5">Konfirmasi Kata Sandi</label>
                            <input type="password" value="password123" class="w-full border border-gray-200 rounded-sm px-3 py-2 text-[13px] focus:ring-1 focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 transition-colors tracking-widest font-mono">
                        </div>
                    </div>
                </div>

                <!-- Form Actions -->
                <div class="flex justify-end gap-3 mt-10">
                    <button type="button" class="px-5 py-2.5 border border-gray-200 rounded-sm text-[13px] font-semibold text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                        Batal
                    </button>
                    <button type="submit" class="px-5 py-2.5 rounded-sm text-[13px] font-semibold text-white bg-[#1c7b5b] hover:bg-[#155d44] transition-colors shadow-sm">
                        Buat Akun
                    </button>
                </div>
            </form>
        </div>

        <!-- Sidebar Area -->
        <div class="lg:col-span-4 space-y-4">
            <!-- Panduan Akun Card -->
            <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6">
                <h3 class="text-[13px] font-bold text-gray-900 mb-4">Panduan Akun</h3>
                <ul class="space-y-4">
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-5 h-5 mt-0.5 rounded-full bg-[#f0fbf7] border border-[#1c7b5b]/30 flex items-center justify-center text-[#1c7b5b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                        </div>
                        <p class="text-[12px] text-gray-600 leading-relaxed">Kata sandi minimal 12 karakter dan mencakup simbol khusus.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-5 h-5 mt-0.5 rounded-full bg-[#f0fbf7] border border-[#1c7b5b]/30 flex items-center justify-center text-[#1c7b5b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                        </div>
                        <p class="text-[12px] text-gray-600 leading-relaxed">Nama pengguna harus unik di semua cabang institusi.</p>
                    </li>
                    <li class="flex items-start gap-3">
                        <div class="flex-shrink-0 w-5 h-5 mt-0.5 rounded-full bg-[#f0fbf7] border border-[#1c7b5b]/30 flex items-center justify-center text-[#1c7b5b]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6 9 17l-5-5"/></svg>
                        </div>
                        <p class="text-[12px] text-gray-600 leading-relaxed">Tautan undangan akan dikirim ke alamat email yang diberikan setelah akun dibuat.</p>
                    </li>
                </ul>
            </div>

            <!-- Keamanan Lembaga Card -->
            <div class="bg-[#f2fbf7] rounded-sm border border-[#e2f5ec] p-6 relative overflow-hidden">
                <div class="relative z-10">
                    <h3 class="text-[13px] font-bold text-[#1c7b5b] mb-2">Keamanan Lembaga</h3>
                    <p class="text-[12px] text-[#2c5f4b] leading-relaxed mb-6">
                        Semua akun baru dicatat dalam jejak audit pusat. Pengambilalihan administratif memerlukan otentikasi multi-faktor.
                    </p>
                    <div class="flex items-center gap-2">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></span>
                        <span class="text-[10px] font-bold text-[#1c7b5b] tracking-wider uppercase">LINGKUNGAN AMAN</span>
                    </div>
                </div>
                <!-- Background shield icon -->
                <svg class="absolute -right-6 -bottom-6 w-32 h-32 text-[#e2f5ec]" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>

            <!-- Image/Banner Card -->
            <div class="relative rounded-sm overflow-hidden h-[140px] shadow-sm">
                <!-- Using a placeholder image of a library with a dark green overlay to match the design -->
                <div class="absolute inset-0 bg-[#155d44]/80 mix-blend-multiply z-10"></div>
                <img src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Library" class="absolute inset-0 w-full h-full object-cover filter grayscale">
                <div class="absolute inset-0 z-20 p-5 flex flex-col justify-end">
                    <h4 class="text-white text-[13px] font-bold">Akses Inventaris Global</h4>
                    <p class="text-white/80 text-[11px] font-medium mt-0.5">Mengelola 45.000+ Aset</p>
                </div>
            </div>
        </div>
    </div>
@endsection
