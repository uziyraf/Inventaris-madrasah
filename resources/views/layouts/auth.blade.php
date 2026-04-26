<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-white">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Manajer Inventaris - @yield('title', 'Otentikasi')</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="h-screen overflow-hidden antialiased text-gray-800 bg-white">
    <div class="flex h-screen">
        <!-- Left Side: Form -->
        <div class="w-full lg:w-1/2 flex flex-col relative bg-white">
            
            <!-- Logo Top -->
            <div class="pt-8 pb-4 px-8 sm:px-16 md:px-24 xl:px-32 flex-shrink-0 flex items-center gap-3">
                <div class="w-8 h-8 bg-[#207e60] rounded-sm flex items-center justify-center flex-shrink-0 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2" ry="2"/><path d="M9 22v-4h6v4"/><path d="M8 6h.01"/><path d="M16 6h.01"/><path d="M12 6h.01"/><path d="M12 10h.01"/><path d="M12 14h.01"/><path d="M16 10h.01"/><path d="M16 14h.01"/><path d="M8 10h.01"/><path d="M8 14h.01"/></svg>
                </div>
                <div>
                    <h1 class="text-[17px] font-extrabold text-[#1e293b] tracking-tight leading-none">Manajer Inventaris</h1>
                    <p class="text-[11px] font-medium text-gray-400 mt-1">Portal Institusi</p>
                </div>
            </div>

            <!-- Content -->
            <div class="flex-1 flex flex-col justify-center px-8 sm:px-16 md:px-24 xl:px-32 py-4">
                <div class="w-full max-w-md mx-auto">
                    @yield('content')
                </div>
            </div>
            
            <!-- Footer text -->
            <div class="pt-4 pb-8 px-8 sm:px-16 md:px-24 xl:px-32 flex-shrink-0 text-[11px] text-gray-400 font-medium">
                &copy; {{ date('Y') }} Sistem Inventaris Madrasah. All rights reserved.
            </div>
        </div>

        <!-- Right Side: Graphic/Image -->
        <div class="hidden lg:flex lg:w-1/2 bg-[#1c7b5b] relative overflow-hidden items-center justify-center">
            <!-- Background Patterns -->
            <div class="absolute inset-0 opacity-10">
                <svg width="100%" height="100%" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse">
                            <path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/>
                        </pattern>
                    </defs>
                    <rect width="100%" height="100%" fill="url(#grid)" />
                </svg>
            </div>
            
            <!-- Large Floating Circles -->
            <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-white opacity-5 blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-80 h-80 rounded-full bg-[#38a169] opacity-20 blur-3xl"></div>

            <!-- Content Card inside Right Side -->
            <div class="relative z-10 max-w-md text-center px-8">
                <div class="mb-8 inline-block">
                    <div class="w-20 h-20 bg-white/10 backdrop-blur-sm rounded-2xl flex items-center justify-center mx-auto border border-white/20 shadow-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/><path d="m9 12 2 2 4-4"/></svg>
                    </div>
                </div>
                <h2 class="text-3xl font-extrabold text-white tracking-tight mb-4 leading-tight">
                    Manajemen Aset yang Lebih Pintar & Terpusat
                </h2>
                <p class="text-[15px] text-[#bce3d2] leading-relaxed mb-10">
                    Sistem terintegrasi untuk melacak, mengelola, dan mengaudit semua inventaris institusi dari satu tempat dengan efisien.
                </p>
                
                <div class="flex items-center justify-center gap-2 text-white/50">
                    <div class="w-10 h-1 rounded-full bg-white"></div>
                    <div class="w-2 h-1 rounded-full bg-white/30"></div>
                    <div class="w-2 h-1 rounded-full bg-white/30"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
