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
        <span class="text-[#1c7b5b]">REKAP DATA GURU</span>
    </div>

    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Rekapitulasi Data Guru</h2>
            <p class="text-gray-500 text-[14px]">Pantau informasi seluruh tenaga pendidik dari semua lembaga.</p>
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
            <!-- Tombol Tambah Guru Dihapus karena Yayasan hanya melihat data -->
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TOTAL GURU KESELURUHAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <!-- Menggunakan count() jika $gurus adalah Collection, atau total() jika sudah dipaginasi -->
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">{{ method_exists($gurus, 'total') ? $gurus->total() : $gurus->count() }}</h3>
            <p class="text-[12px] font-bold text-[#1c7b5b]">Tersebar di seluruh lembaga</p>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-white">
            <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">
                MENAMPILKAN DATA GURU DARI SELURUH LEMBAGA
            </p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-5">NAMA GURU</th>
                        <th scope="col" class="px-6 py-5">ASAL LEMBAGA</th>
                        <th scope="col" class="px-6 py-5">NIK</th>
                        <th scope="col" class="px-6 py-5">L/P</th>
                        <th scope="col" class="px-6 py-5">TTL</th>
                        <th scope="col" class="px-6 py-5">ALAMAT</th>
                        <th scope="col" class="px-6 py-5 text-right">MULAI MENGAJAR</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($gurus as $guru)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-5 flex items-center gap-4">
                                <div
                                    class="w-9 h-9 rounded-sm bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-xs tracking-wide uppercase shrink-0">
                                    {{ strtoupper(substr($guru->nama_guru, 0, 2)) }}
                                </div>
                                <p class="font-bold text-[#1e293b] text-[13px] whitespace-nowrap">{{ $guru->nama_guru }}</p>
                            </td>
                            <!-- Kolom Baru: Asal Lembaga -->
                            <td class="px-6 py-5">
                                <span class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider whitespace-nowrap">
                                    {{ $guru->lembaga ? $guru->lembaga->nama_madrasah : 'Global' }}
                                </span>
                            </td>
                            <td class="px-6 py-5 font-mono">{{ $guru->nik }}</td>
                            <td class="px-6 py-5">
                                <span
                                    class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">{{ $guru->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</span>
                            </td>
                            <td class="px-6 py-5 whitespace-nowrap">
                                <p class="text-[13px] font-medium">{{ $guru->tempat_lahir }},</p>
                                <p class="text-[12px] text-gray-400">
                                    {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d M Y') }}</p>
                            </td>
                            <td class="px-6 py-5 truncate max-w-[150px]" title="{{ $guru->alamat }}">{{ $guru->alamat }}</td>
                            <td class="px-6 py-5 font-bold text-[#1c7b5b] text-right">{{ $guru->tahun_mulai_mengajar }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-14 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round" class="text-gray-300 mb-4">
                                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                        <circle cx="9" cy="7" r="4" />
                                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                    </svg>
                                    <p class="text-gray-500 text-[14px] font-medium mb-1">Belum ada data guru di database</p>
                                    <p class="text-gray-400 text-[12px]">Data akan muncul ketika Admin Lembaga mulai menambahkan guru.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Paginasi (Hanya muncul jika menggunakan paginate() di Controller) -->
        @if(method_exists($gurus, 'links'))
            <div class="px-6 py-5 border-t border-gray-100">
                {{ $gurus->links() }}
            </div>
        @endif
    </div>
@endsection