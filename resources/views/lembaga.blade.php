@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <a href="{{ route('dashboard') }}" class="hover:text-gray-700">Dasbor</a>
        <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
        <span class="text-[#1c7b5b]">Data Lembaga</span>
    </div>

    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[22px] font-bold text-gray-900 mb-1.5 tracking-tight">Data Lembaga</h2>
            <p class="text-gray-500 text-[14px]">Kelola identitas utama lembaga dan infrastruktur fasilitas.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2.5 rounded-sm font-medium text-sm flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>
                Edit Profil
            </button>
            <button class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-4 py-2.5 rounded-sm font-medium text-sm flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Fasilitas Baru
            </button>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Institution Profile Card (Spans 2 columns) -->
        <div class="lg:col-span-2 bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col md:flex-row gap-6">
            <!-- Logo Box -->
            <div class="w-32 h-32 bg-[#111827] rounded flex items-center justify-center flex-shrink-0 relative overflow-hidden">
                <div class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#eab308" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>
                    <span class="text-[#eab308] text-[8px] font-bold tracking-widest uppercase mt-2">INSTITUTON</span>
                </div>
            </div>
            
            <!-- Details -->
            <div class="flex-1">
                <span class="inline-block px-2 py-0.5 bg-[#e8f5f1] text-[#1c7b5b] text-[10px] font-bold tracking-widest rounded-sm mb-3">ID: INST-2024-001</span>
                <h3 class="text-lg font-bold text-gray-900 mb-2">Institut Keunggulan Global</h3>
                <p class="text-sm text-gray-500 leading-relaxed mb-6 max-w-xl">
                    Berdedikasi untuk memberikan pendidikan teknis dan pelatihan vokasi berkualitas tinggi dengan fokus pada inovasi berkelanjutan dan standar industri 4.0.
                </p>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-4">
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#1c7b5b] mt-0.5"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">ALAMAT</p>
                            <p class="text-[13px] font-bold text-gray-800">Jl. Pendidikan No. 42,<br>Jakarta Selatan</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#1c7b5b] mt-0.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">KONTAK</p>
                            <p class="text-[13px] font-bold text-gray-800">+62 (21) 555-0198</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#1c7b5b] mt-0.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">EMAIL</p>
                            <p class="text-[13px] font-bold text-gray-800">info@gei-edu.ac.id</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-[#1c7b5b] mt-0.5"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                        <div>
                            <p class="text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-0.5">SITUS WEB</p>
                            <p class="text-[13px] font-bold text-gray-800">www.gei-edu.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Metric Cards -->
        <div class="flex flex-col gap-6">
            <!-- Total Value Card -->
            <div class="bg-[#1c7b5b] p-6 rounded-sm text-white relative overflow-hidden flex-1 flex flex-col justify-center shadow-sm">
                <div class="relative z-10">
                    <p class="text-[11px] font-bold text-white/80 tracking-widest uppercase mb-2">TOTAL NILAI INVENTARIS</p>
                    <h3 class="text-3xl font-bold mb-4">$1.24M</h3>
                    <div class="inline-flex items-center gap-1.5 bg-white/10 px-2.5 py-1 rounded border border-white/20 text-[11px] font-bold tracking-wide">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                        <span>+4.2% dari bulan lalu</span>
                    </div>
                </div>
                <!-- Background decoration -->
                <svg class="absolute -right-4 -bottom-4 w-32 h-32 text-white/5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>

            <!-- Room Utility Card -->
            <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex-1 flex flex-col justify-center">
                <p class="text-[11px] font-bold text-gray-500 tracking-widest uppercase mb-4">UTILITAS RUANGAN</p>
                <div class="flex justify-between items-end mb-2">
                    <span class="text-[10px] font-bold text-[#1c7b5b] bg-[#e8f5f1] px-2 py-0.5 rounded-sm">KAPASITAS</span>
                    <span class="text-[13px] font-bold text-[#1c7b5b]">85%</span>
                </div>
                <div class="w-full bg-gray-100 rounded-full h-1.5 mb-4">
                    <div class="bg-[#1c7b5b] h-1.5 rounded-full" style="width: 85%"></div>
                </div>
                <p class="text-[10px] text-gray-400 font-medium leading-relaxed">
                    22 dari 26 ruangan saat ini ditetapkan untuk pelacakan inventaris aktif.
                </p>
            </div>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="p-5 border-b border-gray-200 flex justify-between items-center">
            <h3 class="text-sm font-bold text-gray-900">Inventaris Fasilitas & Ruangan</h3>
            <div class="flex gap-2">
                <button class="p-1.5 text-gray-500 hover:text-gray-900 border border-gray-200 rounded-sm hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                </button>
                <button class="p-1.5 text-gray-500 hover:text-gray-900 border border-gray-200 rounded-sm hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                </button>
            </div>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-xs text-gray-500 font-bold bg-white border-b border-gray-100 tracking-widest uppercase">
                    <tr>
                        <th scope="col" class="px-6 py-4">NAMA RUANGAN</th>
                        <th scope="col" class="px-6 py-4">TIPE</th>
                        <th scope="col" class="px-6 py-4">KAPASITAS</th>
                        <th scope="col" class="px-6 py-4">JUMLAH ITEM</th>
                        <th scope="col" class="px-6 py-4">STATUS</th>
                        <th scope="col" class="px-6 py-4 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900 text-[13px]">Lab Komputer Lanjutan 1</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">Laboratorium</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">40 Pax</td>
                        <td class="px-6 py-4 font-bold text-gray-900">156 item</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#f0fdf4] text-green-700 text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider border border-green-100">AKTIF</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-[#1c7b5b] hover:underline text-sm font-medium">Lihat Item</a>
                        </td>
                    </tr>
                    
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900 text-[13px]">Arsip Perpustakaan Utama</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">Penyimpanan</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">120 m²</td>
                        <td class="px-6 py-4 font-bold text-gray-900">1,204 item</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#f0fdf4] text-green-700 text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider border border-green-100">AKTIF</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-[#1c7b5b] hover:underline text-sm font-medium">Lihat Item</a>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900 text-[13px]">Ruang Staf Pengajar B</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">Kantor</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">12 Staf</td>
                        <td class="px-6 py-4 font-bold text-gray-900">82 item</td>
                        <td class="px-6 py-4">
                            <span class="bg-blue-50 text-blue-700 text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider border border-blue-100">AUDIT SEDANG BERJALAN</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-[#1c7b5b] hover:underline text-sm font-medium">Lihat Item</a>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4 font-bold text-gray-900 text-[13px]">Lab Fisika A</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">Laboratorium</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">25 Pax</td>
                        <td class="px-6 py-4 font-bold text-gray-900">210 item</td>
                        <td class="px-6 py-4">
                            <span class="bg-orange-50 text-orange-700 text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider border border-orange-100">PEMELIHARAAN</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-[#1c7b5b] hover:underline text-sm font-medium">Lihat Item</a>
                        </td>
                    </tr>

                    <tr class="hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <td class="px-6 py-4 font-bold text-gray-900 text-[13px]">Aula Utama Auditorium</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">Pertemuan</td>
                        <td class="px-6 py-4 text-gray-500 font-medium">500 Pax</td>
                        <td class="px-6 py-4 font-bold text-gray-900">45 item</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#f0fdf4] text-green-700 text-[9px] font-bold px-2 py-0.5 rounded-full uppercase tracking-wider border border-green-100">AKTIF</span>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="#" class="text-[#1c7b5b] hover:underline text-sm font-medium">Lihat Item</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <!-- Pagination -->
        <div class="px-6 py-4 flex items-center justify-between border-t border-gray-100">
            <p class="text-[11px] text-gray-500 font-bold">Menampilkan 5 dari 26 total fasilitas</p>
            <div class="flex items-center gap-1">
                <button class="w-7 h-7 flex items-center justify-center rounded border border-gray-200 text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="w-7 h-7 flex items-center justify-center rounded bg-[#1c7b5b] text-white font-bold text-[12px]">1</button>
                <button class="w-7 h-7 flex items-center justify-center rounded text-gray-600 border border-gray-200 hover:bg-gray-50 font-bold text-[12px] transition-colors">2</button>
                <button class="w-7 h-7 flex items-center justify-center rounded text-gray-600 border border-gray-200 hover:bg-gray-50 font-bold text-[12px] transition-colors">3</button>
                <button class="w-7 h-7 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Images & Action Card -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
        <!-- Image 1 -->
        <div class="rounded-sm overflow-hidden h-40 shadow-sm border border-gray-200">
            <img src="https://images.unsplash.com/photo-1541339907198-e08756dedf3f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Campus" class="w-full h-full object-cover">
        </div>
        
        <!-- Image 2 -->
        <div class="rounded-sm overflow-hidden h-40 shadow-sm border border-gray-200">
            <img src="https://images.unsplash.com/photo-1562774053-701939374585?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Laboratory" class="w-full h-full object-cover">
        </div>
        
        <!-- Image 3 -->
        <div class="rounded-sm overflow-hidden h-40 shadow-sm border border-gray-200">
            <img src="https://images.unsplash.com/photo-1558494949-ef010cbdcc31?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" alt="Server Room" class="w-full h-full object-cover">
        </div>

        <!-- Action Card -->
        <div class="bg-white rounded-sm border border-gray-200 p-5 shadow-sm flex flex-col justify-between">
            <div>
                <div class="flex items-center gap-2 mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 15v4c0 1.1.9 2 2 2h14a2 2 0 0 0 2-2v-4M17 9l-5 5-5-5M12 12.8V2.5"/></svg>
                    <h3 class="text-[13px] font-bold text-[#1c7b5b]">PETA KAMPUS</h3>
                </div>
                <p class="text-[11px] text-gray-500 leading-relaxed">
                    Denah lantai interaktif tersedia untuk manajer inventaris yang berwenang.
                </p>
            </div>
            <button class="w-full mt-4 py-2 bg-[#f0fbf7] text-[#1c7b5b] hover:bg-[#e2f5ec] rounded-sm text-[12px] font-bold transition-colors">
                Buka Peta Interaktif
            </button>
        </div>
    </div>
@endsection
