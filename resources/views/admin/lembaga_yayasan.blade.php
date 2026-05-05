@extends('layouts.app')

@section('content')
    <div x-data="{ 
        modalOpen: false, 
        selectedLembaga: null,

        openModal(lembaga) {
            this.selectedLembaga = lembaga;
            this.modalOpen = true;
        }
    }">
        <!-- Breadcrumbs -->
        <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
            <span class="text-gray-400">YAYASAN</span>
            <span class="text-gray-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6" />
                </svg>
            </span>
            <span class="text-[#1c7b5b]">DATA LEMBAGA</span>
        </div>

        <!-- Page Header -->
        <div class="flex justify-between items-start mb-8">
            <div>
                <h2 class="text-[28px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Daftar Lembaga Naungan</h2>
                <p class="text-gray-500 text-[14px]">Pantau informasi dan legalitas seluruh madrasah di bawah yayasan.</p>
            </div>
            <div class="flex gap-3">
                <button
                    class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah Lembaga Baru
                </button>
            </div>
        </div>

        <!-- Cards Grid (Looping Data Lembaga) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @forelse($lembagas as $lembaga)
                <!-- Card Lembaga -->
                <div @click="openModal({{ json_encode($lembaga) }})"
                    class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden hover:border-[#1c7b5b] transition-all hover:shadow-md group cursor-pointer flex flex-col h-full">

                    <div
                        class="p-5 border-b border-gray-100 bg-gray-50/50 flex flex-col gap-3 group-hover:bg-[#f0fbf7]/50 transition-colors">
                        <div class="flex justify-between items-start">
                            <div class="w-10 h-10 rounded-sm bg-[#1c7b5b] text-white flex items-center justify-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                    <polyline points="9 22 9 12 15 12 15 22" />
                                </svg>
                            </div>
                            <span
                                class="bg-[#e2f5ec] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm uppercase border border-[#1c7b5b]/10">Aktif</span>
                        </div>
                        <div>
                            <h3 class="text-[16px] font-bold text-[#1e293b] leading-tight mb-1">
                                {{ $lembaga->nama_madrasah ?? 'Lembaga Belum Dinamai' }}</h3>
                            <p class="text-[11px] font-mono text-gray-400">NSM: {{ $lembaga->nsm ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="p-5 flex-1 flex flex-col justify-between">
                        <div class="space-y-3 mb-4">
                            <div class="flex items-start gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="text-gray-400 mt-0.5 shrink-0">
                                    <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z" />
                                    <circle cx="12" cy="10" r="3" />
                                </svg>
                                <span class="text-[12px] text-gray-600 line-clamp-2">{{ $lembaga->desa ?? '-' }}, Kec.
                                    {{ $lembaga->kecamatan ?? '-' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="text-gray-400 shrink-0">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                <span class="text-[12px] text-gray-600">{{ $lembaga->waktu_penyelenggaraan ?? '-' }}</span>
                            </div>
                        </div>

                        <div
                            class="pt-4 border-t border-gray-100 flex items-center justify-between text-[11px] font-bold text-gray-500 uppercase tracking-wider">
                            <span class="text-[#1c7b5b] group-hover:underline">Lihat Detail &rarr;</span>
                            <span>Est. {{ $lembaga->tahun_berdiri ?? '-' }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full bg-white p-10 text-center rounded-sm border border-gray-200 shadow-sm">
                    <p class="text-gray-500">Belum ada lembaga yang didaftarkan ke yayasan.</p>
                </div>
            @endforelse
        </div>

        <!-- Modal Popup Detail Lembaga -->
        <div x-show="modalOpen" class="fixed inset-0 z-[100] flex items-center justify-center" style="display: none;"
            x-cloak>
            <!-- Backdrop -->
            <div x-show="modalOpen" x-transition.opacity class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"
                @click="modalOpen = false"></div>

            <!-- Modal Box -->
            <div x-show="modalOpen" x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4 scale-95"
                x-transition:enter-end="opacity-100 translate-y-0 scale-100"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0 scale-100"
                x-transition:leave-end="opacity-0 translate-y-4 scale-95"
                class="relative w-full max-w-3xl bg-white rounded-md shadow-2xl overflow-hidden m-4 flex flex-col max-h-[90vh]">

                <!-- Modal Header -->
                <div class="px-8 py-5 border-b border-gray-100 flex justify-between items-start bg-gray-50/80 shrink-0">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 rounded bg-[#1c7b5b] text-white flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-[20px] font-bold text-[#1e293b]"
                                x-text="selectedLembaga?.nama_madrasah || 'Nama Belum Diisi'"></h3>
                            <p class="text-[13px] text-gray-500 mt-0.5" x-text="`NSM: ${selectedLembaga?.nsm || '-'}`"></p>
                        </div>
                    </div>
                    <button @click="modalOpen = false"
                        class="text-gray-400 hover:text-red-500 transition-colors p-2 rounded-full hover:bg-red-50">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>

                <!-- Modal Body (Scrollable Content) -->
                <div class="overflow-y-auto flex-1 p-8 bg-white">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                        <!-- Kolom Kiri -->
                        <div class="space-y-6">
                            <div>
                                <h4
                                    class="text-[11px] font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2 mb-3">
                                    Informasi Lokasi & Kontak</h4>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">Alamat Lengkap</p>
                                        <p class="text-[13px] font-bold text-gray-800"
                                            x-text="selectedLembaga?.alamat || '-'"></p>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-[11px] text-gray-500 font-medium">Desa / Kelurahan</p>
                                            <p class="text-[13px] font-bold text-gray-800"
                                                x-text="selectedLembaga?.desa || '-'"></p>
                                        </div>
                                        <div>
                                            <p class="text-[11px] text-gray-500 font-medium">Kecamatan</p>
                                            <p class="text-[13px] font-bold text-gray-800"
                                                x-text="selectedLembaga?.kecamatan || '-'"></p>
                                        </div>
                                    </div>
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">No. Telepon / Kontak</p>
                                        <p class="text-[13px] font-bold text-gray-800"
                                            x-text="selectedLembaga?.no_telp || '-'"></p>
                                    </div>
                                </div>
                            </div>

                            <div>
                                <h4
                                    class="text-[11px] font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2 mb-3">
                                    Informasi Yayasan</h4>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">Nama Yayasan Penaung</p>
                                        <p class="text-[13px] font-bold text-gray-800"
                                            x-text="selectedLembaga?.nama_yayasan || '-'"></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">SK Menkumham</p>
                                        <p class="text-[13px] font-bold text-gray-800"
                                            x-text="selectedLembaga?.sk_menkumham || '-'"></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">Alamat Yayasan</p>
                                        <p class="text-[13px] font-bold text-gray-800"
                                            x-text="selectedLembaga?.alamat_yayasan || '-'"></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="space-y-6">
                            <div>
                                <h4
                                    class="text-[11px] font-bold text-gray-400 uppercase tracking-widest border-b border-gray-100 pb-2 mb-3">
                                    Akademik & Operasional</h4>
                                <div class="space-y-3">
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">Tahun Berdiri</p>
                                        <p class="text-[13px] font-bold text-gray-800"
                                            x-text="selectedLembaga?.tahun_berdiri || '-'"></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">Ijin Operasional</p>
                                        <p class="text-[13px] font-bold text-gray-800"
                                            x-text="selectedLembaga?.ijin_operasional || '-'"></p>
                                    </div>
                                    <div>
                                        <p class="text-[11px] text-gray-500 font-medium">Kurikulum yang Digunakan</p>
                                        <span
                                            class="inline-block mt-1 bg-blue-50 text-blue-700 text-[11px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-wider"
                                            x-text="selectedLembaga?.kurikulum || 'Belum Diatur'"></span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-4 pt-2">
                                        <div class="bg-gray-50 p-3 rounded-sm border border-gray-100">
                                            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider mb-1">
                                                Waktu</p>
                                            <p class="text-[12px] font-bold text-gray-800"
                                                x-text="selectedLembaga?.waktu_penyelenggaraan || '-'"></p>
                                        </div>
                                        <div class="bg-gray-50 p-3 rounded-sm border border-gray-100">
                                            <p class="text-[10px] text-gray-500 font-bold uppercase tracking-wider mb-1">Jam
                                                KBM</p>
                                            <p class="text-[12px] font-bold text-gray-800"
                                                x-text="selectedLembaga?.jam_kbm || '-'"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="px-8 py-4 border-t border-gray-100 bg-gray-50/50 flex justify-between items-center shrink-0">
                    <button class="text-[12px] font-bold text-[#1c7b5b] hover:underline flex items-center gap-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7" />
                            <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z" />
                        </svg>
                        Edit Data Lembaga Ini
                    </button>
                    <button @click="modalOpen = false"
                        class="px-6 py-2.5 text-[13px] font-bold text-white bg-gray-800 hover:bg-gray-900 rounded-sm transition-colors shadow-sm">Tutup
                        Panel</button>
                </div>
            </div>
        </div>
    </div>
@endsection