@extends('layouts.admin')

@section('content')
    <!-- Header -->
    <div class="mb-8 flex flex-col md:flex-row md:justify-between md:items-end gap-4">
        <div>
            <h2 class="text-[28px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Dasbor Super Admin</h2>
            <p class="text-gray-500 text-[14px]">Ringkasan data keseluruhan dari seluruh madrasah/lembaga di bawah naungan
                Yayasan.</p>
        </div>
        <div
            class="text-[13px] font-bold text-gray-500 bg-white px-4 py-2.5 rounded-sm border border-gray-200 shadow-sm flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="text-[#1c7b5b]">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                <line x1="16" y1="2" x2="16" y2="6" />
                <line x1="8" y1="2" x2="8" y2="6" />
                <line x1="3" y1="10" x2="21" y2="10" />
            </svg>
            {{ now()->translatedFormat('l, d F Y') }}
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-6 mb-8">

        <!-- Card Lembaga -->
        <div
            class="bg-white p-6 rounded-md border border-gray-200 shadow-sm flex items-center gap-4 hover:border-[#1c7b5b] transition-colors group cursor-default">
            <div
                class="w-14 h-14 rounded-full bg-emerald-50 text-[#1c7b5b] flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="2" width="16" height="20" rx="2" ry="2" />
                    <path d="M9 22v-4h6v4" />
                    <path d="M8 6h.01" />
                    <path d="M16 6h.01" />
                    <path d="M12 6h.01" />
                    <path d="M12 10h.01" />
                    <path d="M12 14h.01" />
                    <path d="M16 10h.01" />
                    <path d="M16 14h.01" />
                    <path d="M8 10h.01" />
                    <path d="M8 14h.01" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Lembaga</p>
                <h3 class="text-3xl font-black text-[#1e293b] leading-none">{{ $totalLembaga ?? 0 }}</h3>
            </div>
        </div>

        <!-- Card Guru -->
        <div
            class="bg-white p-6 rounded-md border border-gray-200 shadow-sm flex items-center gap-4 hover:border-blue-500 transition-colors group cursor-default">
            <div
                class="w-14 h-14 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                    <path d="M6 12v5c3 3 9 3 12 0v-5" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Guru</p>
                <h3 class="text-3xl font-black text-[#1e293b] leading-none">{{ $totalGuru ?? 0 }}</h3>
            </div>
        </div>

        <!-- Card Murid -->
        <div
            class="bg-white p-6 rounded-md border border-gray-200 shadow-sm flex items-center gap-4 hover:border-amber-500 transition-colors group cursor-default">
            <div
                class="w-14 h-14 rounded-full bg-amber-50 text-amber-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-1">Total Murid</p>
                <h3 class="text-3xl font-black text-[#1e293b] leading-none">{{ $totalMurid ?? 0 }}</h3>
            </div>
        </div>

        <!-- Card Pengurus -->
        <div
            class="bg-white p-6 rounded-md border border-gray-200 shadow-sm flex items-center gap-4 hover:border-purple-500 transition-colors group cursor-default">
            <div
                class="w-14 h-14 rounded-full bg-purple-50 text-purple-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-1">Data Pengurus</p>
                <h3 class="text-3xl font-black text-[#1e293b] leading-none">{{ $totalPengurus ?? 0 }}</h3>
            </div>
        </div>

        <!-- Card Inventaris -->
        <div
            class="bg-white p-6 rounded-md border border-gray-200 shadow-sm flex items-center gap-4 hover:border-rose-500 transition-colors group cursor-default">
            <div
                class="w-14 h-14 rounded-full bg-rose-50 text-rose-600 flex items-center justify-center shrink-0 group-hover:scale-110 transition-transform">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-gray-400 uppercase tracking-widest mb-1">Aset Inventaris</p>
                <h3 class="text-3xl font-black text-[#1e293b] leading-none">{{ $totalInventaris ?? 0 }}</h3>
            </div>
        </div>
    </div>

    <!-- Quick Action / Welcome Banner -->
    <div
        class="bg-[#1c7b5b] rounded-md p-8 text-white shadow-sm relative overflow-hidden flex flex-col md:flex-row items-center justify-between gap-8">
        <!-- Dekorasi -->
        <div class="absolute top-0 right-0 opacity-10 transform translate-x-1/4 -translate-y-1/4 pointer-events-none">
            <svg width="400" height="400" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
            </svg>
        </div>

        <div class="relative z-10 flex-1">
            <h3 class="text-[22px] font-bold mb-2 tracking-tight">Selamat Datang di Pusat Kendali Yayasan</h3>
            <p class="text-[#a7f3d0] max-w-3xl text-[14px] leading-relaxed">Anda memiliki akses tingkat Super Admin. Gunakan
                portal ini untuk memantau aktivitas akademik, kelembagaan, tenaga pendidik, hingga rekapitulasi aset
                inventaris dari seluruh cabang madrasah. Pastikan untuk menjaga kerahasiaan data.</p>
        </div>

        <div class="relative z-10 flex gap-3 shrink-0">
            <a href="{{ route('admin.lembaga') }}"
                class="bg-white text-[#1c7b5b] px-6 py-2.5 rounded-sm font-bold text-[13px] hover:bg-[#f0fbf7] transition-colors shadow-sm text-center">
                Kelola Lembaga
            </a>
            <a href="{{ route('admin.users') }}"
                class="bg-[#155d44] text-white px-6 py-2.5 rounded-sm font-bold text-[13px] hover:bg-[#0f4633] transition-colors border border-[#155d44] text-center">
                Akun Pengguna
            </a>
        </div>
    </div>
@endsection