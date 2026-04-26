@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <span class="text-gray-400">PORTAL UTAMA</span>
        <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
        <span class="text-[#1c7b5b]">INVENTARIS</span>
    </div>

    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Katalog Inventaris</h2>
            <p class="text-gray-500 text-[14px]">Lacak, kelola, dan audit seluruh aset dan peralatan di institusi.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-[#1e293b] hover:bg-gray-50 px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Ekspor Laporan
            </button>
            <button class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Aset
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Stat 1 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TOTAL ASET</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">4,521</h3>
            <p class="text-[12px] font-bold text-[#1c7b5b]">+45 item baru bulan ini</p>
        </div>

        <!-- Stat 2 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">DALAM PEMINJAMAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 12 16 12 14 15 10 15 8 12 2 12"/><path d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"/></svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">842</h3>
            <p class="text-[12px] font-medium text-gray-500">Sedang digunakan staf/murid</p>
        </div>

        <!-- Stat 3 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">PERLU PERAWATAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <h3 class="text-[32px] font-bold text-yellow-500 mb-2 leading-none">35</h3>
            <p class="text-[12px] font-medium text-gray-500">Jadwal bulan ini</p>
        </div>

        <!-- Stat 4 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border-t-[3px] border-t-[#ef4444] relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">RUSAK / HILANG</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#ef4444] mb-2 leading-none">12</h3>
            <p class="text-[12px] font-bold text-[#ef4444]">Memerlukan tindakan segera</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <!-- Table Toolbar -->
        <div class="p-4 border-b border-gray-100 flex flex-wrap justify-between items-center bg-gray-50/50 gap-4">
            <div class="flex flex-1 max-w-2xl items-center gap-3">
                <div class="relative w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" /></svg>
                    </div>
                    <input type="text" class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-sm text-[13px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400" placeholder="Cari nama aset, kode, atau serial...">
                </div>

                <button class="flex items-center gap-2 text-[11px] font-bold text-[#1e293b] border border-gray-200 bg-white rounded-sm px-3 py-2 hover:bg-gray-50 transition-colors uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                    KATEGORI
                </button>
                <button class="flex items-center gap-2 text-[11px] font-bold text-[#1e293b] border border-gray-200 bg-white rounded-sm px-3 py-2 hover:bg-gray-50 transition-colors uppercase tracking-wider">
                    KONDISI
                </button>
            </div>
            
            <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">MENAMPILKAN 1-5 DARI 4,521 ASET</p>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="p-4 w-12 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm"></div>
                        </th>
                        <th scope="col" class="px-6 py-5">NAMA ASET & KODE</th>
                        <th scope="col" class="px-6 py-5">KATEGORI</th>
                        <th scope="col" class="px-6 py-5">LOKASI / PENGGUNA</th>
                        <th scope="col" class="px-6 py-5">KONDISI</th>
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm mx-auto"></div>
                        </td>
                        <td class="px-6 py-4 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-sm bg-gray-100 text-gray-500 flex items-center justify-center flex-shrink-0 border border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1e293b] text-[13px]">Laptop Dell Latitude 5420</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 font-mono">SN: DL-2023-X982</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">ELEKTRONIK</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800 font-medium">Dr. Jane Doe</p>
                            <p class="text-[11px] text-gray-500 mt-0.5">Computer Science</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2.5 py-1 rounded-full border border-green-100 uppercase tracking-wider">
                                <div class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></div>
                                BAIK
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button class="text-slate-400 hover:text-[#1c7b5b] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                </button>
                                <button class="text-slate-400 hover:text-red-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm mx-auto"></div>
                        </td>
                        <td class="px-6 py-4 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-sm bg-gray-100 text-gray-500 flex items-center justify-center flex-shrink-0 border border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1e293b] text-[13px]">Tablet Samsung Tab S6 Lite</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 font-mono">SN: SM-P615-104</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">ELEKTRONIK</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800 font-medium">Bambang Pamungkas</p>
                            <p class="text-[11px] text-gray-500 mt-0.5">Siswa - XI IPS 3</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 bg-yellow-50 text-yellow-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-yellow-200 uppercase tracking-wider">
                                <div class="w-1.5 h-1.5 rounded-full bg-yellow-500"></div>
                                PERLU SERVIS (LAYAR)
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button class="text-slate-400 hover:text-[#1c7b5b] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                </button>
                                <button class="text-slate-400 hover:text-red-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm mx-auto"></div>
                        </td>
                        <td class="px-6 py-4 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-sm bg-gray-100 text-gray-500 flex items-center justify-center flex-shrink-0 border border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1e293b] text-[13px]">Mesin Fotokopi Kyocera TASKalfa</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 font-mono">SN: KY-2019-883</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">PERALATAN KANTOR</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800 font-medium">Ruang Staf Pengajar B</p>
                            <p class="text-[11px] text-gray-500 mt-0.5">Fasilitas Bersama</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2.5 py-1 rounded-full border border-green-100 uppercase tracking-wider">
                                <div class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></div>
                                BAIK
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button class="text-slate-400 hover:text-[#1c7b5b] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                </button>
                                <button class="text-slate-400 hover:text-red-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm mx-auto"></div>
                        </td>
                        <td class="px-6 py-4 flex items-start gap-4">
                            <div class="w-10 h-10 rounded-sm bg-gray-100 text-gray-500 flex items-center justify-center flex-shrink-0 border border-gray-200">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="m16 13 5.223 3.482a.5.5 0 0 0 .777-.416V7.87a.5.5 0 0 0-.752-.432L16 10.5"/><rect x="2" y="6" width="14" height="12" rx="2"/></svg>
                            </div>
                            <div>
                                <p class="font-bold text-[#1e293b] text-[13px]">Proyektor Epson EB-X51</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 font-mono">SN: EP-2022-P04</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-50 text-blue-700 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">ELEKTRONIK</span>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800 font-medium">Lab Komputer Lanjutan 1</p>
                            <p class="text-[11px] text-gray-500 mt-0.5">Fasilitas Ruangan</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-red-200 uppercase tracking-wider">
                                <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                                RUSAK
                            </span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex items-center justify-end gap-3">
                                <button class="text-slate-400 hover:text-[#1c7b5b] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                </button>
                                <button class="text-slate-400 hover:text-red-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-5 flex items-center justify-between border-t border-gray-100">
            <button class="text-[11px] font-bold text-gray-400 uppercase tracking-wider hover:text-gray-600">SEBELUMNYA</button>
            <div class="flex items-center gap-3">
                <button class="w-7 h-7 flex items-center justify-center rounded-sm bg-[#207e60] text-white font-bold text-[12px]">1</button>
                <button class="w-7 h-7 flex items-center justify-center rounded-sm text-[#1e293b] font-bold text-[12px] hover:bg-gray-50 border border-gray-200">2</button>
                <button class="w-7 h-7 flex items-center justify-center rounded-sm text-[#1e293b] font-bold text-[12px] hover:bg-gray-50 border border-gray-200">3</button>
                <span class="w-7 h-7 flex items-center justify-center text-gray-400 font-bold text-[12px]">...</span>
                <button class="w-7 h-7 flex items-center justify-center rounded-sm text-[#1e293b] font-bold text-[12px] hover:bg-gray-50 border border-gray-200">91</button>
            </div>
            <button class="text-[11px] font-bold text-[#207e60] uppercase tracking-wider hover:text-[#155d44]">SELANJUTNYA</button>
        </div>
    </div>

    <!-- Bottom Action Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-8">
        <!-- Audit Notice -->
        <div class="bg-[#111827] rounded-sm p-8 text-white relative overflow-hidden flex flex-col justify-center min-h-[160px]">
            <div class="relative z-10 flex justify-between items-center">
                <div>
                    <h3 class="text-[18px] font-bold mb-2">Jadwal Audit Mendatang</h3>
                    <p class="text-gray-400 text-[13px]">Audit inventaris semester ganjil dimulai dalam 14 hari.</p>
                </div>
                <button class="px-5 py-2.5 bg-white text-[#111827] rounded-sm text-[12px] font-bold hover:bg-gray-100 transition-colors">
                    Siapkan Laporan
                </button>
            </div>
            <svg class="absolute -right-10 -bottom-10 w-48 h-48 text-white/5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>

        <!-- Print Barcodes -->
        <div class="bg-[#f0fbf7] rounded-sm border border-[#e2f5ec] p-8 relative overflow-hidden flex flex-col justify-center min-h-[160px]">
            <div class="relative z-10 flex justify-between items-center">
                <div>
                    <h3 class="text-[18px] font-bold text-[#1c7b5b] mb-2">Cetak Label Barcode Baru</h3>
                    <p class="text-[#2c5f4b] text-[13px]">Terdapat 45 aset baru yang belum memiliki label fisik.</p>
                </div>
                <button class="px-5 py-2.5 bg-[#1c7b5b] text-white rounded-sm text-[12px] font-bold hover:bg-[#155d44] transition-colors shadow-sm">
                    Mulai Mencetak
                </button>
            </div>
        </div>
    </div>
@endsection
