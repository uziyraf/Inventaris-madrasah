@extends(isset($role) && $role === 'admin' ? 'layouts.admin' : 'layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-900 mb-2">Akun Pengguna</h2>
            <p class="text-gray-500 text-sm">Kelola tingkat akses sistem dan peran institusional di seluruh departemen.</p>
        </div>
        <a href="{{ route('admin.users.create') }}" class="bg-[#1c7b5b] hover:bg-[#155d44] text-white px-4 py-2.5 rounded-sm font-medium text-sm flex items-center gap-2 shadow-sm transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><line x1="19" y1="8" x2="19" y2="14"/><line x1="22" y1="11" x2="16" y2="11"/></svg>
            Buat Pengguna Baru
        </a>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
        <!-- Stat 1 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">TOTAL PENGGUNA</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">1,284</h3>
            <div class="flex items-center gap-1 text-xs font-medium text-[#1c7b5b]">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="22 7 13.5 15.5 8.5 10.5 2 17"/><polyline points="16 7 22 7 22 13"/></svg>
                <span>+12% dari bulan lalu</span>
            </div>
        </div>

        <!-- Stat 2 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">ADMIN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="M12 8v4"/><path d="M12 16h.01"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">24</h3>
            <p class="text-xs font-medium text-gray-500">Pengendali global aktif</p>
        </div>

        <!-- Stat 3 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">GURU</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-gray-900 mb-2">342</h3>
            <p class="text-xs font-medium text-gray-500">98% Keterlibatan aktif</p>
        </div>

        <!-- Stat 4 -->
        <div class="bg-white p-6 rounded-sm shadow-sm border border-gray-100 relative border-t-2 border-t-red-500">
            <div class="flex justify-between items-start mb-4">
                <p class="text-xs font-bold text-gray-500 tracking-wider uppercase">DITANGGUHKAN</p>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"/></svg>
            </div>
            <h3 class="text-3xl font-bold text-red-500 mb-2">9</h3>
            <p class="text-[11px] font-bold text-red-500">Memerlukan peninjauan manual</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-sm shadow-sm border border-gray-200">
        <!-- Table Toolbar -->
        <div class="p-4 border-b border-gray-200 flex flex-wrap gap-4 justify-between items-center bg-white">
            <div class="flex gap-4 flex-1 max-w-2xl items-center">
                <!-- Select 1 -->
                <div class="relative w-48">
                    <select class="w-full appearance-none bg-white border border-gray-200 text-gray-700 py-2.5 pl-4 pr-10 rounded-sm text-sm focus:outline-none focus:border-[#1c7b5b] transition-colors">
                        <option>Semua Peran</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </div>
                </div>
                <!-- Select 2 -->
                <div class="relative w-48">
                    <select class="w-full appearance-none bg-white border border-gray-200 text-gray-700 py-2.5 pl-4 pr-10 rounded-sm text-sm focus:outline-none focus:border-[#1c7b5b] transition-colors">
                        <option>Status: Semua</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-500">
                        <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                    </div>
                </div>
                
                <button class="flex items-center gap-2 text-sm font-bold text-[#1c7b5b] hover:text-[#155d44] px-2 ml-2 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="4" y1="21" x2="4" y2="14"/><line x1="4" y1="10" x2="4" y2="3"/><line x1="12" y1="21" x2="12" y2="12"/><line x1="12" y1="8" x2="12" y2="3"/><line x1="20" y1="21" x2="20" y2="16"/><line x1="20" y1="12" x2="20" y2="3"/><line x1="1" y1="14" x2="7" y2="14"/><line x1="9" y1="8" x2="15" y2="8"/><line x1="17" y1="16" x2="23" y2="16"/></svg>
                    Filter Lanjutan
                </button>
            </div>
            
            <div class="flex gap-3">
                <button class="p-2.5 text-gray-500 hover:text-gray-700 bg-white border border-gray-200 rounded-sm hover:bg-gray-50 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                </button>
                <button class="p-2.5 text-gray-500 hover:text-gray-700 bg-white border border-gray-200 rounded-sm hover:bg-gray-50 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 6 2 18 2 18 9"/><path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2"/><rect x="6" y="14" width="12" height="8"/></svg>
                </button>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-xs text-gray-500 font-bold bg-gray-50/50 border-b border-gray-200 tracking-widest uppercase">
                    <tr>
                        <th scope="col" class="p-4 w-12 text-center">
                            <input type="checkbox" class="w-4 h-4 text-[#1c7b5b] bg-white border-gray-300 rounded focus:ring-0 cursor-pointer">
                        </th>
                        <th scope="col" class="px-6 py-4">NAMA</th>
                        <th scope="col" class="px-6 py-4">ALAMAT EMAIL</th>
                        <th scope="col" class="px-6 py-4">PERAN</th>
                        <th scope="col" class="px-6 py-4">STATUS</th>
                        <th scope="col" class="px-6 py-4 text-right">AKSI</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                    <!-- Row 1 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <input type="checkbox" class="w-4 h-4 text-[#1c7b5b] bg-white border-gray-300 rounded focus:ring-0 cursor-pointer">
                        </td>
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-sm tracking-wide">
                                JD
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Julianne De Leon</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 tracking-wide">ID: 2024-0019</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-medium">j.deleon@institution.edu</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#e8f5f1] text-[#1c7b5b] text-[10px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-wider">ADMIN</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <span class="font-bold text-gray-700 text-xs">Aktif</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
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
                    
                    <!-- Row 2 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <input type="checkbox" class="w-4 h-4 text-[#1c7b5b] bg-white border-gray-300 rounded focus:ring-0 cursor-pointer">
                        </td>
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#f0fdf4] text-green-600 flex items-center justify-center font-bold text-sm tracking-wide border border-green-100">
                                RM
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Robert Marshall</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 tracking-wide">ID: 2024-0482</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-medium">r.marshall@faculty.edu</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#f0fdf4] text-green-600 text-[10px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-wider">GURU</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <span class="font-bold text-gray-700 text-xs">Aktif</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-3">
                                <button class="text-gray-400 hover:text-gray-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></button>
                                <button class="text-gray-400 hover:text-red-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 3 -->
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="p-4 text-center">
                            <input type="checkbox" class="w-4 h-4 text-[#1c7b5b] bg-white border-gray-300 rounded focus:ring-0 cursor-pointer">
                        </td>
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-gray-100 text-gray-600 flex items-center justify-center font-bold text-sm tracking-wide">
                                SK
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Sarah Kovic</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 tracking-wide">ID: 2024-1120</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-medium">s.kovic@student.edu</td>
                        <td class="px-6 py-4">
                            <span class="bg-gray-100 text-gray-500 text-[10px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-wider">SISWA</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2 text-gray-400">
                                <div class="w-2 h-2 rounded-full bg-gray-300"></div>
                                <span class="font-bold text-xs">Tidak Aktif</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-3">
                                <button class="text-gray-400 hover:text-gray-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></button>
                                <button class="text-gray-400 hover:text-red-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                            </div>
                        </td>
                    </tr>

                    <!-- Row 4 -->
                    <tr class="hover:bg-gray-50 transition-colors border-b border-gray-100">
                        <td class="p-4 text-center">
                            <input type="checkbox" class="w-4 h-4 text-[#1c7b5b] bg-white border-gray-300 rounded focus:ring-0 cursor-pointer">
                        </td>
                        <td class="px-6 py-4 flex items-center gap-4">
                            <div class="w-10 h-10 rounded-full bg-[#e8f5f1] text-[#1c7b5b] flex items-center justify-center font-bold text-sm tracking-wide">
                                TC
                            </div>
                            <div>
                                <p class="font-bold text-gray-900 text-sm">Thomas Chen</p>
                                <p class="text-[11px] text-gray-400 font-medium mt-0.5 tracking-wide">ID: 2024-0084</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 text-gray-600 font-medium">t.chen@institution.edu</td>
                        <td class="px-6 py-4">
                            <span class="bg-[#e8f5f1] text-[#1c7b5b] text-[10px] font-bold px-2.5 py-1 rounded-sm uppercase tracking-wider">ADMIN</span>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-2">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <span class="font-bold text-gray-700 text-xs">Aktif</span>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-3">
                                <button class="text-gray-400 hover:text-gray-600 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg></button>
                                <button class="text-gray-400 hover:text-red-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"/><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/></svg></button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 flex items-center justify-between">
            <p class="text-[13px] text-gray-500 font-medium">Menampilkan <span class="font-bold text-gray-900">1-4</span> dari <span class="font-bold text-gray-900">1,284</span> pengguna</p>
            <div class="flex items-center gap-1">
                <button class="w-8 h-8 flex items-center justify-center rounded text-gray-400 hover:text-gray-600 transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"/></svg>
                </button>
                <button class="w-8 h-8 flex items-center justify-center rounded bg-[#1c7b5b] text-white font-bold text-[13px]">1</button>
                <button class="w-8 h-8 flex items-center justify-center rounded text-gray-600 hover:bg-gray-100 font-bold text-[13px] transition-colors">2</button>
                <button class="w-8 h-8 flex items-center justify-center rounded text-gray-600 hover:bg-gray-100 font-bold text-[13px] transition-colors">3</button>
                <span class="w-8 h-8 flex items-center justify-center text-gray-400 font-bold text-[13px]">...</span>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-100 font-bold text-[13px] transition-colors">321</button>
                <button class="w-8 h-8 flex items-center justify-center rounded border border-gray-200 text-gray-600 hover:bg-gray-100 transition-colors ml-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"/></svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6 pb-20">
        <!-- Security Audit Card -->
        <div class="bg-[#207e60] rounded-sm p-8 text-white relative overflow-hidden flex flex-col justify-between items-start h-full min-h-[200px]">
            <div class="relative z-10">
                <h3 class="text-xl font-bold mb-3">Audit Keamanan Diperlukan</h3>
                <p class="text-white/90 text-sm leading-relaxed max-w-[85%]">Ada 12 akun dengan kata sandi yang lebih tua dari 90 hari. Kami merekomendasikan untuk memulai reset kata sandi wajib untuk profil institusi ini.</p>
            </div>
            <button class="mt-6 bg-white text-[#207e60] font-bold px-4 py-2 rounded-sm text-[13px] transition-colors relative z-10 shadow-sm">
                Tinjau Kebijakan Keamanan
            </button>
            
            <!-- Shield Watermark -->
            <svg class="absolute -bottom-8 -right-8 w-48 h-48 text-white/10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
        </div>

        <!-- Automated Reports Card -->
        <div class="bg-[#111827] rounded-sm p-8 text-white flex justify-between items-center h-full min-h-[200px]">
            <div class="max-w-[70%]">
                <h3 class="text-xl font-bold mb-3">Laporan Otomatis</h3>
                <p class="text-gray-400 text-sm leading-relaxed">Laporan Aktivitas Pengguna mingguan siap untuk diunduh.</p>
            </div>
            <div class="flex gap-3">
                <button class="w-11 h-11 rounded-full border border-gray-600 hover:bg-gray-800 flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
                </button>
                <button class="w-11 h-11 rounded-full bg-white text-gray-900 hover:bg-gray-100 flex items-center justify-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                </button>
            </div>
        </div>
    </div>
@endsection
