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
        <span class="text-[#1c7b5b]">REKAP DATA MURID</span>
    </div>

    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Rekapitulasi Data Murid</h2>
            <p class="text-gray-500 text-[14px]">Pantau informasi murid dan peminjaman inventaris dari seluruh madrasah.</p>
        </div>
        <div class="flex gap-3">
            <button
                class="bg-white border border-gray-200 text-[#1e293b] hover:bg-gray-50 px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                    <polyline points="7 10 12 15 17 10" />
                    <line x1="12" y1="15" x2="12" y2="3" />
                </svg>
                Ekspor CSV
            </button>
            <!-- Tombol Tambah Dihapus -->
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TOTAL MURID KESELURUHAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">
                {{ method_exists($santris, 'total') ? $santris->total() : $santris->count() }}</h3>
            <p class="text-[12px] font-bold text-[#1c7b5b]">Terdaftar di semua lembaga</p>
        </div>

        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">PEMINJAMAN GLOBAL</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">0</h3>
            <p class="text-[12px] font-medium text-gray-500">Peralatan keluar</p>
        </div>

        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TERLAMBAT KEMBALI</p>
                <div class="bg-red-50 p-1 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                        <line x1="12" y1="9" x2="12" y2="13" />
                        <line x1="12" y1="17" x2="12.01" y2="17" />
                    </svg>
                </div>
            </div>
            <h3 class="text-[32px] font-bold text-[#ef4444] mb-2 leading-none">0</h3>
            <p class="text-[12px] font-medium text-gray-500">Butuh tindak lanjut</p>
        </div>

        <div class="bg-[#207e60] p-6 rounded-sm shadow-sm text-white relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-white/90 tracking-wider uppercase">ALOKASI TABLET GLOBAL</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="4" y="2" width="16" height="20" rx="2" ry="2" />
                    <line x1="12" y1="18" x2="12.01" y2="18" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-white mb-4 leading-none">85%</h3>
            <div class="w-full bg-black/20 rounded-full h-1.5 mb-2">
                <div class="bg-white h-1.5 rounded-full" style="width: 85%"></div>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-white">
            <div class="flex gap-3 items-center">
                <button
                    class="flex items-center gap-2 text-[11px] font-bold text-[#1e293b] border border-gray-200 rounded-sm px-3 py-1.5 hover:bg-gray-50 transition-colors uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="4" y1="21" x2="4" y2="14" />
                        <line x1="4" y1="10" x2="4" y2="3" />
                        <line x1="12" y1="21" x2="12" y2="12" />
                        <line x1="12" y1="8" x2="12" y2="3" />
                        <line x1="20" y1="21" x2="20" y2="16" />
                        <line x1="20" y1="12" x2="20" y2="3" />
                        <line x1="1" y1="14" x2="7" y2="14" />
                        <line x1="9" y1="8" x2="15" y2="8" />
                        <line x1="17" y1="16" x2="23" y2="16" />
                    </svg>
                    FILTER: SEMUA LEMBAGA
                </button>
            </div>

            <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">MENAMPILKAN DATA DARI SELURUH LEMBAGA
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="p-4 w-12 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm"></div>
                        </th>
                        <th scope="col" class="px-6 py-5">NAMA SANTRI</th>
                        <th scope="col" class="px-6 py-5">ASAL LEMBAGA</th>
                        <th scope="col" class="px-6 py-5">TTL</th>
                        <th scope="col" class="px-6 py-5">ALAMAT</th>
                        <th scope="col" class="px-6 py-5">NO. INDUK</th>
                        <th scope="col" class="px-6 py-5">KELAS</th>
                        <th scope="col" class="px-6 py-5">ASAL MADIN</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($santris as $santri)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4 text-center">
                                <div class="w-4 h-4 border border-gray-300 rounded-sm mx-auto"></div>
                            </td>
                            <td class="px-6 py-5 flex items-center gap-4">
                                <div
                                    class="w-9 h-9 rounded-sm bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-xs tracking-wide uppercase shrink-0">
                                    {{ strtoupper(substr($santri->nama_santri, 0, 2)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-[#1e293b] text-[13px] whitespace-nowrap">{{ $santri->nama_santri }}
                                    </p>
                                </div>
                            </td>
                            <!-- Kolom Baru: Asal Lembaga -->
                            <td class="px-6 py-5">
                                <span
                                    class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider whitespace-nowrap">
                                    {{ $santri->lembaga ? $santri->lembaga->nama_madrasah : 'Global' }}
                                </span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                <p class="text-[13px] text-gray-700 font-medium">{{ $santri->tempat_lahir }},</p>
                                <p class="text-[12px] text-gray-500 mt-0.5">
                                    {{ \Carbon\Carbon::parse($santri->tanggal_lahir)->translatedFormat('d M Y') }}
                                </p>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-[13px] text-gray-700 truncate max-w-[120px]" title="{{ $santri->alamat }}">
                                    {{ $santri->alamat }}
                                </p>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-[13px] text-gray-700 font-medium font-mono">{{ $santri->no_induk }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-[13px] text-gray-700 font-bold">{{ $santri->kelas }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <span class="text-[13px] text-gray-700">{{ $santri->asal_madin }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-6 py-10 text-center text-gray-500 text-sm">
                                Belum ada data murid di database. Data akan muncul jika Admin Lembaga menambahkannya.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($santris, 'links'))
            <div class="px-6 py-5 border-t border-gray-100">
                {{ $santris->links() }}
            </div>
        @endif
    </div>

    <!-- Statistik Aktivitas Global -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <div class="lg:col-span-2 bg-white rounded-sm shadow-sm border border-gray-100 p-6 flex flex-col">
            <h3 class="text-[16px] font-bold text-[#1e293b] mb-8">Statistik Peminjaman Inventaris (Global)</h3>
            <div class="flex-1 flex items-end justify-center gap-6 pb-2">
                <div class="w-20 bg-[#eef2f6] rounded-t-sm h-24 transition-all hover:bg-[#e2e8f0]"></div>
                <div class="w-20 bg-[#eef2f6] rounded-t-sm h-36 transition-all hover:bg-[#e2e8f0]"></div>
                <div class="w-20 bg-[#207e60] rounded-t-sm h-56 transition-all shadow-md"></div>
                <div class="w-20 bg-[#eef2f6] rounded-t-sm h-32 transition-all hover:bg-[#e2e8f0]"></div>
                <div class="w-20 bg-[#38a169] rounded-t-sm h-44 transition-all opacity-90 hover:opacity-100"></div>
            </div>
        </div>

        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6 flex flex-col">
            <h3 class="text-[16px] font-bold text-[#1e293b] mb-6">Aktivitas Terakhir Semua Lembaga</h3>
            <div class="flex-1 space-y-6">
                <div class="flex gap-4 relative">
                    <div class="w-2 h-2 rounded-full bg-[#207e60] mt-1.5 flex-shrink-0 z-10 relative"></div>
                    <div class="absolute top-3 left-1 w-px h-10 bg-gray-100 z-0"></div>
                    <div>
                        <h4 class="text-[13px] font-bold text-[#1e293b] mb-1">Sistem Siap Digunakan</h4>
                        <p class="text-[12px] text-gray-500 mb-2 leading-relaxed">Menunggu data aktivitas dari tiap lembaga.
                        </p>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">BARU SAJA</span>
                    </div>
                </div>
            </div>

            <button
                class="w-full mt-6 py-2.5 bg-white border border-gray-200 text-[#207e60] hover:bg-gray-50 rounded-sm text-[11px] font-bold uppercase tracking-wider transition-colors">
                LIHAT SEMUA LOG
            </button>
        </div>
    </div>
@endsection