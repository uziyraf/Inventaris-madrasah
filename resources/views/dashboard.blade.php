@extends(isset($role) && $role === 'admin' ? 'layouts.admin' : 'layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Dasbor Utama</h2>
            <p class="text-gray-500 text-sm">Ikhtisar ringkas sistem inventaris dan metrik SDM institusi.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2.5 rounded-sm font-medium text-sm flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                Pilih Periode
            </button>
            <button class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-4 py-2.5 rounded-sm font-medium text-sm flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Unduh Laporan
            </button>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- STATISTIK INVENTARIS -->
    <!-- ========================================== -->
    <p class="text-[11px] font-bold text-gray-400 tracking-widest uppercase mb-4">STATISTIK INVENTARIS</p>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Stat 1: Total Aset -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">TOTAL ASET</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="7" width="20" height="14" rx="2" ry="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">0</h3>
            <div class="flex items-center gap-1 text-xs font-medium text-[#1c7b5b]">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                <span>Data tersimpan</span>
            </div>
        </div>

        <!-- Stat 2: Peminjaman Aktif -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">PEMINJAMAN AKTIF</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">0</h3>
            <p class="text-xs font-medium text-gray-500">Item sedang dipinjam</p>
        </div>

        <!-- Stat 3: Perlu Perawatan -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">PERLU PERAWATAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">0</h3>
            <p class="text-xs font-medium text-gray-500">Rusak ringan/sedang</p>
        </div>

        <!-- Stat 4: Barang Rusak -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative border-t-2 border-t-red-500">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">BARANG RUSAK</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-red-500 mb-2">0</h3>
            <p class="text-[11px] font-bold text-red-500">Menunggu tindakan</p>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- STATISTIK SUMBER DAYA -->
    <!-- ========================================== -->
    <p class="text-[11px] font-bold text-gray-400 tracking-widest uppercase mb-4">STATISTIK SUMBER DAYA</p>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- SDM 1: Total Santri / Murid -->
        <div class="relative rounded-lg overflow-hidden shadow-md bg-gradient-to-br from-[#4f46e5] via-[#6366f1] to-[#818cf8] p-6 text-white min-h-[140px] flex flex-col justify-between">
            <div class="absolute top-0 right-0 w-28 h-28 bg-white/10 rounded-full -mr-10 -mt-10"></div>
            <div class="absolute bottom-0 right-4 w-16 h-16 bg-white/10 rounded-full -mb-4"></div>
            <div>
                <p class="text-[11px] font-bold text-white/80 tracking-widest uppercase mb-1">TOTAL SANTRI / MURID</p>
            </div>
            <div>
                <h3 class="text-4xl font-extrabold text-white leading-none mb-1">0</h3>
                <p class="text-[12px] text-white/70 font-medium">Terdaftar aktif</p>
            </div>
        </div>

        <!-- SDM 2: Total Guru Pengajar -->
        <div class="relative rounded-lg overflow-hidden shadow-md bg-gradient-to-br from-[#0ea5e9] via-[#38bdf8] to-[#7dd3fc] p-6 text-white min-h-[140px] flex flex-col justify-between">
            <div class="absolute top-0 right-0 w-28 h-28 bg-white/10 rounded-full -mr-10 -mt-10"></div>
            <div class="absolute bottom-0 right-4 w-16 h-16 bg-white/10 rounded-full -mb-4"></div>
            <div>
                <p class="text-[11px] font-bold text-white/80 tracking-widest uppercase mb-1">TOTAL GURU PENGAJAR</p>
            </div>
            <div>
                <h3 class="text-4xl font-extrabold text-white leading-none mb-1">0</h3>
                <p class="text-[12px] text-white/70 font-medium">Pengajar terdaftar</p>
            </div>
        </div>

        <!-- SDM 3: Total Pengurus Sistem -->
        <div class="relative rounded-lg overflow-hidden shadow-md bg-gradient-to-br from-[#16a34a] via-[#22c55e] to-[#86efac] p-6 text-white min-h-[140px] flex flex-col justify-between">
            <div class="absolute top-0 right-0 w-28 h-28 bg-white/10 rounded-full -mr-10 -mt-10"></div>
            <div class="absolute bottom-0 right-4 w-16 h-16 bg-white/10 rounded-full -mb-4"></div>
            <div>
                <p class="text-[11px] font-bold text-white/80 tracking-widest uppercase mb-1">TOTAL PENGURUS SISTEM</p>
            </div>
            <div>
                <h3 class="text-4xl font-extrabold text-white leading-none mb-1">0</h3>
                <p class="text-[12px] text-white/70 font-medium">Staf & manajemen</p>
            </div>
        </div>
    </div>

    <!-- ========================================== -->
    <!-- BOTTOM SECTION: TABLE + SIDEBAR -->
    <!-- ========================================== -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 pb-12">
        <!-- Recent Activities Table (Spans 2 columns) -->
        <div class="lg:col-span-2 bg-white rounded-sm shadow-sm border border-gray-200 flex flex-col">
            <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-gray-50/50">
                <h3 class="text-lg font-bold text-gray-900">Aktivitas Inventaris Terbaru</h3>
                <a href="#" class="text-sm font-semibold text-[#1c7b5b] hover:underline">Lihat Semua</a>
            </div>
            <div class="flex-1 overflow-x-auto">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="text-xs text-gray-500 font-bold bg-white border-b border-gray-200 tracking-widest uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-4">ITEM</th>
                            <th scope="col" class="px-6 py-4">AKSI</th>
                            <th scope="col" class="px-6 py-4">PENGGUNA</th>
                            <th scope="col" class="px-6 py-4">WAKTU</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <p class="font-bold text-gray-900 text-sm">Sistem Siap Digunakan</p>
                                <p class="text-[11px] text-gray-400 font-medium tracking-wide mt-0.5">Menunggu transaksi pertama</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 border border-blue-100 text-[10px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-wider">INFO</span>
                            </td>
                            <td class="px-6 py-4 font-medium">Sistem</td>
                            <td class="px-6 py-4 text-gray-400">Baru saja</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions & Alerts (1 Column) -->
        <div class="space-y-6">
            <!-- Peringatan Sistem Card -->
            <div class="bg-[#111827] rounded-sm p-6 text-white relative overflow-hidden flex flex-col justify-center">
                <div class="relative z-10">
                    <div class="flex items-center gap-2 mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                        <h3 class="text-lg font-bold">Peringatan Sistem</h3>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed mb-4 max-w-[90%]">Masa garansi untuk 8 unit Komputer Server akan habis dalam 14 hari.</p>
                    <button class="bg-white text-gray-900 font-bold px-4 py-2 rounded-sm text-[13px] hover:bg-gray-100 transition-colors shadow-sm">
                        Lihat Detail
                    </button>
                </div>
                <svg class="absolute -bottom-6 -right-6 w-32 h-32 text-white/5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>

            <!-- Akses Cepat -->
            <div class="bg-white rounded-sm shadow-sm border border-gray-200 p-6 flex-1">
                <h3 class="text-base font-bold text-gray-900 mb-4">Akses Cepat</h3>
                <div class="space-y-3">
                    <a href="#" class="flex items-center justify-between p-3 border border-gray-100 rounded-sm hover:border-[#1c7b5b] hover:bg-[#f0fbf7] transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded bg-gray-50 text-gray-500 group-hover:bg-[#1c7b5b] group-hover:text-white flex items-center justify-center transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                            </div>
                            <span class="font-bold text-[13px] text-gray-700 group-hover:text-[#1c7b5b]">Kelola Inventaris Baru</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 group-hover:text-[#1c7b5b]"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                    <a href="#" class="flex items-center justify-between p-3 border border-gray-100 rounded-sm hover:border-[#1c7b5b] hover:bg-[#f0fbf7] transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded bg-gray-50 text-gray-500 group-hover:bg-[#1c7b5b] group-hover:text-white flex items-center justify-center transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                            </div>
                            <span class="font-bold text-[13px] text-gray-700 group-hover:text-[#1c7b5b]">Kelola Data Murid</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 group-hover:text-[#1c7b5b]"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                    <a href="#" class="flex items-center justify-between p-3 border border-gray-100 rounded-sm hover:border-[#1c7b5b] hover:bg-[#f0fbf7] transition-all group">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 rounded bg-gray-50 text-gray-500 group-hover:bg-[#1c7b5b] group-hover:text-white flex items-center justify-center transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
                            </div>
                            <span class="font-bold text-[13px] text-gray-700 group-hover:text-[#1c7b5b]">Kelola Data Guru</span>
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 group-hover:text-[#1c7b5b]"><polyline points="9 18 15 12 9 6"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
