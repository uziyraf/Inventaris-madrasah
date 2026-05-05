@extends(isset($role) && $role === 'admin' ? 'layouts.admin' : 'layouts.app')

@section('content')
<div x-data="{ 
    modalOpen: false, 
    selectedClass: '',
    selectedData: { l: 0, p: 0, total: 0 },
    students: [],
    
    openModal(className, l, p, total) {
        this.selectedClass = className;
        this.selectedData = { l, p, total };
        // Generate dummy students based on total
        this.students = Array.from({ length: total }, (_, i) => ({
            name: 'Siswa ' + (i + 1),
            gender: i < l ? 'L' : 'P',
            nis: '10' + Math.floor(Math.random() * 1000).toString().padStart(3, '0')
        }));
        this.modalOpen = true;
    }
}">
    <!-- Breadcrumbs -->
    <div class="flex items-center gap-2 text-[10px] font-bold text-gray-500 tracking-widest uppercase mb-4">
        <span class="text-gray-400">PORTAL UTAMA</span>
        <span class="text-gray-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
        </span>
        <span class="text-[#1c7b5b]">DATA KELAS</span>
    </div>

    <!-- Page Header -->
    <div class="flex justify-between items-start mb-8">
        <div>
            <h2 class="text-[28px] font-bold text-[#1e293b] mb-1.5 tracking-tight">Data Kelas</h2>
            <p class="text-gray-500 text-[14px]">Informasi jumlah siswa per kelas berdasarkan jenis kelamin.</p>
        </div>
        <div class="flex gap-3">
            <button class="bg-white border border-gray-200 text-[#1e293b] hover:bg-gray-50 px-5 py-2.5 rounded-sm font-semibold text-[13px] flex items-center gap-2 shadow-sm transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
                Ekspor Data
            </button>
        </div>
    </div>

    <!-- Summary Card -->
    <div class="bg-gradient-to-br from-[#207e60] to-[#155d44] rounded-sm shadow-sm p-8 mb-8 text-white flex flex-col md:flex-row justify-between items-center gap-8 relative overflow-hidden">
        <div class="absolute -right-4 -top-12 text-white/5 transform rotate-12">
            <svg xmlns="http://www.w3.org/2000/svg" width="240" height="240" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
        </div>
        <div class="relative z-10">
            <p class="text-[12px] font-bold tracking-widest uppercase text-white/80 mb-2">TOTAL KESELURUHAN SISWA</p>
            <div class="flex items-baseline gap-3">
                <h3 class="text-[48px] font-extrabold leading-none tracking-tight">77</h3>
                <span class="text-[16px] font-medium text-white/80 uppercase tracking-widest">Siswa</span>
            </div>
        </div>
        <div class="relative z-10 flex gap-4 w-full md:w-auto">
            <div class="flex-1 md:flex-none bg-white/10 rounded-sm p-5 backdrop-blur-md border border-white/20 min-w-[140px]">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-6 h-6 rounded-sm bg-blue-400/20 flex items-center justify-center text-blue-100">
                        <span class="font-bold text-[10px]">L</span>
                    </div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-white/90">LAKI-LAKI</p>
                </div>
                <p class="text-[32px] font-bold leading-none">77</p>
            </div>
            <div class="flex-1 md:flex-none bg-white/10 rounded-sm p-5 backdrop-blur-md border border-white/20 min-w-[140px]">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-6 h-6 rounded-sm bg-pink-400/20 flex items-center justify-center text-pink-100">
                        <span class="font-bold text-[10px]">P</span>
                    </div>
                    <p class="text-[11px] font-bold tracking-widest uppercase text-white/90">PEREMPUAN</p>
                </div>
                <p class="text-[32px] font-bold leading-none">0</p>
            </div>
        </div>
    </div>

    <!-- Section Title -->
    <div class="mb-6">
        <h3 class="text-[16px] font-bold text-[#1e293b] flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#1c7b5b" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="3" y1="9" x2="21" y2="9"/><line x1="9" y1="21" x2="9" y2="9"/></svg>
            Rincian per Kelas
        </h3>
    </div>

    <!-- Cards Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
        
        <!-- Kelas I -->
        <div @click="openModal('Kelas I', 26, 0, 26)" class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden hover:border-[#1c7b5b] transition-all hover:shadow-md group cursor-pointer">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center group-hover:bg-[#f0fbf7]/50 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-sm bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[13px]">
                        I
                    </div>
                    <h3 class="text-[16px] font-bold text-[#1e293b]">Kelas I</h3>
                </div>
                <span class="bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm border border-[#1c7b5b]/10">26 Siswa</span>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100 border-dashed">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100">
                            <span class="font-bold text-[11px]">L</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Laki-laki</span>
                    </div>
                    <span class="text-[18px] font-bold text-blue-600">26</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 border border-pink-100">
                            <span class="font-bold text-[11px]">P</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Perempuan</span>
                    </div>
                    <span class="text-[18px] font-bold text-gray-400">0</span>
                </div>
            </div>
        </div>

        <!-- Kelas II -->
        <div @click="openModal('Kelas II', 12, 0, 12)" class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden hover:border-[#1c7b5b] transition-all hover:shadow-md group cursor-pointer">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center group-hover:bg-[#f0fbf7]/50 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-sm bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[13px]">
                        II
                    </div>
                    <h3 class="text-[16px] font-bold text-[#1e293b]">Kelas II</h3>
                </div>
                <span class="bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm border border-[#1c7b5b]/10">12 Siswa</span>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100 border-dashed">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100">
                            <span class="font-bold text-[11px]">L</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Laki-laki</span>
                    </div>
                    <span class="text-[18px] font-bold text-blue-600">12</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 border border-pink-100">
                            <span class="font-bold text-[11px]">P</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Perempuan</span>
                    </div>
                    <span class="text-[18px] font-bold text-gray-400">0</span>
                </div>
            </div>
        </div>

        <!-- Kelas III -->
        <div @click="openModal('Kelas III', 11, 0, 11)" class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden hover:border-[#1c7b5b] transition-all hover:shadow-md group cursor-pointer">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center group-hover:bg-[#f0fbf7]/50 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-sm bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[13px]">
                        III
                    </div>
                    <h3 class="text-[16px] font-bold text-[#1e293b]">Kelas III</h3>
                </div>
                <span class="bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm border border-[#1c7b5b]/10">11 Siswa</span>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100 border-dashed">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100">
                            <span class="font-bold text-[11px]">L</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Laki-laki</span>
                    </div>
                    <span class="text-[18px] font-bold text-blue-600">11</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 border border-pink-100">
                            <span class="font-bold text-[11px]">P</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Perempuan</span>
                    </div>
                    <span class="text-[18px] font-bold text-gray-400">0</span>
                </div>
            </div>
        </div>

        <!-- Kelas IV -->
        <div @click="openModal('Kelas IV', 16, 0, 16)" class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden hover:border-[#1c7b5b] transition-all hover:shadow-md group cursor-pointer">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center group-hover:bg-[#f0fbf7]/50 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-sm bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[13px]">
                        IV
                    </div>
                    <h3 class="text-[16px] font-bold text-[#1e293b]">Kelas IV</h3>
                </div>
                <span class="bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm border border-[#1c7b5b]/10">16 Siswa</span>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100 border-dashed">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100">
                            <span class="font-bold text-[11px]">L</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Laki-laki</span>
                    </div>
                    <span class="text-[18px] font-bold text-blue-600">16</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 border border-pink-100">
                            <span class="font-bold text-[11px]">P</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Perempuan</span>
                    </div>
                    <span class="text-[18px] font-bold text-gray-400">0</span>
                </div>
            </div>
        </div>

        <!-- Kelas V -->
        <div @click="openModal('Kelas V', 9, 0, 9)" class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden hover:border-[#1c7b5b] transition-all hover:shadow-md group cursor-pointer">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center group-hover:bg-[#f0fbf7]/50 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-sm bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[13px]">
                        V
                    </div>
                    <h3 class="text-[16px] font-bold text-[#1e293b]">Kelas V</h3>
                </div>
                <span class="bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm border border-[#1c7b5b]/10">9 Siswa</span>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100 border-dashed">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100">
                            <span class="font-bold text-[11px]">L</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Laki-laki</span>
                    </div>
                    <span class="text-[18px] font-bold text-blue-600">9</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 border border-pink-100">
                            <span class="font-bold text-[11px]">P</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Perempuan</span>
                    </div>
                    <span class="text-[18px] font-bold text-gray-400">0</span>
                </div>
            </div>
        </div>

        <!-- Kelas VI -->
        <div @click="openModal('Kelas VI', 3, 0, 3)" class="bg-white rounded-sm shadow-sm border border-gray-200 overflow-hidden hover:border-[#1c7b5b] transition-all hover:shadow-md group cursor-pointer">
            <div class="p-5 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center group-hover:bg-[#f0fbf7]/50 transition-colors">
                <div class="flex items-center gap-3">
                    <div class="w-8 h-8 rounded-sm bg-[#1c7b5b] text-white flex items-center justify-center font-bold text-[13px]">
                        VI
                    </div>
                    <h3 class="text-[16px] font-bold text-[#1e293b]">Kelas VI</h3>
                </div>
                <span class="bg-[#e2f5ec] text-[#1c7b5b] text-[11px] font-bold px-2.5 py-1 rounded-sm border border-[#1c7b5b]/10">3 Siswa</span>
            </div>
            <div class="p-6">
                <div class="flex justify-between items-center mb-4 pb-4 border-b border-gray-100 border-dashed">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-blue-50 flex items-center justify-center text-blue-600 border border-blue-100">
                            <span class="font-bold text-[11px]">L</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Laki-laki</span>
                    </div>
                    <span class="text-[18px] font-bold text-blue-600">3</span>
                </div>
                <div class="flex justify-between items-center">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-full bg-pink-50 flex items-center justify-center text-pink-500 border border-pink-100">
                            <span class="font-bold text-[11px]">P</span>
                        </div>
                        <span class="text-[13px] font-bold text-gray-600 uppercase tracking-wider">Perempuan</span>
                    </div>
                    <span class="text-[18px] font-bold text-gray-400">0</span>
                </div>
            </div>
        </div>
        
    </div>

    <!-- Modal Popup -->
    <div x-show="modalOpen" class="fixed inset-0 z-[100] flex items-center justify-center" style="display: none;">
        <!-- Backdrop -->
        <div x-show="modalOpen" x-transition.opacity class="absolute inset-0 bg-slate-900/40 backdrop-blur-sm" @click="modalOpen = false"></div>
        
        <!-- Modal Box -->
        <div x-show="modalOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 translate-y-4 scale-95"
             x-transition:enter-end="opacity-100 translate-y-0 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 translate-y-0 scale-100"
             x-transition:leave-end="opacity-0 translate-y-4 scale-95"
             class="relative w-full max-w-2xl bg-white rounded-md shadow-2xl overflow-hidden m-4 flex flex-col max-h-[85vh]">
            
            <!-- Modal Header -->
            <div class="px-6 py-4 border-b border-gray-100 flex justify-between items-center bg-gray-50/50 shrink-0">
                <div>
                    <h3 class="text-[18px] font-bold text-[#1e293b]" x-text="'Detail Data ' + selectedClass"></h3>
                    <p class="text-[12px] text-gray-500 mt-0.5" x-text="`Daftar ${selectedData.total} siswa yang terdaftar pada kelas ini`"></p>
                </div>
                <button @click="modalOpen = false" class="text-gray-400 hover:text-red-500 transition-colors p-2 rounded-full hover:bg-red-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                </button>
            </div>

            <!-- Modal Body (Scrollable Table) -->
            <div class="overflow-y-auto flex-1 p-0">
                <table class="w-full text-left text-sm text-gray-600">
                    <thead class="text-[11px] text-gray-500 font-bold tracking-widest uppercase border-b border-gray-100 bg-white sticky top-0 z-10 shadow-sm">
                        <tr>
                            <th scope="col" class="px-6 py-4 w-16">NO</th>
                            <th scope="col" class="px-6 py-4">NAMA LENGKAP</th>
                            <th scope="col" class="px-6 py-4">NIS</th>
                            <th scope="col" class="px-6 py-4">L/P</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 bg-white">
                        <template x-for="(student, index) in students" :key="index">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-3 font-medium text-gray-500" x-text="index + 1"></td>
                                <td class="px-6 py-3">
                                    <p class="font-bold text-[#1e293b] text-[13px]" x-text="student.name"></p>
                                </td>
                                <td class="px-6 py-3 font-mono text-[12px] text-gray-500" x-text="student.nis"></td>
                                <td class="px-6 py-3">
                                    <span x-show="student.gender === 'L'" class="inline-flex items-center justify-center w-6 h-6 rounded-sm bg-blue-50 text-blue-600 text-[10px] font-bold">L</span>
                                    <span x-show="student.gender === 'P'" class="inline-flex items-center justify-center w-6 h-6 rounded-sm bg-pink-50 text-pink-500 text-[10px] font-bold">P</span>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Modal Footer -->
            <div class="px-6 py-4 border-t border-gray-100 bg-gray-50/50 flex justify-end shrink-0">
                <button @click="modalOpen = false" class="px-5 py-2.5 text-[13px] font-bold text-gray-600 hover:text-gray-900 bg-white border border-gray-200 hover:bg-gray-50 rounded-sm transition-colors">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection
