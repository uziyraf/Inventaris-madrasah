@extends('layouts.admin')

@section('content')
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <span class="text-gray-400">SUPER ADMIN</span>
        <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </span>
        <span class="text-[#1c7b5b]">LAPORAN</span>
    </div>

    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Rekap Laporan Semua Lembaga</h2>
            <p class="text-gray-500 text-[14px]">Pantau dan perbarui status laporan triwulan dari seluruh madrasah.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-6 text-[13px]">
            {{ session('success') }}
        </div>
    @endif

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $triwulans = ['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4'];
            $colors = ['#1c7b5b', '#2563eb', '#d97706', '#dc2626'];
        @endphp
        @foreach($triwulans as $i => $triwulan)
        <div class="bg-white p-5 rounded-sm shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center h-32">
            <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">{{ $triwulan }}</p>
            <h3 class="text-[28px] font-bold leading-none" style="color: {{ $colors[$i] }}">
                {{ $laporans->where('masa_laporan', $triwulan)->count() }}
            </h3>
            <p class="text-[11px] text-gray-400 mt-1">laporan masuk</p>
        </div>
        @endforeach
    </div>

    {{-- Status Summary --}}
    <div class="grid grid-cols-2 gap-4 mb-8">
        <div class="bg-white p-5 rounded-sm shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-10 h-10 rounded-sm bg-green-50 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"/>
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Sudah Selesai</p>
                <h3 class="text-[24px] font-bold text-[#1c7b5b] leading-none">{{ $laporans->where('status','Sudah Selesai')->count() }}</h3>
            </div>
        </div>
        <div class="bg-white p-5 rounded-sm shadow-sm border border-gray-100 flex items-center gap-4">
            <div class="w-10 h-10 rounded-sm bg-orange-50 flex items-center justify-center flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#f59e0b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <circle cx="12" cy="12" r="10"/>
                    <line x1="12" y1="8" x2="12" y2="12"/>
                    <line x1="12" y1="16" x2="12.01" y2="16"/>
                </svg>
            </div>
            <div>
                <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wider">Belum Selesai</p>
                <h3 class="text-[24px] font-bold text-yellow-600 leading-none">{{ $laporans->where('status','Belum Selesai')->count() }}</h3>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-[16px] font-bold text-[#1e293b]">Daftar Semua Laporan</h3>
            <span class="text-[12px] text-gray-400 font-medium">{{ $laporans->count() }} laporan terdaftar</span>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-5 w-12">ID</th>
                        <th scope="col" class="px-6 py-5">NAMA LAPORAN</th>
                        <th scope="col" class="px-6 py-5">MADRASAH</th>
                        <th scope="col" class="px-6 py-5">MASA LAPORAN</th>
                        <th scope="col" class="px-6 py-5">TANGGAL SUBMIT</th>
                        <th scope="col" class="px-6 py-5">FILE</th>
                        <th scope="col" class="px-6 py-5">STATUS</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse($laporans as $laporan)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-gray-400 font-mono text-[12px]">{{ $laporan->id }}</td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-[#1e293b] text-[13px]">{{ $laporan->nama }}</p>
                                <p class="text-[11px] text-gray-400 mt-0.5">{{ $laporan->tahun }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-[13px] text-gray-700">{{ $laporan->madrasah }}</span>
                            </td>
                            <td class="px-6 py-4">
                                @php
                                    $badgeColor = [
                                        'Triwulan 1' => 'bg-[#f0fbf7] text-[#1c7b5b] border-[#1c7b5b]/20',
                                        'Triwulan 2' => 'bg-blue-50 text-blue-700 border-blue-200',
                                        'Triwulan 3' => 'bg-yellow-50 text-yellow-700 border-yellow-200',
                                        'Triwulan 4' => 'bg-red-50 text-red-700 border-red-200',
                                    ][$laporan->masa_laporan] ?? 'bg-gray-100 text-gray-600 border-gray-200';
                                @endphp
                                <span class="text-[11px] font-bold px-2.5 py-1 rounded-full border uppercase tracking-wider {{ $badgeColor }}">
                                    {{ $laporan->masa_laporan }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-[13px] text-gray-600">
                                    {{ \Carbon\Carbon::parse($laporan->tanggal_submit)->format('d M Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ Storage::url($laporan->file) }}" target="_blank"
                                    class="inline-flex items-center gap-1.5 text-[#1c7b5b] hover:text-[#155d44] font-semibold text-[12px] transition-colors">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                        <polyline points="7 10 12 15 17 10"/>
                                        <line x1="12" y1="15" x2="12" y2="3"/>
                                    </svg>
                                    Unduh
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.laporan.status', $laporan->id) }}" method="POST"
                                    class="flex items-center gap-2">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()"
                                        class="text-[11px] font-bold border rounded-full px-3 py-1 focus:outline-none cursor-pointer
                                        {{ $laporan->status === 'Sudah Selesai'
                                            ? 'bg-[#f0fbf7] text-[#1c7b5b] border-[#1c7b5b]/30'
                                            : 'bg-orange-50 text-orange-700 border-orange-200' }}">
                                        <option value="Belum Selesai" {{ $laporan->status === 'Belum Selesai' ? 'selected' : '' }}>
                                            Belum Selesai
                                        </option>
                                        <option value="Sudah Selesai" {{ $laporan->status === 'Sudah Selesai' ? 'selected' : '' }}>
                                            Sudah Selesai
                                        </option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-6 py-14 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
                                        class="text-gray-300 mb-4">
                                        <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                        <polyline points="14 2 14 8 20 8"/>
                                    </svg>
                                    <p class="text-gray-500 text-[14px] font-medium">Belum ada laporan masuk</p>
                                    <p class="text-gray-400 text-[12px] mt-1">Laporan akan muncul saat lembaga mengunggahnya.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
