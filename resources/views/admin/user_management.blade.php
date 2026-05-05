@extends('layouts.app')

@section('content')
    <div x-data="{ modalOpen: false, selectedRole: 'lembaga' }">
        <!-- Header -->
        <div class="flex justify-between items-start mb-8">
            <div>
                <h2 class="text-[28px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Manajemen Pengguna</h2>
                <p class="text-gray-500 text-[14px]">Kelola akun akses untuk Super Admin Yayasan dan Admin Lembaga.</p>
            </div>
            <button @click="modalOpen = true"
                class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Buat Akun Baru
            </button>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 px-4 py-3 rounded-sm mb-6 font-bold text-sm">
                {{ session('success') }}
            </div>
        @endif
        @if($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-3 rounded-sm mb-6 font-bold text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Tabel User -->
        <div class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-left text-sm text-gray-600">
                <thead
                    class="text-[11px] text-gray-500 font-bold tracking-widest uppercase bg-gray-50/50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4">NAMA & EMAIL</th>
                        <th class="px-6 py-4">HAK AKSES (ROLE)</th>
                        <th class="px-6 py-4">LEMBAGA / SEKOLAH</th>
                        <th class="px-6 py-4">TANGGAL DIBUAT</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <p class="font-bold text-[#1e293b] text-[14px]">{{ $user->name }}</p>
                                <p class="text-[12px] text-gray-500">{{ $user->email }}</p>
                            </td>
                            <td class="px-6 py-4">
                                @if($user->role == 'yayasan')
                                    <span
                                        class="bg-amber-100 text-amber-700 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">SUPER
                                        ADMIN</span>
                                @else
                                    <span
                                        class="bg-blue-100 text-blue-700 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">ADMIN
                                        LEMBAGA</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-medium text-[13px]">
                                {{ $user->lembaga ? $user->lembaga->nama_madrasah : 'Global (Semua Lembaga)' }}
                            </td>
                            <td class="px-6 py-4 text-[12px] text-gray-500">
                                {{ $user->created_at->format('d M Y') }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah Akun -->
        <div x-show="modalOpen" class="fixed inset-0 z-[100] flex items-center justify-center" style="display: none;"
            x-cloak>
            <div x-show="modalOpen" x-transition.opacity class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"
                @click="modalOpen = false"></div>

            <div x-show="modalOpen" x-transition
                class="relative w-full max-w-lg bg-white rounded-md shadow-2xl m-4 flex flex-col">
                <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/80">
                    <h3 class="text-[18px] font-bold text-[#1e293b]">Buat Akun Pengguna</h3>
                    <button @click="modalOpen = false" class="text-gray-400 hover:text-red-500 p-2"><svg
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></button>
                </div>

                <form action="{{ route('yayasan.users.store') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Pengguna</label>
                        <input type="text" name="name" required
                            class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Email Login</label>
                        <input type="email" name="email" required
                            class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Password Awal</label>
                        <input type="password" name="password" required
                            class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"
                            value="password123">
                        <p class="text-[10px] text-gray-400 mt-1">Default: password123</p>
                    </div>

                    <!-- Pilihan Role dengan Alpine JS -->
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Hak Akses (Role)</label>
                        <select name="role" x-model="selectedRole" required
                            class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                            <option value="lembaga">Admin Lembaga (Akses Terbatas)</option>
                            <option value="yayasan">Super Admin Yayasan (Akses Penuh)</option>
                        </select>
                    </div>

                    <!-- Dropdown Lembaga hanya muncul jika role == lembaga -->
                    <div x-show="selectedRole === 'lembaga'">
                        <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Pilih Lembaga /
                            Sekolah</label>
                        <select name="lembaga_id"
                            class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"
                            :required="selectedRole === 'lembaga'">
                            <option value="">-- Pilih Lembaga --</option>
                            @foreach($lembagas as $lembaga)
                                <option value="{{ $lembaga->id }}">{{ $lembaga->nama_madrasah ?? 'Lembaga Belum Dinamai' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="pt-4 flex justify-end gap-3 border-t border-gray-100 mt-6">
                        <button type="button" @click="modalOpen = false"
                            class="px-5 py-2 text-[13px] font-bold text-gray-500 hover:text-gray-700 transition-colors">Batal</button>
                        <button type="submit"
                            class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2 rounded-sm text-[13px] font-bold transition-colors shadow-sm">Simpan
                            Akun</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection