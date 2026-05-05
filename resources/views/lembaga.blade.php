@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <span class="text-gray-400">PORTAL UTAMA</span>
        <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </span>
        <span class="text-[#1c7b5b]">PROFIL LEMBAGA</span>
    </div>

    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Profil & Identitas Madrasah</h2>
            <p class="text-gray-500 text-[14px]">Kelola informasi dasar, legalitas, dan detail operasional lembaga.</p>
        </div>
    </div>

    @if(session('success'))
        <div
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-6 flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14" />
                <polyline points="22 4 12 14.01 9 11.01" />
            </svg>
            <span class="font-semibold text-sm">{{ session('success') }}</span>
        </div>
    @endif

    <form action="{{ route('lembaga.update') }}" method="POST" class="pb-12">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded-sm shadow-sm border border-gray-200 p-6">
                    <h3
                        class="text-base font-bold text-[#1e293b] mb-6 flex items-center gap-2 border-b border-gray-100 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="#1c7b5b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg>
                        Identitas Utama
                    </h3>

                    <div class="grid grid-cols-2 gap-5">
                        <div class="col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Madrasah</label>
                            <input type="text" name="nama_madrasah" value="{{ $lembaga->nama_madrasah }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">No. Statistik Madrasah
                                (NSM)</label>
                            <input type="text" name="nsm" value="{{ $lembaga->nsm }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tahun Berdiri</label>
                            <input type="number" name="tahun_berdiri" value="{{ $lembaga->tahun_berdiri }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Alamat Lengkap</label>
                            <textarea name="alamat" rows="2"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">{{ $lembaga->alamat }}</textarea>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Desa / Kelurahan</label>
                            <input type="text" name="desa" value="{{ $lembaga->desa }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Kecamatan</label>
                            <input type="text" name="kecamatan" value="{{ $lembaga->kecamatan }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nomor Telepon
                                Madrasah</label>
                            <input type="text" name="no_telp" value="{{ $lembaga->no_telp }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-sm shadow-sm border border-gray-200 p-6">
                    <h3
                        class="text-base font-bold text-[#1e293b] mb-6 flex items-center gap-2 border-b border-gray-100 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="#1c7b5b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z" />
                            <polyline points="14 2 14 8 20 8" />
                            <line x1="16" y1="13" x2="8" y2="13" />
                            <line x1="16" y1="17" x2="8" y2="17" />
                            <polyline points="10 9 9 9 8 9" />
                        </svg>
                        Legalitas & Informasi Yayasan
                    </h3>

                    <div class="grid grid-cols-2 gap-5">
                        <div class="col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Ijin Operasional
                                Madrasah</label>
                            <input type="text" name="ijin_operasional" value="{{ $lembaga->ijin_operasional }}"
                                placeholder="Nomor Surat Ijin Operasional"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Yayasan
                                Penaung</label>
                            <input type="text" name="nama_yayasan" value="{{ $lembaga->nama_yayasan }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">SK Menkumham
                                Yayasan</label>
                            <input type="text" name="sk_menkumham" value="{{ $lembaga->sk_menkumham }}"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Alamat Yayasan</label>
                            <textarea name="alamat_yayasan" rows="2"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">{{ $lembaga->alamat_yayasan }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-sm shadow-sm border border-gray-200 p-6">
                    <h3
                        class="text-base font-bold text-[#1e293b] mb-6 flex items-center gap-2 border-b border-gray-100 pb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                            stroke="#1c7b5b" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        Akademik & Operasional
                    </h3>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Kurikulum yang
                                Digunakan</label>
                            <input type="text" name="kurikulum" value="{{ $lembaga->kurikulum }}"
                                placeholder="Contoh: Kurikulum Merdeka"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Waktu
                                Penyelenggaraan</label>
                            <select name="waktu_penyelenggaraan"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                                <option value="">Pilih Waktu...</option>
                                <option value="Pagi" {{ $lembaga->waktu_penyelenggaraan == 'Pagi' ? 'selected' : '' }}>Pagi
                                </option>
                                <option value="Siang" {{ $lembaga->waktu_penyelenggaraan == 'Siang' ? 'selected' : '' }}>Siang
                                </option>
                                <option value="Pagi & Siang (Kombinasi)" {{ $lembaga->waktu_penyelenggaraan == 'Pagi & Siang (Kombinasi)' ? 'selected' : '' }}>Pagi & Siang (Kombinasi)</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Jam Penyelenggaraan
                                KBM</label>
                            <input type="text" name="jam_kbm" value="{{ $lembaga->jam_kbm }}"
                                placeholder="Contoh: 07.00 - 13.00 WIB"
                                class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        </div>
                    </div>
                </div>

                <div class="bg-[#f0fbf7] rounded-sm border border-[#e2f5ec] p-6 relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-base font-bold text-[#1c7b5b] mb-2">Simpan Perubahan</h3>
                        <p class="text-[12px] text-[#2c5f4b] mb-5 leading-relaxed">
                            Pastikan semua data identitas madrasah dan yayasan sudah diisi dengan benar sebelum menyimpan.
                        </p>
                        <button type="submit"
                            class="w-full bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-3 rounded-sm font-bold text-[13px] flex items-center justify-center gap-2 shadow-sm transition-colors uppercase tracking-wider">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z" />
                                <polyline points="17 21 17 13 7 13 7 21" />
                                <polyline points="7 3 7 8 15 8" />
                            </svg>
                            SIMPAN PROFIL
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </form>
@endsection