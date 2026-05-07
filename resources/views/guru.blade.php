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
        <span class="text-[#1c7b5b]">DATA GURU</span>
    </div>

    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[26px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Manajemen Data Guru</h2>
            <p class="text-gray-500 text-[14px]">Kelola informasi tenaga pendidik dan inventaris yang ditugaskan.</p>
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
            <button onclick="toggleModal('modalTambah')"
                class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="12" y1="5" x2="12" y2="19" />
                    <line x1="5" y1="12" x2="19" y2="12" />
                </svg>
                Tambah Guru
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[11px] font-bold text-gray-500 tracking-wider uppercase">TOTAL GURU</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                    stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                    <circle cx="9" cy="7" r="4" />
                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                </svg>
            </div>
            <h3 class="text-[32px] font-bold text-[#1e293b] mb-2 leading-none">{{ $gurus->total() }}</h3>
            <p class="text-[12px] font-bold text-[#1c7b5b]">Aktif Mengajar</p>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="p-4 border-b border-gray-100 flex justify-between items-center bg-white">
            <p class="text-[10px] text-gray-400 font-bold tracking-wider uppercase">MENAMPILKAN
                {{ $gurus->firstItem() ?? 0 }} DARI {{ $gurus->total() }} GURU</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-5">NAMA GURU</th>
                        <th scope="col" class="px-6 py-5">NIK</th>
                        <th scope="col" class="px-6 py-5">L/P</th>
                        <th scope="col" class="px-6 py-5">TTL</th>
                        <th scope="col" class="px-6 py-5">ALAMAT</th>
                        <th scope="col" class="px-6 py-5">STATUS</th>
                        <th scope="col" class="px-6 py-5">MULAI MENGAJAR</th>
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($gurus as $guru)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-5 flex items-center gap-4">
                                <div
                                    class="w-9 h-9 rounded-sm bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-xs tracking-wide uppercase">
                                    {{ strtoupper(substr($guru->nama_guru, 0, 2)) }}
                                </div>
                                <p class="font-bold text-[#1e293b] text-[13px]">{{ $guru->nama_guru }}</p>
                            </td>
                            <td class="px-6 py-5 font-mono">{{ $guru->nik }}</td>
                            <td class="px-6 py-5">
                                <span
                                    class="bg-gray-100 text-gray-600 text-[10px] font-bold px-2 py-1 rounded-sm uppercase tracking-wider">{{ $guru->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}</span>
                            </td>
                            <td class="px-6 py-5">
                                <p class="text-[13px] font-medium">{{ $guru->tempat_lahir }},</p>
                                <p class="text-[12px] text-gray-400">
                                    {{ \Carbon\Carbon::parse($guru->tanggal_lahir)->translatedFormat('d M Y') }}</p>
                            </td>
                            <td class="px-6 py-5 truncate max-w-[150px]" title="{{ $guru->alamat }}">{{ $guru->alamat }}</td>
                            <td class="px-6 py-5">
                                @if($guru->status == 'Aktif')
                                    <span class="bg-green-100 text-green-700 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Aktif</span>
                                @else
                                    <span class="bg-red-50 text-red-600 text-[10px] font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Tidak Aktif</span>
                                @endif
                            </td>
                            <td class="px-6 py-5 font-bold text-[#1c7b5b]">{{ $guru->tahun_mulai_mengajar }}</td>
                            <td class="px-6 py-5 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <button onclick="editGuru({{ json_encode($guru) }})"
                                        class="text-slate-400 hover:text-[#1c7b5b] transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M12 20h9" />
                                            <path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z" />
                                        </svg>
                                    </button>
                                    <button onclick="konfirmasiHapus({{ $guru->id }})"
                                        class="text-slate-400 hover:text-red-500 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M3 6h18" />
                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
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
                                    <p class="text-gray-400 text-[12px]">Silakan klik tombol "Tambah Guru" di pojok kanan atas.
                                    </p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="px-6 py-5 border-t border-gray-100">
            {{ $gurus->links() }}
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-sm w-full max-w-2xl p-8 shadow-xl">
            <h3 class="text-lg font-bold mb-6 text-gray-800">Tambah Data Guru Baru</h3>
            <form action="{{ route('guru.store') }}" method="POST" class="grid grid-cols-2 gap-4">
                @csrf
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">NIK</label>
                    <input type="text" name="nik" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Guru</label>
                    <input type="text" name="nama_guru" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div class="col-span-2">
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Alamat</label>
                    <textarea name="alamat" rows="2" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"></textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        <option value="">Pilih...</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Status</label>
                    <select name="status" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tahun Mulai Mengajar</label>
                    <input type="number" name="tahun_mulai_mengajar" required min="1990" max="2099"
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div class="col-span-2 flex justify-end gap-3 mt-4">
                    <button type="button" onclick="toggleModal('modalTambah')"
                        class="px-4 py-2 text-sm font-bold text-gray-400 uppercase hover:text-gray-600 transition-colors">Batal</button>
                    <button type="submit"
                        class="bg-[#1c7b5b] text-white px-6 py-2 rounded-sm font-bold text-sm uppercase hover:bg-[#155d44] transition-colors shadow-sm">Simpan
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEdit" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-sm w-full max-w-2xl p-8 shadow-xl">
            <h3 class="text-lg font-bold mb-6 text-gray-800">Edit Data Guru</h3>
            <form id="formEdit" method="POST" class="grid grid-cols-2 gap-4">
                @csrf
                @method('PUT')
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">NIK</label>
                    <input type="text" name="nik" id="edit_nik" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div class="col-span-2 md:col-span-1">
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Guru</label>
                    <input type="text" name="nama_guru" id="edit_nama_guru" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" id="edit_tempat_lahir" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="edit_tanggal_lahir" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div class="col-span-2">
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" id="edit_alamat" rows="2" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"></textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="edit_jenis_kelamin" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Status</label>
                    <select name="status" id="edit_status" required
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Tahun Mulai Mengajar</label>
                    <input type="number" name="tahun_mulai_mengajar" id="edit_tahun_mulai_mengajar" required min="1990"
                        max="2099"
                        class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div class="col-span-2 flex justify-end gap-3 mt-4">
                    <button type="button" onclick="toggleModal('modalEdit')"
                        class="px-4 py-2 text-sm font-bold text-gray-400 uppercase hover:text-gray-600 transition-colors">Batal</button>
                    <button type="submit"
                        class="bg-[#1c7b5b] text-white px-6 py-2 rounded-sm font-bold text-sm uppercase hover:bg-[#155d44] transition-colors shadow-sm">Update
                        Data</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalHapus" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white p-8 rounded-sm max-w-sm w-full text-center shadow-xl">
            <div class="text-red-500 mb-4 flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                    stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 6h18" />
                    <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" />
                    <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" />
                    <line x1="10" y1="11" x2="10" y2="17" />
                    <line x1="14" y1="11" x2="14" y2="17" />
                </svg>
            </div>
            <h3 class="font-bold text-lg mb-2 text-gray-800">Hapus Data Guru?</h3>
            <p class="text-gray-500 text-sm mb-6">Data ini akan dihapus secara permanen dari sistem.</p>
            <form id="formHapus" method="POST" class="flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="toggleModal('modalHapus')"
                    class="px-5 py-2 font-bold text-gray-400 uppercase text-[13px] hover:text-gray-600 transition-colors">Batal</button>
                <button type="submit"
                    class="bg-red-500 text-white px-6 py-2 rounded-sm font-bold uppercase text-[13px] hover:bg-red-600 transition-colors shadow-sm">Ya,
                    Hapus</button>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function editGuru(data) {
            const form = document.getElementById('formEdit');
            form.action = `/guru/${data.id}`;

            document.getElementById('edit_nik').value = data.nik;
            document.getElementById('edit_nama_guru').value = data.nama_guru;
            document.getElementById('edit_tempat_lahir').value = data.tempat_lahir;
            document.getElementById('edit_tanggal_lahir').value = data.tanggal_lahir;
            document.getElementById('edit_alamat').value = data.alamat;
            document.getElementById('edit_jenis_kelamin').value = data.jenis_kelamin;
            document.getElementById('edit_status').value = data.status || 'Aktif';
            document.getElementById('edit_tahun_mulai_mengajar').value = data.tahun_mulai_mengajar;

            toggleModal('modalEdit');
        }

        function konfirmasiHapus(id) {
            const form = document.getElementById('formHapus');
            form.action = `/guru/${id}`;
            toggleModal('modalHapus');
        }
    </script>
@endsection