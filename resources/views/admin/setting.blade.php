@extends('layouts.admin')

@section('content')
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <span class="text-gray-400">PORTAL YAYASAN</span>
        <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </span>
        <span class="text-[#1c7b5b]">PENGATURAN</span>
    </div>

    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4 mb-6 sm:mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Pengaturan Akun</h2>
            <p class="text-gray-500 text-[14px]">Kelola profil, keamanan, dan preferensi akun Super Admin Anda.</p>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-50 border border-green-200 text-green-700 px-5 py-3.5 rounded-sm mb-6 text-[13px] font-semibold flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <polyline points="22 4 12 14.01 9 11.01" />
            </svg>
            {{ session('success') }}
        </div>
    @endif
    @if($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 px-5 py-3.5 rounded-sm mb-6 text-[13px] font-semibold flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="10" />
                <line x1="15" y1="9" x2="9" y2="15" />
                <line x1="9" y1="9" x2="15" y2="15" />
            </svg>
            {{ $errors->first() }}
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- Kolom Kiri: Info Profil --}}
        <div class="lg:col-span-1">
            <div class="bg-white rounded-sm shadow-sm border border-gray-200 p-6 text-center">
                <div class="w-20 h-20 rounded-full bg-[#1e293b] text-white flex items-center justify-center text-2xl font-bold mx-auto mb-4">
                    {{ strtoupper(substr($user->name, 0, 2)) }}
                </div>
                <h3 class="text-[16px] font-bold text-[#1e293b] mb-1">{{ $user->name }}</h3>
                <p class="text-[12px] text-gray-500 mb-1">{{ $user->email }}</p>
                <span class="inline-block bg-amber-100 text-amber-700 text-[10px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-wider mt-2">
                    Super Admin
                </span>

                <div class="mt-6 pt-5 border-t border-gray-100 space-y-3 text-left">
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 shrink-0">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Bergabung Sejak</p>
                            <p class="text-[13px] text-gray-700 font-medium">{{ $user->created_at->translatedFormat('d F Y') }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400 shrink-0">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider">Hak Akses</p>
                            <p class="text-[13px] text-gray-700 font-medium">Akses Penuh (Yayasan)</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Info Sistem --}}
            <div class="bg-white rounded-sm shadow-sm border border-gray-200 p-6 mt-6">
                <h4 class="text-[13px] font-bold text-[#1e293b] mb-4 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#1c7b5b]">
                        <circle cx="12" cy="12" r="10" />
                        <line x1="12" y1="16" x2="12" y2="12" />
                        <line x1="12" y1="8" x2="12.01" y2="8" />
                    </svg>
                    Informasi Sistem
                </h4>
                <div class="space-y-3 text-[12px]">
                    <div class="flex justify-between items-center py-2 border-b border-gray-50">
                        <span class="text-gray-500 font-medium">Versi Aplikasi</span>
                        <span class="font-bold text-[#1e293b] bg-gray-100 px-2 py-0.5 rounded-sm text-[11px]">v2.4.1</span>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-50">
                        <span class="text-gray-500 font-medium">Framework</span>
                        <span class="font-bold text-[#1e293b]">Laravel {{ app()->version() }}</span>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-500 font-medium">PHP</span>
                        <span class="font-bold text-[#1e293b]">{{ phpversion() }}</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Kolom Kanan: Form Settings --}}
        <div class="lg:col-span-2 space-y-6">
            {{-- Form Ubah Profil --}}
            <div class="bg-white rounded-sm shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                        <circle cx="12" cy="7" r="4" />
                    </svg>
                    <h3 class="text-[15px] font-bold text-[#1e293b]">Informasi Profil</h3>
                </div>
                <form action="{{ route('admin.setting.profile') }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" required
                                class="w-full border border-gray-200 rounded-sm px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#1c7b5b] focus:ring-1 focus:ring-[#1c7b5b]/20 transition-colors">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Alamat Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" required
                                class="w-full border border-gray-200 rounded-sm px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#1c7b5b] focus:ring-1 focus:ring-[#1c7b5b]/20 transition-colors">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-6 py-2.5 rounded-sm text-[13px] font-bold transition-colors shadow-sm flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            {{-- Form Ganti Password --}}
            <div class="bg-white rounded-sm shadow-sm border border-gray-200">
                <div class="px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                        stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                        <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                    </svg>
                    <h3 class="text-[15px] font-bold text-[#1e293b]">Keamanan — Ganti Password</h3>
                </div>
                <form action="{{ route('admin.setting.password') }}" method="POST" class="p-6">
                    @csrf
                    @method('PUT')
                    <div class="space-y-5">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Password Saat Ini</label>
                            <input type="password" name="current_password" required
                                class="w-full border border-gray-200 rounded-sm px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#1c7b5b] focus:ring-1 focus:ring-[#1c7b5b]/20 transition-colors"
                                placeholder="Masukkan password lama Anda">
                        </div>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <div>
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Password Baru</label>
                                <input type="password" name="password" required
                                    class="w-full border border-gray-200 rounded-sm px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#1c7b5b] focus:ring-1 focus:ring-[#1c7b5b]/20 transition-colors"
                                    placeholder="Minimal 8 karakter">
                            </div>
                            <div>
                                <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" required
                                    class="w-full border border-gray-200 rounded-sm px-4 py-2.5 text-[13px] text-gray-800 focus:outline-none focus:border-[#1c7b5b] focus:ring-1 focus:ring-[#1c7b5b]/20 transition-colors"
                                    placeholder="Ketik ulang password baru">
                            </div>
                        </div>
                        <p class="text-[11px] text-gray-400 flex items-center gap-1.5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <line x1="12" y1="16" x2="12" y2="12" />
                                <line x1="12" y1="8" x2="12.01" y2="8" />
                            </svg>
                            Password baru harus minimal 8 karakter. Gunakan kombinasi huruf, angka, dan simbol untuk keamanan lebih baik.
                        </p>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit"
                            class="bg-[#1e293b] hover:bg-gray-800 text-white px-6 py-2.5 rounded-sm text-[13px] font-bold transition-colors shadow-sm flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                            Perbarui Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
