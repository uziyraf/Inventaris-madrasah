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
        <span class="text-[#1c7b5b]">REKAP INVENTARIS</span>
    </div>

    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Katalog Inventaris Global</h2>
            <p class="text-gray-500 text-[14px]">Pantau, audit, dan lacak seluruh aset/peralatan dari semua lembaga.</p>
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
                Ekspor Laporan
            </button>
            <!-- Tombol Tambah Dihapus -->
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TOTAL ASET KESELURUHAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                    <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">
                {{ method_exists($inventaris, 'total') ? $inventaris->total() : $inventaris->count() }}</h3>
            <p class="text-[12px] font-bold text-[#1c7b5b]">Terdaftar di semua lembaga</p>
        </div>

        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">DALAM PEMINJAMAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="22 12 16 12 14 15 10 15 8 12 2 12" />
                    <path
                        d="M5.45 5.11 2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">
                {{ collect($inventaris->items ?? $inventaris)->where('kondisi', 'Dalam Peminjaman')->sum('jumlah') }}
            </h3>
            <p class="text-[12px] font-medium text-gray-500">Unit sedang digunakan</p>
        </div>

        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">PERLU PERAWATAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#eab308" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path
                        d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-yellow-500 mb-2 leading-none">
                {{ collect($inventaris->items ?? $inventaris)->whereIn('kondisi', ['Rusak Ringan', 'Rusak Sedang'])->sum('jumlah') }}
            </h3>
            <p class="text-[12px] font-medium text-gray-500">Unit Rusak Ringan/Sedang</p>
        </div>

        <div class="bg-white p-6 rounded-sm shadow-sm border-t-[3px] border-t-[#ef4444] relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">RUSAK BERAT</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z" />
                    <line x1="12" y1="9" x2="12" y2="13" />
                    <line x1="12" y1="17" x2="12.01" y2="17" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#ef4444] mb-2 leading-none">
                {{ collect($inventaris->items ?? $inventaris)->where('kondisi', 'Rusak Berat')->sum('jumlah') }}
            </h3>
            <p class="text-[12px] font-bold text-[#ef4444]">Memerlukan tindakan segera</p>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="p-4 border-b border-gray-100 flex flex-wrap justify-between items-center bg-gray-50/50 gap-4">
            <form action="{{ route('admin.inventaris') }}" method="GET" class="flex flex-1 max-w-3xl items-center gap-3">
                <div class="relative w-72">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="search" value="{{ request('search') }}"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-sm text-[13px] focus:ring-[#1c7b5b] focus:border-[#1c7b5b] text-gray-900 placeholder-gray-400"
                        placeholder="Cari nama aset atau keterangan...">
                </div>

                <div class="relative">
                    <select name="kategori" onchange="this.form.submit()"
                        class="appearance-none flex items-center gap-2 text-[11px] font-bold text-[#1e293b] border border-gray-200 bg-white rounded-sm pl-3 pr-8 py-2 hover:bg-gray-50 transition-colors uppercase tracking-wider focus:outline-none focus:border-[#1c7b5b] cursor-pointer">
                        <option value="">SEMUA KATEGORI</option>
                        <option value="Gedung" {{ request('kategori') == 'Gedung' ? 'selected' : '' }}>Gedung</option>
                        <option value="Furnitur" {{ request('kategori') == 'Furnitur' ? 'selected' : '' }}>Furnitur</option>
                        <option value="Elektronik" {{ request('kategori') == 'Elektronik' ? 'selected' : '' }}>Elektronik
                        </option>
                        <option value="Perlengkapan Administrasi & Kantor" {{ request('kategori') == 'Perlengkapan Administrasi & Kantor' ? 'selected' : '' }}>Perl. Kantor</option>
                        <option value="Sarana Pendukung" {{ request('kategori') == 'Sarana Pendukung' ? 'selected' : '' }}>
                            Sarana Pendukung</option>
                        <option value="Kendaraan" {{ request('kategori') == 'Kendaraan' ? 'selected' : '' }}>Kendaraan
                        </option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <div class="relative">
                    <select name="kondisi" onchange="this.form.submit()"
                        class="appearance-none flex items-center gap-2 text-[11px] font-bold text-[#1e293b] border border-gray-200 bg-white rounded-sm pl-3 pr-8 py-2 hover:bg-gray-50 transition-colors uppercase tracking-wider focus:outline-none focus:border-[#1c7b5b] cursor-pointer">
                        <option value="">SEMUA KONDISI</option>
                        <option value="Baik" {{ request('kondisi') == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Rusak Ringan" {{ request('kondisi') == 'Rusak Ringan' ? 'selected' : '' }}>Rusak Ringan
                        </option>
                        <option value="Rusak Sedang" {{ request('kondisi') == 'Rusak Sedang' ? 'selected' : '' }}>Rusak Sedang
                        </option>
                        <option value="Rusak Berat" {{ request('kondisi') == 'Rusak Berat' ? 'selected' : '' }}>Rusak Berat
                        </option>
                        <option value="Dalam Peminjaman" {{ request('kondisi') == 'Dalam Peminjaman' ? 'selected' : '' }}>
                            Dalam Peminjaman</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </div>
                </div>

                <button type="submit"
                    class="bg-[#1e293b] text-white px-4 py-2 rounded-sm text-[11px] font-bold uppercase tracking-wider hover:bg-gray-800 transition-colors">
                    Cari
                </button>

                @if(request('search') || request('kategori') || request('kondisi'))
                    <a href="{{ route('admin.inventaris') }}"
                        class="text-[11px] font-bold text-red-500 hover:text-red-700 underline uppercase tracking-wider ml-2">Reset</a>
                @endif
            </form>

            <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">DARI SELURUH LEMBAGA</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="p-4 w-12 text-center">NO</th>
                        <th scope="col" class="px-6 py-5">NAMA ASET</th>
                        <th scope="col" class="px-6 py-5">ASAL LEMBAGA</th>
                        <th scope="col" class="px-6 py-5">KATEGORI</th>
                        <th scope="col" class="px-6 py-5 text-center">JUMLAH</th>
                        <th scope="col" class="px-6 py-5">KONDISI</th>
                        <th scope="col" class="px-6 py-5">KETERANGAN</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($inventaris as $index => $item)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="p-4 text-center text-[13px] text-gray-500 font-medium">
                                {{ method_exists($inventaris, 'firstItem') ? $inventaris->firstItem() + $index : $loop->iteration }}
                            </td>
                            <td class="px-6 py-4 flex items-start gap-4">
                                <div
                                    class="w-10 h-10 rounded-sm bg-gray-100 text-gray-500 flex items-center justify-center flex-shrink-0 border border-gray-200">
                                    @if(in_array($item->kategori, ['Gedung', 'Sarana Pendukung']))
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                                        </svg>
                                    @elseif($item->kategori == 'Kendaraan')
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <rect width="16" height="16" x="4" y="4" rx="2" />
                                            <rect width="6" height="6" x="9" y="9" rx="1" />
                                            <path d="M15 4v16" />
                                            <path d="M9 4v16" />
                                        </svg>
                                    @else
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2" />
                                            <line x1="8" y1="21" x2="16" y2="21" />
                                            <line x1="12" y1="17" x2="12" y2="21" />
                                        </svg>
                                    @endif
                                </div>
                                <div>
                                    <p class="font-bold text-[#1e293b] text-[13px]">{{ $item->aset }}</p>
                                    <p class="text-[11px] text-gray-400 font-medium mt-0.5 font-mono">ID:
                                        AST-{{ str_pad($item->id, 4, '0', STR_PAD_LEFT) }}</p>
                                </div>
                            </td>
                            <!-- Kolom Asal Lembaga -->
                            <td class="px-6 py-4">
                                <span
                                    class="bg-blue-50 text-blue-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider whitespace-nowrap">
                                    {{ $item->lembaga ? $item->lembaga->nama_madrasah : 'Global' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span
                                    class="bg-gray-100 text-gray-700 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">{{ $item->kategori }}</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <span
                                    class="font-bold text-[#1e293b] text-[14px] bg-gray-50 px-3 py-1 rounded-sm border border-gray-200">{{ $item->jumlah }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @if($item->kondisi == 'Baik')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-[#f0fbf7] text-[#1c7b5b] text-[10px] font-bold px-2.5 py-1 rounded-full border border-green-100 uppercase tracking-wider">
                                        <div class="w-1.5 h-1.5 rounded-full bg-[#1c7b5b]"></div> BAIK
                                    </span>
                                @elseif($item->kondisi == 'Rusak Ringan')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-yellow-50 text-yellow-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-yellow-200 uppercase tracking-wider">
                                        <div class="w-1.5 h-1.5 rounded-full bg-yellow-500"></div> RUSAK RINGAN
                                    </span>
                                @elseif($item->kondisi == 'Rusak Sedang')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-orange-50 text-orange-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-orange-200 uppercase tracking-wider">
                                        <div class="w-1.5 h-1.5 rounded-full bg-orange-500"></div> RUSAK SEDANG
                                    </span>
                                @elseif($item->kondisi == 'Rusak Berat')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-red-50 text-red-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-red-200 uppercase tracking-wider">
                                        <div class="w-1.5 h-1.5 rounded-full bg-red-500"></div> RUSAK BERAT
                                    </span>
                                @elseif($item->kondisi == 'Dalam Peminjaman')
                                    <span
                                        class="inline-flex items-center gap-1.5 bg-indigo-50 text-indigo-700 text-[10px] font-bold px-2.5 py-1 rounded-full border border-indigo-200 uppercase tracking-wider">
                                        <div class="w-1.5 h-1.5 rounded-full bg-indigo-500"></div> DIPINJAM
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-[13px] text-gray-600 truncate max-w-[200px]" title="{{ $item->keterangan }}">
                                    {{ $item->keterangan ?? '-' }}
                                </p>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-14 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                                        stroke-linejoin="round" class="text-gray-300 mb-4">
                                        <path
                                            d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
                                        <polyline points="3.27 6.96 12 12.01 20.73 6.96" />
                                        <line x1="12" y1="22.08" x2="12" y2="12" />
                                    </svg>
                                    <p class="text-gray-500 text-[14px] font-medium mb-1">Belum ada data inventaris global</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if(method_exists($inventaris, 'links'))
            <div class="px-6 py-5 flex items-center justify-between border-t border-gray-100">
                <div class="w-full">
                    {{ $inventaris->links() }}
                </div>
            </div>
        @endif
    </div>
@endsection