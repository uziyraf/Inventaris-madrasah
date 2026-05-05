@extends(isset($role) && $role === 'admin' ? 'layouts.admin' : 'layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[22px] font-bold text-gray-900 mb-1.5 tracking-tight">Data Inventaris Guru</h2>
            <p class="text-gray-500 text-[14px]">Kelola dan audit aset institusi yang ditugaskan kepada anggota fakultas.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-gray-700 hover:bg-gray-50 px-4 py-2.5 rounded-sm font-medium text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                Filter
            </button>
            @if(isset($role) && $role === 'admin')
            <button class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-4 py-2.5 rounded-sm font-medium text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Guru
            </button>
            @endif
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Stat 1 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-center">
            <p class="text-[11px] font-bold text-gray-500 tracking-wider mb-2">Total Fakultas/Guru</p>
            <h3 class="text-[26px] font-bold text-gray-900 leading-none">124</h3>
        </div>

        <!-- Stat 2 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-center">
            <p class="text-[11px] font-bold text-gray-500 tracking-wider mb-2">Aset Ditugaskan</p>
            <h3 class="text-[26px] font-bold text-gray-900 leading-none">382</h3>
        </div>

        <!-- Stat 3 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-center">
            <p class="text-[11px] font-bold text-gray-500 tracking-wider mb-2">Audit Tertunda</p>
            <h3 class="text-[26px] font-bold text-gray-900 leading-none">12</h3>
        </div>

        <!-- Stat 4 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-center">
            <p class="text-[11px] font-bold text-gray-500 tracking-wider mb-2">Kesehatan Aset</p>
            <h3 class="text-[26px] font-bold text-[#1c7b5b] leading-none">98.2%</h3>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-10">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-5">NAMA USTADZ/DZAH</th>
                        <th scope="col" class="px-6 py-5">TTL</th>
                        <th scope="col" class="px-6 py-5">ALAMAT</th>
                        <th scope="col" class="px-6 py-5">L/P</th>
                        <th scope="col" class="px-6 py-5">THN MENGAJAR</th>
                        <th scope="col" class="px-6 py-5">IJAZAH TERAKHIR</th>
                        <th scope="col" class="px-6 py-5">NIK</th>
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-sm tracking-wide">
                                AF
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-[14px]">Ust. Ahmad Fadil</p>
                                <p class="text-[12px] text-gray-400 mt-0.5">a.fadil@madrasah.sch.id</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium">Jakarta,</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">12 Mei 1985</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 truncate max-w-[150px]" title="Jl. Merdeka No. 45, Jakarta Selatan">Jl. Merdeka No. 45</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-blue-50 text-blue-600 text-[11px] font-bold px-2.5 py-1 rounded-sm">L</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-medium">2010</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">S1 Pend. Agama Islam</span>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium font-mono">3174123456780001</p>
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
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-pink-50 text-pink-600 flex items-center justify-center font-bold text-sm tracking-wide">
                                SA
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-[14px]">Ustdzh. Siti Aisyah</p>
                                <p class="text-[12px] text-gray-400 mt-0.5">s.aisyah@madrasah.sch.id</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium">Bandung,</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">24 Ags 1990</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 truncate max-w-[150px]" title="Perum. Cibiru Blok B2, Bandung">Perum. Cibiru Blok B2</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-pink-50 text-pink-600 text-[11px] font-bold px-2.5 py-1 rounded-sm">P</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-medium">2015</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">S1 Bahasa Arab</span>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium font-mono">3273152408900003</p>
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
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-sm tracking-wide">
                                ML
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-[14px]">Ust. Malik Ibrahim</p>
                                <p class="text-[12px] text-gray-400 mt-0.5">m.ibrahim@madrasah.sch.id</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium">Surabaya,</p>
                            <p class="text-[12px] text-gray-500 mt-0.5">03 Nov 1982</p>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 truncate max-w-[150px]" title="Jl. Diponegoro No. 8, Sby">Jl. Diponegoro No. 8</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-blue-50 text-blue-600 text-[11px] font-bold px-2.5 py-1 rounded-sm">L</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700 font-medium">2008</span>
                        </td>
                        <td class="px-6 py-5">
                            <span class="text-[13px] text-gray-700">S2 Tarbiyah</span>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium font-mono">3578030311820005</p>
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
        <div class="px-6 py-4 flex items-center justify-between">
            <p class="text-[12px] text-gray-500 font-medium">Menampilkan 1 sampai 10 dari 124 guru</p>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded bg-[#f0fbf7] text-[#1c7b5b] border border-[#1c7b5b]/20 font-bold text-[13px]">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded text-gray-600 border border-gray-200 hover:bg-gray-50 font-bold text-[13px] transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded text-gray-600 border border-gray-200 hover:bg-gray-50 font-bold text-[13px] transition-colors">3</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-50 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Recent Assignments Section -->
    <div class="mb-4">
        <h3 class="text-[16px] font-bold text-gray-900">Penugasan Inventaris Terbaru</h3>
    </div>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pb-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-5 flex items-start gap-4">
            <div class="w-14 h-14 rounded bg-gray-50 flex items-center justify-center flex-shrink-0 border border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="2" y="3" width="20" height="14" rx="2" ry="2"/><line x1="8" y1="21" x2="16" y2="21"/><line x1="12" y1="17" x2="12" y2="21"/></svg>
            </div>
            <div>
                <h4 class="text-[14px] font-semibold text-gray-900 mb-0.5">MacBook Pro 16"</h4>
                <p class="text-[11px] text-gray-500 mb-3">Serial: APPLE-7782-X</p>
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-full bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[8px] tracking-wide">
                        JD
                    </div>
                    <p class="text-[11px] text-gray-600 font-medium">Ditugaskan ke Dr. Jane Doe</p>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-5 flex items-start gap-4">
            <div class="w-14 h-14 rounded bg-gray-50 flex items-center justify-center flex-shrink-0 border border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><path d="M14.5 4h-5L7 7H4a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2h-3l-2.5-3z"/><circle cx="12" cy="13" r="3"/></svg>
            </div>
            <div>
                <h4 class="text-[14px] font-semibold text-gray-900 mb-0.5">4K DSLR Camera</h4>
                <p class="text-[11px] text-gray-500 mb-3">Serial: SONY-A7-449</p>
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-full bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[8px] tracking-wide">
                        RS
                    </div>
                    <p class="text-[11px] text-gray-600 font-medium">Ditugaskan ke Robert Smith</p>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-5 flex items-start gap-4">
            <div class="w-14 h-14 rounded bg-gray-50 flex items-center justify-center flex-shrink-0 border border-gray-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="text-gray-400"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><line x1="12" y1="18" x2="12.01" y2="18"/></svg>
            </div>
            <div>
                <h4 class="text-[14px] font-semibold text-gray-900 mb-0.5">Wacom Intuos Pro</h4>
                <p class="text-[11px] text-gray-500 mb-3">Serial: WAC-PX-992</p>
                <div class="flex items-center gap-2">
                    <div class="w-5 h-5 rounded-full bg-[#4ade80] text-white flex items-center justify-center font-bold text-[8px] tracking-wide">
                        AL
                    </div>
                    <p class="text-[11px] text-gray-600 font-medium">Ditugaskan ke Alice Lundberg</p>
                </div>
            </div>
        </div>
    </div>
@endsection
