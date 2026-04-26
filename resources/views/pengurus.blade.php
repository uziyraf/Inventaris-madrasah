@extends('layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[28px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Data Pengurus</h2>
            <p class="text-gray-500 text-[14px]">Kelola staf institusi dan kontrol akses sistem untuk alur inventaris.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-[#1c7b5b] hover:bg-gray-50 px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Ekspor CSV
            </button>
            <button class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Pengurus Baru
            </button>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Stat 1 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-full bg-[#f0fbf7] flex items-center justify-center text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 15v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1"/><circle cx="10" cy="9" r="2"/><path d="M16 9h2"/><path d="M16 13h2"/></svg>
                </div>
                <span class="bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2 py-1 rounded-sm">+2 bulan ini</span>
            </div>
            <div>
                <p class="text-[12px] font-medium text-gray-500 mb-1">Total Staf</p>
                <h3 class="text-[32px] font-bold text-[#1e293b] leading-none">42</h3>
            </div>
        </div>

        <!-- Stat 2 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-full bg-[#f0fbf7] flex items-center justify-center text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
            </div>
            <div>
                <p class="text-[12px] font-medium text-gray-500 mb-1">Manajer Aktif</p>
                <h3 class="text-[32px] font-bold text-[#1e293b] leading-none">12</h3>
            </div>
        </div>

        <!-- Stat 3 (Spans 2 cols) -->
        <div class="md:col-span-2 bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[13px] font-medium text-gray-600">Status Sistem</p>
                <div class="flex items-center gap-1.5">
                    <div class="w-2 h-2 rounded-full bg-[#1c7b5b]"></div>
                    <span class="text-[11px] font-bold text-[#1c7b5b]">Operasional</span>
                </div>
            </div>
            <div class="flex items-end justify-between h-12 mb-3 gap-1">
                <!-- Mini Bar Chart -->
                <div class="w-full bg-[#e2e8f0] h-6 rounded-sm"></div>
                <div class="w-full bg-[#94d1b8] h-8 rounded-sm"></div>
                <div class="w-full bg-[#bce3d2] h-4 rounded-sm"></div>
                <div class="w-full bg-[#6dbf9b] h-9 rounded-sm"></div>
                <div class="w-full bg-[#1c7b5b] h-7 rounded-sm"></div>
                <div class="w-full bg-[#46a581] h-10 rounded-sm"></div>
                <div class="w-full bg-[#94d1b8] h-5 rounded-sm"></div>
                <div class="w-full bg-[#6dbf9b] h-8 rounded-sm"></div>
                <div class="w-full bg-[#207e60] h-6 rounded-sm"></div>
                <div class="w-full bg-[#155d44] h-9 rounded-sm"></div>
            </div>
            <p class="text-[11px] text-gray-400">Aktivitas sinkronisasi inventaris selama 24 jam terakhir</p>
        </div>
    </div>

    <!-- Table Wrapper -->
    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <!-- Table Toolbar -->
        <div class="px-6 py-4 border-b border-gray-100 flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <h3 class="text-[16px] font-bold text-[#1e293b]">Daftar Pengurus</h3>
                <div class="flex bg-gray-50 p-1 rounded-md border border-gray-100">
                    <button class="px-3 py-1 text-[12px] font-semibold bg-white text-[#1c7b5b] shadow-sm rounded-sm">Semua</button>
                    <button class="px-3 py-1 text-[12px] font-medium text-gray-500 hover:text-gray-700">Aktif</button>
                    <button class="px-3 py-1 text-[12px] font-medium text-gray-500 hover:text-gray-700">Tidak Aktif</button>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-[12px] text-gray-500">Filter:</span>
                <select class="border border-gray-200 text-gray-600 text-[12px] rounded-sm px-3 py-1.5 w-36 focus:ring-0 focus:border-gray-300">
                    <option>Semua Peran</option>
                    <option>Manajer Inventaris</option>
                    <option>Staf</option>
                </select>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-5">PENGURUS</th>
                        <th scope="col" class="px-6 py-5">PERAN</th>
                        <th scope="col" class="px-6 py-5">INFO KONTAK</th>
                        <th scope="col" class="px-6 py-5">AKTIF TERAKHIR</th>
                        <th scope="col" class="px-6 py-5">STATUS</th>
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/150?img=11" alt="Avatar" class="w-10 h-10 rounded-full border border-gray-200">
                            <div>
                                <p class="font-bold text-[#1e293b] text-[14px]">Dr. Aris Setiawan</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5">ID: ADM-2023-001</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm leading-tight">Manajer<br>Inventaris</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <span class="text-[13px] text-gray-600">aris.s@institute.id</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <span class="text-[12px] text-gray-500">+62 812-3456-7890</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800">Hari ini,</p>
                            <p class="text-[12px] text-gray-500">09:45</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-[#1c7b5b] text-[12px] font-bold">
                                <div class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></div>
                                Online
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
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/150?img=5" alt="Avatar" class="w-10 h-10 rounded-full border border-gray-200">
                            <div>
                                <p class="font-bold text-[#1e293b] text-[14px]">Maya Indah</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5">ID: STF-2023-042</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-gray-100 text-gray-700 text-[11px] font-bold px-2.5 py-1 rounded-sm leading-tight">Staf</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <span class="text-[13px] text-gray-600">maya.indah@institute.id</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <span class="text-[12px] text-gray-500">+62 813-8888-2222</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800">Kemarin,</p>
                            <p class="text-[12px] text-gray-500">16:20</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-gray-500 text-[12px] font-bold">
                                <div class="w-1.5 h-1.5 rounded-full bg-gray-400"></div>
                                Offline
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
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/150?img=15" alt="Avatar" class="w-10 h-10 rounded-full border border-gray-200">
                            <div>
                                <p class="font-bold text-[#1e293b] text-[14px]">Budi Santoso</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5">ID: STF-2023-015</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-[#eff6ff] text-blue-700 text-[11px] font-bold px-2.5 py-1 rounded-sm leading-tight">Petugas<br>Pengadaan</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <span class="text-[13px] text-gray-600">budi.s@institute.id</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <span class="text-[12px] text-gray-500">+62 811-0000-1111</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800">3 jam yang</p>
                            <p class="text-[12px] text-gray-800">lalu</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 text-[#1c7b5b] text-[12px] font-bold">
                                <div class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></div>
                                Online
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
                        <td class="px-6 py-4 flex items-center gap-3">
                            <img src="https://i.pravatar.cc/150?img=9" alt="Avatar" class="w-10 h-10 rounded-full border border-gray-200">
                            <div>
                                <p class="font-bold text-[#1e293b] text-[14px]">Siti Aminah</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5">ID: ADM-2022-005</p>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-block bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm leading-tight">Manajer<br>Inventaris</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 mb-1">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="2" y="4" width="20" height="16" rx="2" ry="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                <span class="text-[13px] text-gray-600">siti.a@institute.id</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                <span class="text-[12px] text-gray-500">+62 856-4321-9876</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-[13px] text-gray-800">15 Mei 2024</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 bg-red-50 text-red-600 text-[10px] px-2.5 py-1 rounded-sm font-bold uppercase tracking-wider">
                                <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                                Ditangguhkan
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
            <p class="text-[13px] text-gray-500 font-medium">Menampilkan <span class="font-bold text-gray-800">1</span> sampai <span class="font-bold text-gray-800">4</span> dari <span class="font-bold text-gray-800">42</span> hasil</p>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded bg-[#1c7b5b] text-white font-bold text-[13px]">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded text-[#1e293b] font-bold text-[13px] hover:bg-gray-50 transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded text-[#1e293b] font-bold text-[13px] hover:bg-gray-50 transition-colors">3</button>
                <span class="w-8 h-8 flex items-center justify-center text-gray-400 font-bold text-[13px]">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded text-[#1e293b] font-bold text-[13px] hover:bg-gray-50 transition-colors">11</button>
                <button class="w-8 h-8 flex items-center justify-center rounded text-gray-600 hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Section: Info & Logs -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-8">
        <!-- Access Control Policy -->
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 class="text-[15px] font-bold text-[#1e293b]">Kebijakan Kontrol Akses</h3>
            </div>
            <p class="text-[13px] text-gray-600 leading-relaxed">
                Hanya Pengurus dengan peran "Manajer Inventaris" yang dapat menyetujui permintaan peralatan bernilai tinggi. Hubungi tim IT untuk eskalasi hak istimewa.
            </p>
        </div>

        <!-- Activity Log -->
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>
                </div>
                <h3 class="text-[15px] font-bold text-[#1e293b]">Log Aktivitas Terbaru</h3>
            </div>
            <div class="space-y-4">
                <!-- Log 1 -->
                <div class="flex justify-between items-start border-b border-gray-50 pb-4">
                    <p class="text-[12px] text-gray-600 font-medium">Admin Alpha memperbarui peran "Maya Indah"</p>
                    <span class="text-[11px] text-gray-400 whitespace-nowrap">10m yang lalu</span>
                </div>
                <!-- Log 2 -->
                <div class="flex justify-between items-start border-b border-gray-50 pb-4">
                    <p class="text-[12px] text-gray-600 font-medium">Akun baru "Budi Santoso" dibuat</p>
                    <span class="text-[11px] text-gray-400 whitespace-nowrap">4j yang lalu</span>
                </div>
                <!-- Log 3 -->
                <div class="flex justify-between items-start">
                    <p class="text-[12px] text-gray-600 font-medium">Laporan audit sistem dibuat</p>
                    <span class="text-[11px] text-gray-400 whitespace-nowrap">Kemarin</span>
                </div>
            </div>
        </div>
    </div>
@endsection
