@extends(isset($role) && $role === 'admin' ? 'layouts.admin' : 'layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <span class="text-gray-400">PORTAL UTAMA</span>
        <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
        <span class="text-[#1c7b5b]">DATA MURID</span>
    </div>

    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Manajemen Data Murid</h2>
            <p class="text-gray-500 text-[14px]">Kelola informasi murid dan peminjaman inventaris sekolah.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-[#1e293b] hover:bg-gray-50 px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Ekspor CSV
            </button>
            @if(isset($role) && $role === 'admin')
            <button class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Murid
            </button>
            @endif
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Stat 1 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TOTAL MURID</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">1,240</h3>
            <p class="text-[12px] font-bold text-[#1c7b5b]">~+12 maba</p>
        </div>

        <!-- Stat 2 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">PEMINJAMAN AKTIF</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">342</h3>
            <p class="text-[12px] font-medium text-gray-500">Peralatan keluar</p>
        </div>

        <!-- Stat 3 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TERLAMBAT KEMBALI</p>
                <div class="bg-red-50 p-1 rounded-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                </div>
            </div>
            <h3 class="text-[32px] font-bold text-[#ef4444] mb-2 leading-none">18</h3>
            <p class="text-[12px] font-medium text-gray-500">Butuh tindak lanjut</p>
        </div>

        <!-- Stat 4 -->
        <div class="bg-[#207e60] p-6 rounded-sm shadow-sm text-white relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-white/90 tracking-wider uppercase">ALOKASI TABLET</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
            </div>
            <h3 class="text-[32px] font-bold text-white mb-4 leading-none">85%</h3>
            <div class="w-full bg-black/20 rounded-full h-1.5 mb-2">
                <div class="bg-white h-1.5 rounded-full" style="width: 85%"></div>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <!-- Table Toolbar -->
        <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-white">
            <div class="flex gap-3 items-center">
                <button class="flex items-center gap-2 text-[11px] font-bold text-[#1e293b] border border-gray-200 rounded-sm px-3 py-1.5 hover:bg-gray-50 transition-colors uppercase tracking-wider">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                    FILTER: SEMUA KELAS
                </button>
                <button class="flex items-center gap-2 text-[11px] font-bold text-[#1e293b] border border-gray-200 rounded-sm px-3 py-1.5 hover:bg-gray-50 transition-colors uppercase tracking-wider">
                    STATUS: AKTIF PINJAM
                </button>
            </div>
            
            <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">MENAMPILKAN 10 DARI 1,240 MURID</p>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="p-4 w-12 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm"></div>
                        </th>
                        <th scope="col" class="px-6 py-5">NAMA SANTRI</th>
                        <th scope="col" class="px-6 py-5">TTL</th>
                        <th scope="col" class="px-6 py-5">ALAMAT</th>
                        <th scope="col" class="px-6 py-5">NO. INDUK</th>
                        <th scope="col" class="px-6 py-5">KELAS</th>
                        <th scope="col" class="px-6 py-5">NAMA ORANG TUA</th>
                        <th scope="col" class="px-6 py-5">ASAL MADIN</th>
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm mx-auto"></div>
                        </td>
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-9 h-9 rounded-sm bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-xs tracking-wide">
                                AM
                            </div>
                            <div>
                                <p class="font-bold text-[#1e293b] text-[13px]">Aris Munandar</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium">Blora,</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">14 Feb 2008</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 truncate max-w-[120px]" title="Ds. Sambongrejo RT 02">Ds. Sambongrejo</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-medium font-mono">2024001</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-bold">XII IPA 1</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">Sutrisno</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">Madin Al-Hidayah</span>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <div class="flex items-center justify-end gap-3">
                                @if(isset($role) && $role === 'admin')
                                <button class="text-slate-400 hover:text-[#1c7b5b] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                </button>
                                <button class="text-slate-400 hover:text-red-500 transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                </button>
                                @else
                                <button class="text-slate-400 hover:text-[#1c7b5b] transition-colors flex items-center gap-1.5 text-[12px] font-bold">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"/><circle cx="12" cy="12" r="3"/></svg>
                                    Lihat Detail
                                </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                    
                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <div class="w-4 h-4 border border-gray-300 rounded-sm mx-auto"></div>
                        </td>
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-9 h-9 rounded-sm bg-orange-50 text-orange-600 flex items-center justify-center font-bold text-xs tracking-wide">
                                BP
                            </div>
                            <div>
                                <p class="font-bold text-[#1e293b] text-[13px]">Bambang Pamungkas</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium">Cepu,</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">21 Sep 2009</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 truncate max-w-[120px]" title="Jl. Ronggolawe No. 4">Jl. Ronggolawe</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-medium font-mono">2024042</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-bold">XI IPS 3</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">Budi Santoso</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">Madin As-Salam</span>
                        </td>
                        <td class="px-6 py-5 text-right">
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
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-9 h-9 rounded-sm bg-pink-50 text-pink-600 flex items-center justify-center font-bold text-xs tracking-wide">
                                CS
                            </div>
                            <div>
                                <p class="font-bold text-[#1e293b] text-[13px]">Citra Sari</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium">Rembang,</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">05 Apr 2010</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 truncate max-w-[120px]" title="Ds. Pamotan RT 01/02">Ds. Pamotan</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-medium font-mono">2024089</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-bold">X IPA 2</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">Hasanudin</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">Madin Al-Ikhlas</span>
                        </td>
                        <td class="px-6 py-5 text-right">
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
                <button class="w-7 h-7 flex items-center justify-center rounded-sm text-[#1e293b] font-bold text-[12px] hover:bg-gray-50">2</button>
                <button class="w-7 h-7 flex items-center justify-center rounded-sm text-[#1e293b] font-bold text-[12px] hover:bg-gray-50">3</button>
                <span class="w-7 h-7 flex items-center justify-center text-gray-400 font-bold text-[12px]">...</span>
                <button class="w-7 h-7 flex items-center justify-center rounded-sm text-[#1e293b] font-bold text-[12px] hover:bg-gray-50">124</button>
            </div>
            <button class="text-[11px] font-bold text-[#207e60] uppercase tracking-wider hover:text-[#155d44]">SELANJUTNYA</button>
        </div>
    </div>

    <!-- Bottom Section: Stats & Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Chart Section -->
        <div class="lg:col-span-2 bg-white rounded-sm shadow-sm border border-gray-100 p-6 flex flex-col">
            <h3 class="text-[16px] font-bold text-[#1e293b] mb-8">Statistik Penggunaan Inventaris</h3>
            <div class="flex-1 flex items-end justify-center gap-6 pb-2">
                <!-- Abstract Bar Chart Representation -->
                <div class="w-20 bg-[#eef2f6] rounded-t-sm h-24 transition-all hover:bg-[#e2e8f0]"></div>
                <div class="w-20 bg-[#eef2f6] rounded-t-sm h-36 transition-all hover:bg-[#e2e8f0]"></div>
                <div class="w-20 bg-[#207e60] rounded-t-sm h-56 transition-all shadow-md"></div>
                <div class="w-20 bg-[#eef2f6] rounded-t-sm h-32 transition-all hover:bg-[#e2e8f0]"></div>
                <div class="w-20 bg-[#38a169] rounded-t-sm h-44 transition-all opacity-90 hover:opacity-100"></div>
            </div>
        </div>

        <!-- Activity Section -->
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6 flex flex-col">
            <h3 class="text-[16px] font-bold text-[#1e293b] mb-6">Aktivitas Terakhir</h3>
            <div class="flex-1 space-y-6">
                <!-- Activity 1 -->
                <div class="flex gap-4 relative">
                    <div class="w-2 h-2 rounded-full bg-[#207e60] mt-1.5 flex-shrink-0 z-10 relative"></div>
                    <div class="absolute top-3 left-1 w-px h-10 bg-gray-100 z-0"></div>
                    <div>
                        <h4 class="text-[13px] font-bold text-[#1e293b] mb-1">Pengembalian Laptop</h4>
                        <p class="text-[12px] text-gray-500 mb-2 leading-relaxed">Aris Munandar mengembalikan Laptop Dell #02.</p>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">2 MENIT LALU</span>
                    </div>
                </div>

                <!-- Activity 2 -->
                <div class="flex gap-4 relative">
                    <div class="w-2 h-2 rounded-full bg-[#f59e0b] mt-1.5 flex-shrink-0 z-10 relative ring-4 ring-orange-50"></div>
                    <div class="absolute top-3 left-1 w-px h-10 bg-gray-100 z-0"></div>
                    <div>
                        <h4 class="text-[13px] font-bold text-[#1e293b] mb-1">Peminjaman Tablet</h4>
                        <p class="text-[12px] text-gray-500 mb-2 leading-relaxed">Bambang Pamungkas meminjam Samsung Tab S6 Lite.</p>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">1 JAM LALU</span>
                    </div>
                </div>

                <!-- Activity 3 -->
                <div class="flex gap-4">
                    <div class="w-2 h-2 rounded-full bg-gray-300 mt-1.5 flex-shrink-0"></div>
                    <div>
                        <h4 class="text-[13px] font-bold text-[#1e293b] mb-1">Update Data Profil</h4>
                        <p class="text-[12px] text-gray-500 mb-2 leading-relaxed">Citra Sari memperbarui nomor telepon wali.</p>
                        <span class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">3 JAM LALU</span>
                    </div>
                </div>
            </div>
            
            <button class="w-full mt-6 py-2.5 bg-white border border-gray-200 text-[#207e60] hover:bg-gray-50 rounded-sm text-[11px] font-bold uppercase tracking-wider transition-colors">
                LIHAT SEMUA LOG
            </button>
        </div>
    </div>
@endsection
