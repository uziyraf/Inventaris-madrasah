@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[28px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Data Pengurus</h2>
            <p class="text-gray-500 text-[14px]">Kelola staf institusi dan kontrol akses sistem untuk alur inventaris.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-[#1c7b5b] hover:bg-gray-50 px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Ekspor CSV
            </button>
            <button onclick="toggleModal('modalTambah')" class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg>
                Pengurus Baru
            </button>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-sm relative mb-6">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start">
                <div class="w-10 h-10 rounded-full bg-[#f0fbf7] flex items-center justify-center text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2"/><path d="M7 15v-1a2 2 0 0 1 2-2h2a2 2 0 0 1 2 2v1"/><circle cx="10" cy="9" r="2"/><path d="M16 9h2"/><path d="M16 13h2"/></svg>
                </div>
            </div>
            <div>
                <p class="text-[12px] font-medium text-gray-500 mb-1">Total Staf</p>
                <h3 class="text-[32px] font-bold text-[#1e293b] leading-none">{{ $penguruses->total() }}</h3>
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
                <h3 class="text-[32px] font-bold text-[#1e293b] leading-none">{{ $penguruses->where('status', 'Aktif')->count() }}</h3>
            </div>
        </div>

        <div class="md:col-span-2 bg-white p-6 rounded-sm shadow-sm border border-gray-100 flex flex-col justify-between h-36">
            <div class="flex justify-between items-start mb-4">
                <p class="text-[13px] font-medium text-gray-600">Status Sistem</p>
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
            <p class="text-[11px] text-gray-400">Aktivitas sinkronisasi inventaris selama 24 jam terakhir</p>
        </div>
    </div>

    <div class="bg-white rounded-sm shadow-sm border border-gray-200 mb-8">
        <div class="px-6 py-4 border-b border-gray-100 flex flex-wrap justify-between items-center gap-4">
            <div class="flex items-center gap-4">
                <h3 class="text-[16px] font-bold text-[#1e293b]">Daftar Pengurus</h3>
                <div class="flex bg-gray-50 p-1 rounded-md border border-gray-100">
                    <button class="px-3 py-1 text-[12px] font-semibold bg-white text-[#1c7b5b] shadow-sm rounded-sm">Semua</button>
                    <button class="px-3 py-1 text-[12px] font-medium text-gray-500 hover:text-gray-700">Aktif</button>
                    <button class="px-3 py-1 text-[12px] font-medium text-gray-500 hover:text-gray-700">Tidak Aktif</button>
                </div>
            </div>
            
            <div class="flex items-center gap-3">
                <span class="text-[12px] text-gray-500">Filter:</span>
                <select class="border border-gray-200 text-gray-600 text-[12px] rounded-sm px-3 py-1.5 w-36 focus:ring-0 focus:border-gray-300">
                    <option>Semua Peran</option>
                    <option>Manajer Inventaris</option>
                    <option>Staf</option>
                </select>
            </div>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100">
                    <tr>
                        <th scope="col" class="px-6 py-5">JABATAN</th>
                        <th scope="col" class="px-6 py-5">NAMA</th>
                        <th scope="col" class="px-6 py-5">STATUS</th>
                        <th scope="col" class="px-6 py-5">ALAMAT</th>
                        <th scope="col" class="px-6 py-5">KETERANGAN</th>
                        <th scope="col" class="px-6 py-5 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    @forelse ($penguruses as $pengurus)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <span class="inline-block bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm leading-tight">{{ $pengurus->jabatan }}</span>
                            </td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full border border-gray-200 bg-gray-100 flex items-center justify-center font-bold text-gray-500 uppercase">
                                    {{ substr($pengurus->nama, 0, 2) }}
                                </div>
                                <div>
                                    <p class="font-bold text-[#1e293b] text-[14px]">{{ $pengurus->nama }}</p>
                                </div>
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
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end gap-3">
                                    <button onclick="editPengurus({{ json_encode($pengurus) }})" class="text-slate-400 hover:text-[#1c7b5b] transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                                    </button>
                                    <button onclick="konfirmasiHapus({{ $pengurus->id }})" class="text-slate-400 hover:text-red-500 transition-colors">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-14 text-center">
                                <div class="flex flex-col items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" class="text-gray-300 mb-4"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" /><circle cx="9" cy="7" r="4" /><path d="M22 21v-2a4 4 0 0 0-3-3.87" /><path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                                    <p class="text-gray-500 text-[14px] font-medium mb-1">Belum ada data pengurus</p>
                                    <p class="text-gray-400 text-[12px]">Silakan klik tombol "Pengurus Baru".</p>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <div class="px-6 py-5 flex items-center justify-between border-t border-gray-100">
            <div class="w-full">
                {{ $penguruses->links() }}
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pb-8">
        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-4">
                <div class="text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                </div>
                <h3 class="text-[15px] font-bold text-[#1e293b]">Kebijakan Kontrol Akses</h3>
            </div>
            <p class="text-[13px] text-gray-600 leading-relaxed">
                Hanya Pengurus dengan peran "Manajer Inventaris" yang dapat menyetujui permintaan peralatan bernilai tinggi. Hubungi tim IT untuk eskalasi hak istimewa.
            </p>
        </div>

        <div class="bg-white rounded-sm shadow-sm border border-gray-100 p-6">
            <div class="flex items-center gap-3 mb-5">
                <div class="text-[#1c7b5b]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>
                </div>
                <h3 class="text-[15px] font-bold text-[#1e293b]">Log Aktivitas Terbaru</h3>
            </div>
            <div class="space-y-4">
                <div class="flex justify-between items-start border-b border-gray-50 pb-4">
                    <p class="text-[12px] text-gray-600 font-medium">Sistem siap digunakan</p>
                    <span class="text-[11px] text-gray-400 whitespace-nowrap">Baru saja</span>
                </div>
            </div>
        </div>
    </div>

    <div id="modalTambah" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-sm w-full max-w-lg p-8 shadow-xl">
            <h3 class="text-lg font-bold mb-6 text-gray-800">Tambah Data Pengurus</h3>
            <form action="{{ route('pengurus.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Pengurus</label>
                    <input type="text" name="nama" required class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Jabatan</label>
                    <input type="text" name="jabatan" required placeholder="Contoh: Kepala Tata Usaha" class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Status</label>
                    <select name="status" required class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" rows="2" required class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"></textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Keterangan (Opsional)</label>
                    <textarea name="keterangan" rows="2" class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"></textarea>
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="toggleModal('modalTambah')" class="px-4 py-2 text-sm font-bold text-gray-400 uppercase hover:text-gray-600 transition-colors">Batal</button>
                    <button type="submit" class="bg-[#1c7b5b] text-white px-6 py-2 rounded-sm font-bold text-sm uppercase hover:bg-[#155d44] transition-colors shadow-sm">Simpan Data</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalEdit" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-sm w-full max-w-lg p-8 shadow-xl">
            <h3 class="text-lg font-bold mb-6 text-gray-800">Edit Data Pengurus</h3>
            <form id="formEdit" method="POST" class="flex flex-col gap-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Nama Pengurus</label>
                    <input type="text" name="nama" id="edit_nama" required class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Jabatan</label>
                    <input type="text" name="jabatan" id="edit_jabatan" required class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Status</label>
                    <select name="status" id="edit_status" required class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]">
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </select>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" id="edit_alamat" rows="2" required class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"></textarea>
                </div>
                <div>
                    <label class="block text-[11px] font-bold text-gray-500 uppercase mb-2">Keterangan (Opsional)</label>
                    <textarea name="keterangan" id="edit_keterangan" rows="2" class="w-full border border-gray-200 rounded-sm px-3 py-2 text-sm focus:outline-none focus:border-[#1c7b5b]"></textarea>
                </div>
                <div class="flex justify-end gap-3 mt-4">
                    <button type="button" onclick="toggleModal('modalEdit')" class="px-4 py-2 text-sm font-bold text-gray-400 uppercase hover:text-gray-600 transition-colors">Batal</button>
                    <button type="submit" class="bg-[#1c7b5b] text-white px-6 py-2 rounded-sm font-bold text-sm uppercase hover:bg-[#155d44] transition-colors shadow-sm">Update Data</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modalHapus" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
        <div class="bg-white p-8 rounded-sm max-w-sm w-full text-center shadow-xl">
            <div class="text-red-500 mb-4 flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18" /><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6" /><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2" /><line x1="10" y1="11" x2="10" y2="17" /><line x1="14" y1="11" x2="14" y2="17" /></svg>
            </div>
            <h3 class="font-bold text-lg mb-2 text-gray-800">Hapus Data Pengurus?</h3>
            <p class="text-gray-500 text-sm mb-6">Data ini akan dihapus secara permanen dari sistem.</p>
            <form id="formHapus" method="POST" class="flex justify-center gap-3">
                @csrf
                @method('DELETE')
                <button type="button" onclick="toggleModal('modalHapus')" class="px-5 py-2 font-bold text-gray-400 uppercase text-[13px] hover:text-gray-600 transition-colors">Batal</button>
                <button type="submit" class="bg-red-500 text-white px-6 py-2 rounded-sm font-bold uppercase text-[13px] hover:bg-red-600 transition-colors shadow-sm">Ya, Hapus</button>
            </form>
        </div>
    </div>

    <script>
        function toggleModal(id) {
            const modal = document.getElementById(id);
            modal.classList.toggle('hidden');
            modal.classList.toggle('flex');
        }

        function editPengurus(data) {
            const form = document.getElementById('formEdit');
            form.action = `/pengurus/${data.id}`;
            
            document.getElementById('edit_nama').value = data.nama;
            document.getElementById('edit_jabatan').value = data.jabatan;
            document.getElementById('edit_status').value = data.status;
            document.getElementById('edit_alamat').value = data.alamat;
            document.getElementById('edit_keterangan').value = data.keterangan || '';
            
            toggleModal('modalEdit');
        }

        function konfirmasiHapus(id) {
            const form = document.getElementById('formHapus');
            form.action = `/pengurus/${id}`;
            toggleModal('modalHapus');
        }
    </script>
@endsection