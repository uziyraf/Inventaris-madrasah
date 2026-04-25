@extends('layouts.app')

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
            <button class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-4 py-2.5 rounded-sm font-medium text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Tambah Guru
            </button>
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
                        <th scope="col" class="px-6 py-5">NAMA GURU</th>
                        <th scope="col" class="px-6 py-5">NOMOR INDUK</th>
                        <th scope="col" class="px-6 py-5">DEPARTEMEN</th>
                        <th scope="col" class="px-6 py-5">INVENTARIS YANG DITUGASKAN</th>
                        <th scope="col" class="px-6 py-5">STATUS</th>
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-sm tracking-wide">
                                JD
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-[14px]">Dr. Jane Doe</p>
                                <p class="text-[12px] text-gray-400 mt-0.5">jane.doe@academy.edu</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium font-mono">TCH-</p>
                            <p class="text-[13px] text-gray-700 font-medium font-mono mt-0.5">2023-001</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">COMPUTER<br>SCIENCE</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex flex-wrap gap-1.5">
                                <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">MacBook Pro 14"</span>
                                <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">iPad Air</span>
                                <span class="bg-gray-50 text-gray-500 text-[10px] font-bold px-2 py-1 rounded-sm border border-gray-200">+2 lagi</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="inline-flex items-center gap-1.5 bg-[#f0fbf7] px-2.5 py-1 rounded-full border border-green-100">
                                <div class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></div>
                                <span class="text-[#1c7b5b] text-[11px] font-bold">Terverifikasi</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                            </button>
                        </td>
                    </tr>
                    
                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center font-bold text-sm tracking-wide">
                                RS
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-[14px]">Robert Smith</p>
                                <p class="text-[12px] text-gray-400 mt-0.5">r.smith@academy.edu</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium font-mono">TCH-</p>
                            <p class="text-[13px] text-gray-700 font-medium font-mono mt-0.5">2023-042</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">HUMANITIES</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex flex-wrap gap-1.5">
                                <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">Dell XPS 15</span>
                                <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">Projector-B4</span>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="inline-flex items-center gap-1.5 bg-yellow-50 px-2.5 py-1 rounded-full border border-yellow-100">
                                <div class="w-1.5 h-1.5 rounded-full bg-yellow-500"></div>
                                <span class="text-yellow-700 text-[11px] font-bold">Audit Tertunda</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-sm tracking-wide">
                                AL
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-[14px]">Alice Lundberg</p>
                                <p class="text-[12px] text-gray-400 mt-0.5">a.lundberg@academy.edu</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium font-mono">TCH-</p>
                            <p class="text-[13px] text-gray-700 font-medium font-mono mt-0.5">2023-018</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">PHYSICS LAB</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex flex-col gap-1.5">
                                <div class="flex gap-1.5">
                                    <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">ThinkPad X1</span>
                                </div>
                                <div class="flex gap-1.5">
                                    <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">Oscilloscope Gen 2</span>
                                </div>
                                <div class="flex gap-1.5">
                                    <span class="bg-gray-50 text-gray-500 text-[10px] font-bold px-2 py-1 rounded-sm border border-gray-200">+5 lagi</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="inline-flex items-center gap-1.5 bg-[#f0fbf7] px-2.5 py-1 rounded-full border border-green-100">
                                <div class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></div>
                                <span class="text-[#1c7b5b] text-[11px] font-bold">Terverifikasi</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                            </button>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <td class="px-6 py-5 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-sm tracking-wide">
                                MK
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 text-[14px]">Michael Kovic</p>
                                <p class="text-[12px] text-gray-400 mt-0.5">m.kovic@academy.edu</p>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <p class="text-[13px] text-gray-700 font-medium font-mono">TCH-</p>
                            <p class="text-[13px] text-gray-700 font-medium font-mono mt-0.5">2022-105</p>
                        </td>
                        <td class="px-6 py-5">
                            <span class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">PHYSICAL ED</span>
                        </td>
                        <td class="px-6 py-5">
                            <div class="flex flex-col gap-1.5">
                                <div class="flex gap-1.5">
                                    <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">Rugged iPad</span>
                                </div>
                                <div class="flex gap-1.5">
                                    <span class="bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2 py-1 rounded-sm border border-[#1c7b5b]/10">Coach Set Alpha</span>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-5">
                            <div class="inline-flex items-center gap-1.5 bg-red-50 px-2.5 py-1 rounded-full border border-red-100">
                                <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div>
                                <span class="text-red-600 text-[11px] font-bold">Item Hilang</span>
                            </div>
                        </td>
                        <td class="px-6 py-5 text-right">
                            <button class="text-gray-400 hover:text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="1"/><circle cx="12" cy="5" r="1"/><circle cx="12" cy="19" r="1"/></svg>
                            </button>
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
