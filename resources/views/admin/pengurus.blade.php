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
        <span class="text-[#1c7b5b]">REKAP DATA PENGURUS</span>
    </div>

    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[28px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Rekapitulasi Pengurus</h2>
            <p class="text-gray-500 text-[14px]">Pantau staf institusi dan kontrol akses sistem dari seluruh lembaga.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-[#1c7b5b] hover:bg-gray-50 px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Ekspor CSV
            </button>
            <!-- Tombol Tambah Dihapus -->
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-full bg-[#f0fbf7] flex items-center justify-center text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 15v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1"/><circle cx="10" cy="9" r="2"/><path d="M16 9h2"/><path d="M16 13h2"/></svg>
                </div>
            </div>
            <div>
                <p class="text-[12px] font-medium text-gray-500 mb-1">Total Staf Global</p>
                <h3 class="text-[32px] font-bold text-[#1e293b] leading-none">{{ method_exists($penguruses, 'total') ? $penguruses->total() : $penguruses->count() }}</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-full bg-[#f0fbf7] flex items-center justify-center text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                </div>
            </div>
            <div>
                <p class="text-[12px] font-medium text-gray-500 mb-1">Pengurus Aktif</p>
                <h3 class="text-[32px] font-bold text-[#1e293b] leading-none">{{ collect($penguruses->items ?? $penguruses)->where('status', 'Aktif')->count() }}</h3>
            </div>
        </div>

        <div class="md:col-span-2 bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[13px] font-medium text-gray-600">Status Sistem Global</p>
                <div class="flex items-center gap-1.5">
                    <div class="w-2 h-2 rounded-full bg-[#1c7b5b]"></div>
                    <span class="text-[11px] font-bold text-[#1c7b5b]">Operasional</span>
                </div>
            </div>
            <div class="flex items-end justify-between h-12 mb-3 gap-1">
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
            <p class="text-[11px] text-gray-400">Aktivitas sinkronisasi inventaris seluruh lembaga (24 jam terakhir)</p>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="px-6 py-4 border-b border-gray-100 flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <h3 class="text-[16px] font-bold text-[#1e293b]">Daftar Pengurus Global</h3>
                <div class="flex bg-gray-50 p-1 rounded-md border border-gray-100">
                    <button class="px-3 py-1 text-[12px] font-semibold bg-white text-[#1c7b5b] shadow-sm rounded-sm">Semua</button>
                    <button class="px-3 py-1 text-[12px] font-medium text-gray-500 hover:text-gray-700">Aktif</button>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-[12px] text-gray-500">Filter:</span>
                <select class="border border-gray-200 text-gray-600 text-[12px] rounded-sm px-3 py-1.5 w-40 focus:ring-0 focus:border-gray-300">
                    <option>Semua Lembaga</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-5">JABATAN</th>
                        <th scope="col" class="px-6 py-5">NAMA</th>
                        <th scope="col" class="px-6 py-5">ASAL LEMBAGA</th>
                        <th scope="col" class="px-6 py-5">STATUS</th>
                        <th scope="col" class="px-6 py-5">ALAMAT</th>
                        <th scope="col" class="px-6 py-5">KETERANGAN</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($penguruses as $pengurus)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="inline-block bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm leading-tight">{{ $pengurus->jabatan }}</span>
                            </td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full border border-gray-200 bg-gray-100 flex items-center justify-center font-bold text-gray-500 uppercase shrink-0">
                                    {{ substr($pengurus->nama, 0, 2) }}
                                </div>
                                <div>
                                    <p class="font-bold text-[#1e293b] text-[14px] whitespace-nowrap">{{ $pengurus->nama }}</p>
                                </div>
                            </td>
                            <!-- Kolom Asal Lembaga -->
                            <td class="px-6 py-4">
                                <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider whitespace-nowrap">
                                    {{ $pengurus->lembaga ? $pengurus->lembaga->nama_madrasah : 'Global' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                @if($pengurus->status == 'Aktif')
                                    <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Aktif</span>
                                @else
                                    <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-[13px] text-gray-700 truncate max-w-[150px]" title="{{ $pengurus->alamat }}">{{ $pengurus->alamat }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-[13px] text-gray-600">{{ $pengurus->keterangan ?? '-' }}</span>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-14 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mb-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M22 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                                    <p class="text-gray-500 text-[14px] font-medium mb-1">Belum ada data pengurus</p>
                                    <p class="text-gray-400 text-[12px]">Data akan muncul jika Admin Lembaga menambahkan staf.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if(method_exists($penguruses, 'links'))
            <div class="px-6 py-5 flex items-center justify-between border-t border-gray-100">
                <div class="w-full">
                    {{ $penguruses->links() }}
                </div>
            </div>
        @endif
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-8">
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 class="text-[15px] font-bold text-[#1e293b]">Kebijakan Kontrol Akses (Yayasan)</h3>
            </div>
            <p class="text-[13px] text-gray-600 leading-relaxed">
                Super Admin dapat melihat semua aktivitas pengurus dari seluruh madrasah/lembaga. Persetujuan aset bernilai tinggi dikendalikan oleh Kepala Yayasan.
            </p>
        </div>

        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>
                </div>
                <h3 class="text-[15px] font-bold text-[#1e293b]">Log Aktivitas Global</h3>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-start border-b border-gray-50 pb-4">
                    <p class="text-[12px] text-gray-600 font-medium">Pemantauan sistem dimulai</p>
                    <span class="text-[11px] text-gray-400 whitespace-nowrap">Baru saja</span>
                </div>
            </div>
        </div>
    </div>
@endsection