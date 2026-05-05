<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-[#f8fafc]">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajer Inventaris</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="h-full antialiased text-gray-800 bg-[#f8fafc]">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen overflow-hidden">

        <!-- Sidebar -->
        <aside
            class="w-[280px] bg-white border-r border-gray-200 flex flex-col transition-all duration-300 z-20 shrink-0">
            <!-- Sidebar Header -->
            <div class="pt-8 pb-6 px-8 flex items-center gap-3">
                <div class="w-8 h-8 bg-[#207e60] rounded-sm flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="4" y="2" width="16" height="20" rx="2" ry="2" />
                        <path d="M9 22v-4h6v4" />
                        <path d="M8 6h.01" />
                        <path d="M16 6h.01" />
                        <path d="M12 6h.01" />
                        <path d="M12 10h.01" />
                        <path d="M12 14h.01" />
                        <path d="M16 10h.01" />
                        <path d="M16 14h.01" />
                        <path d="M8 10h.01" />
                        <path d="M8 14h.01" />
                    </svg>
                </div>
                <div>
                    <h1 class="text-[17px] font-extrabold text-[#1e293b] tracking-tight leading-none">Manajer Inventaris
                    </h1>
                    <p class="text-[11px] font-medium text-gray-400 mt-1">Portal Institusi</p>
                </div>
            </div>

            <!-- Sidebar Navigation -->
            <div class="flex-1 overflow-hidden py-2 flex flex-col justify-between">
                <nav>
                    <!-- Dasbor -->
                    <a href="{{ route('admin.dashboard') }}"
                        class="flex items-center gap-4 px-8 py-2.5 transition-colors {{ request()->routeIs('admin.dashboard') ? 'bg-[#f0fbf7] text-[#1c7b5b] font-bold border-r-[3px] border-[#1c7b5b]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ request()->routeIs('admin.dashboard') ? '' : 'text-slate-500' }}">
                            <rect width="7" height="9" x="3" y="3" rx="1" />
                            <rect width="7" height="5" x="14" y="3" rx="1" />
                            <rect width="7" height="9" x="14" y="12" rx="1" />
                            <rect width="7" height="5" x="3" y="16" rx="1" />
                        </svg>
                        Dasbor
                    </a>

                    <!-- Lembaga -->
                    <a href="{{ route('admin.lembaga') }}"
                        class="flex items-center gap-4 px-8 py-2.5 transition-colors {{ request()->routeIs('admin.lembaga') ? 'bg-[#f0fbf7] text-[#1c7b5b] font-bold border-r-[3px] border-[#1c7b5b]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ request()->routeIs('admin.lembaga') ? '' : 'text-slate-500' }}">
                            <rect x="4" y="2" width="16" height="20" rx="2" ry="2" />
                            <path d="M9 22v-4h6v4" />
                            <path d="M8 6h.01" />
                            <path d="M16 6h.01" />
                            <path d="M12 6h.01" />
                            <path d="M12 10h.01" />
                            <path d="M12 14h.01" />
                            <path d="M16 10h.01" />
                            <path d="M16 14h.01" />
                            <path d="M8 10h.01" />
                            <path d="M8 14h.01" />
                        </svg>
                        Lembaga
                    </a>

                    <!-- Guru -->
                    <a href="{{ route('admin.guru') }}"
                        class="flex items-center gap-4 px-8 py-2.5 transition-colors {{ request()->routeIs('admin.guru') ? 'bg-[#f0fbf7] text-[#1c7b5b] font-bold border-r-[3px] border-[#1c7b5b]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ request()->routeIs('admin.guru') ? '' : 'text-slate-500' }}">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z" />
                            <path d="M6 12v5c3 3 9 3 12 0v-5" />
                        </svg>
                        Guru
                    </a>

                    <!-- Murid -->
                    <a href="{{ route('admin.murid') }}"
                        class="flex items-center gap-4 px-8 py-2.5 transition-colors {{ request()->routeIs('admin.murid') ? 'bg-[#f0fbf7] text-[#1c7b5b] font-bold border-r-[3px] border-[#1c7b5b]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ request()->routeIs('admin.murid') ? '' : 'text-slate-500' }}">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        Murid
                    </a>

                    <!-- Pengurus -->
                    <a href="{{ route('admin.pengurus') }}"
                        class="flex items-center gap-4 px-8 py-2.5 transition-colors {{ request()->routeIs('admin.pengurus') ? 'bg-[#f0fbf7] text-[#1c7b5b] font-bold border-r-[3px] border-[#1c7b5b]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ request()->routeIs('admin.pengurus') ? '' : 'text-slate-500' }}">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg>
                        Pengurus
                    </a>

                    <!-- Inventaris -->
                    <a href="{{ route('admin.inventaris') }}"
                        class="flex items-center gap-4 px-8 py-2.5 transition-colors {{ request()->routeIs('admin.inventaris') ? 'bg-[#f0fbf7] text-[#1c7b5b] font-bold border-r-[3px] border-[#1c7b5b]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ request()->routeIs('admin.inventaris') ? '' : 'text-slate-500' }}">
                            <rect x="2" y="7" width="20" height="14" rx="2" ry="2" />
                            <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                        </svg>
                        Inventaris
                    </a>

                    <!-- Manajemen Pengguna -->
                    <a href="{{ route('admin.users') }}"
                        class="flex items-center gap-4 px-8 py-2.5 transition-colors {{ request()->routeIs('admin.users') ? 'bg-[#f0fbf7] text-[#1c7b5b] font-bold border-r-[3px] border-[#1c7b5b]' : 'text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium' }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="{{ request()->routeIs('admin.users') ? '' : 'text-slate-500' }}">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <line x1="19" y1="8" x2="19" y2="14" />
                            <line x1="22" y1="11" x2="16" y2="11" />
                        </svg>
                        <span class="flex flex-col leading-tight">
                            Manajemen<br>Pengguna
                        </span>
                    </a>
                </nav>

                <!-- Bottom Links -->
                <div class="pb-8 mt-12">
                    <a href="#"
                        class="flex items-center gap-4 px-8 py-2.5 text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="text-slate-500">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                            <line x1="12" y1="17" x2="12.01" y2="17" />
                        </svg>
                        Bantuan
                    </a>
                    <a href="#"
                        class="flex items-center gap-4 px-8 py-2.5 text-slate-600 hover:bg-slate-50 hover:text-slate-900 font-medium transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="text-slate-500">
                            <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                            <polyline points="16 17 21 12 16 7" />
                            <line x1="21" y1="12" x2="9" y2="12" />
                        </svg>
                        Keluar
                    </a>
                </div>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 flex flex-col min-w-0 overflow-hidden bg-[#f4f7f6]">
            <!-- Topbar -->
            <header
                class="h-16 flex items-center justify-between px-8 bg-white border-b border-gray-200 z-10 sticky top-0 shrink-0">
                <!-- Search -->
                <div class="flex-1 flex">
                    <div class="relative w-full max-w-md">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8" />
                                <line x1="21" y1="21" x2="16.65" y2="16.65" />
                            </svg>
                        </div>
                        <input type="text"
                            class="block w-full pl-10 pr-3 py-2 border-0 bg-[#f8fafc] rounded-md text-gray-900 placeholder-gray-400 focus:ring-0 sm:text-[13px]"
                            placeholder="Cari pengurus berdasarkan nama atau peran...">
                    </div>
                </div>

                <div class="flex items-center gap-6">
                    <div class="flex items-center gap-4 text-gray-500">
                        <!-- Notifications -->
                        <button class="relative hover:text-gray-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9" />
                                <path d="M13.73 21a2 2 0 0 1-3.46 0" />
                            </svg>
                            <span
                                class="absolute top-0 right-0 block h-1.5 w-1.5 rounded-full bg-red-500 ring-2 ring-white"></span>
                        </button>
                        <!-- Settings -->
                        <button class="hover:text-gray-700 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <circle cx="12" cy="12" r="3" />
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z" />
                            </svg>
                        </button>
                    </div>

                    <div class="h-6 w-px bg-gray-200"></div>

                    <!-- Profile -->
                    <div class="flex items-center gap-3">
                        <div class="text-right">
                            <p class="text-[13px] font-bold text-[#1e293b] leading-none">Admin Alpha</p>
                            <p class="text-[10px] font-bold text-gray-400 mt-1 tracking-wide">Super Admin</p>
                        </div>
                        <img src="https://ui-avatars.com/api/?name=Admin+Alpha&background=1e293b&color=fff" alt="Admin"
                            class="w-9 h-9 rounded-full border border-gray-200">
                    </div>
                </div>
            </header>

            <!-- Main Scrollable Area -->
            <div class="flex-1 overflow-y-auto p-8 relative">
                <div class="max-w-[1200px] mx-auto min-h-full flex flex-col">
                    <div class="flex-1">
                        @yield('content')
                    </div>

                    <!-- Footer -->
                    <div
                        class="mt-8 pt-6 flex justify-between items-center text-[10px] font-bold text-gray-400 tracking-wider uppercase pb-4">
                        <p>© 2024 SISTEM INVENTARIS V2.4.1. HAK CIPTA DILINDUNGI UNDANG-UNDANG.</p>
                        <div class="flex gap-6">
                            <a href="#" class="hover:text-gray-600 transition-colors">SYARAT & KETENTUAN</a>
                            <a href="#" class="hover:text-gray-600 transition-colors">KEBIJAKAN PRIVASI</a>
                            <a href="#" class="hover:text-gray-600 transition-colors">PUSAT BANTUAN</a>
                        </div>
                    </div>
                </div>

                <!-- Floating Action Button -->
                <button
                    class="fixed bottom-8 right-8 w-14 h-14 bg-[#1c7b5b] hover:bg-[#155d44] text-white rounded-xl shadow-lg flex items-center justify-center transition-colors z-50">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                </button>
            </div>
        </main>
    </div>
</body>

</html>