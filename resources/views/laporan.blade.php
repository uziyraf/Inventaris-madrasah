@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <span class="text-gray-400">PORTAL UTAMA</span>
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
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Laporan Triwulan</h2>
            <p class="text-gray-500 text-[14px]">Unggah dan kelola laporan per triwulan (4x dalam setahun).</p>
        </div>
        <button onclick="toggleModal('modalTambah')"
            class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="12" y1="5" x2="12" y2="19" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
            Unggah Laporan
        </button>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-6">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-sm relative mb-6">
            <ul class="list-disc list-inside text-[13px]">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Summary Cards --}}
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
        @php
            $triwulans = ['Triwulan 1', 'Triwulan 2', 'Triwulan 3', 'Triwulan 4'];
            $colors = ['#1c7b5b', '#2563eb', '#d97706', '#dc2626'];
            $bgColors = ['#f0fbf7', '#eff6ff', '#fffbeb', '#fef2f2'];
        @endphp
        @foreach($triwulans as $i => $triwulan)
        <div class="bg-white p-5 rounded-sm shadow-sm border border-gray-100 flex flex-col items-center justify-center text-center h-32">
            <p class="text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">{{ $triwulan }}</p>
            <h3 class="text-[28px] font-bold leading-none" style="color: {{ $colors[$i] }}">
                {{ $laporans->where('masa_laporan', $triwulan)->count() }}
            </h3>
            <p class="text-[11px] text-gray-400 mt-1">laporan</p>
        </div>
        @endforeach
    </div>

    {{-- Table --}}
    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="px-6 py-4 border-b border-gray-100 flex items-center justify-between">
            <h3 class="text-[16px] font-bold text-[#1e293b]">Daftar Laporan</h3>
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
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
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
                                <span class="text-[13px] text-gray-600">{{ \Carbon\Carbon::parse($laporan->tanggal_submit)->format('d M Y') }}</span>
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
                            <td class="px-6 py-4 text-right">
                                <form action="{{ route('laporan.destroy', $laporan->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus laporan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-slate-400 hover:text-red-500 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M3 6h18"/>
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                        </svg>
                                    </button>
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
                                        <line x1="16" y1="13" x2="8" y2="13"/>
                                        <line x1="16" y1="17" x2="8" y2="17"/>
                                        <polyline points="10 9 9 9 8 9"/>
                                    </svg>
                                    <p class="text-gray-500 text-[14px] font-medium mb-1">Belum ada laporan</p>
                                    <p class="text-gray-400 text-[12px]">Klik tombol "Unggah Laporan" untuk menambahkan.</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    {{-- Modal Tambah Laporan --}}
    <div id="modalTambah" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-sm w-full max-w-lg p-8 shadow-xl">
            <h3 class="text-lg font-bold mb-6 text-gray-800">Unggah Laporan Baru</h3>
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Laporan</label>
                    <input type="text" name="nama" required placeholder="Contoh: Laporan Inventaris Semester Ganjil"
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Masa Laporan</label>
                        <select name="masa_laporan" required
                            class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                            <option value="">Pilih Triwulan...</option>
                            <option value="Triwulan 1">Triwulan 1 (Jan – Mar)</option>
                            <option value="Triwulan 2">Triwulan 2 (Apr – Jun)</option>
                            <option value="Triwulan 3">Triwulan 3 (Jul – Sep)</option>
                            <option value="Triwulan 4">Triwulan 4 (Okt – Des)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tahun</label>
                        <input type="number" name="tahun" required value="{{ date('Y') }}"
                            min="2000" max="2099"
                            class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                    </div>
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tanggal Submit</label>
                    <input type="date" name="tanggal_submit" required value="{{ date('Y-m-d') }}"
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>

                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">File Laporan</label>
                    <div class="border-2 border-dashed border-gray-200 rounded-sm p-4 text-center hover:border-[#1c7b5b] transition-colors cursor-pointer relative">
                        <input type="file" name="file" required accept=".pdf,.doc,.docx,.xls,.xlsx"
                            class="absolute inset-0 opacity-0 cursor-pointer w-full h-full">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                            stroke="#9ca3af" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="mx-auto mb-2">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                            <polyline points="17 8 12 3 7 8"/>
                            <line x1="12" y1="3" x2="12" y2="15"/>
                        </svg>
                        <p class="text-[12px] text-gray-400">Klik atau seret file ke sini</p>
                        <p class="text-[11px] text-gray-300 mt-1">PDF, DOCX, XLSX — maks. 10MB</p>
                    </div>
                </div>

                <div class="flex justify-end gap-3 mt-2">
                    <button type="button" onclick="toggleModal('modalTambah')"
                        class="px-4 py-2 text-sm font-bold text-gray-400 uppercase hover:text-gray-600 transition-colors">Batal</button>
                    <button type="submit"
                        class="bg-[#1c7b5b] text-white px-6 py-2 rounded-sm font-bold text-sm uppercase hover:bg-[#155d44] transition-colors shadow-sm">
                        Unggah Laporan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        // Show filename on file pick
        document.addEventListener('DOMContentLoaded', function() {
            const fileInput = document.querySelector('input[type="file"]');
            const label = fileInput.closest('.border-dashed');
            fileInput.addEventListener('change', function() {
                if (this.files.length > 0) {
                    label.querySelector('p').textContent = this.files[0].name;
                }
            });
        });
    </script>
@endsection
