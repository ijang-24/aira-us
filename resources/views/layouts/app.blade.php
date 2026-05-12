<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aira News - @yield('title', 'Premium News Portal')</title>
    
    <!-- Premium News Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,700;0,800;0,900;1,700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #FFFFFF;
            color: #1a1a1a;
        }
        .font-news-title { font-family: 'Playfair Display', serif; }
        
        /* News Specific */
        .headline-gradient {
            background: linear-gradient(0deg, rgba(0,0,0,0.9) 0%, rgba(0,0,0,0) 100%);
        }
        .nav-link {
            position: relative;
            transition: all 0.3s ease;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: #000;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="antialiased">
    <!-- Top Bar -->
    <div class="bg-gray-50 border-b border-gray-100 py-2 hidden md:block">
        <div class="container mx-auto px-6 flex justify-between items-center text-[10px] font-bold uppercase tracking-[0.2em] text-gray-500">
            <div>{{ now()->translatedFormat('l, d F Y') }}</div>
            <div class="flex gap-6">
                <a href="#" class="hover:text-black transition">Tentang Kami</a>
                <a href="#" class="hover:text-black transition">Redaksi</a>
                <a href="#" class="hover:text-black transition">Iklan</a>
            </div>
        </div>
    </div>

    <!-- Main Navigation -->
    <nav class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-gray-200 shadow-sm">
        <div class="container mx-auto px-6 py-5 flex items-center justify-between">
            <!-- Left: Menu Icon (Mobile) -->
            <button class="md:hidden p-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Center: Logo -->
            <a href="{{ route('index') }}" class="text-3xl font-black tracking-tighter font-news-title lg:absolute lg:left-1/2 lg:-translate-x-1/2">
                AIRA<span class="text-gray-400 font-normal italic">NEWS</span>
            </a>
            
            <!-- Right: Desktop Menu -->
            <div class="hidden md:flex items-center gap-8 text-[11px] font-black uppercase tracking-[0.15em] text-gray-600">
                <a href="{{ route('index') }}" class="nav-link text-black">Beranda</a>
                <a href="#" class="nav-link">Nasional</a>
                <a href="#" class="nav-link">Politik</a>
                <a href="#" class="nav-link">Ekonomi</a>
                <a href="#" class="nav-link">Gaya Hidup</a>
            </div>

            <!-- Search -->
            <div class="flex items-center gap-4">
                <button class="p-2 hover:bg-gray-100 rounded-full transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <main class="container mx-auto px-6 py-10 lg:pt-16">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-gray-100 mt-20 pt-20 pb-10">
        <div class="container mx-auto px-6">
            <div class="flex flex-col items-center text-center mb-16">
                <a href="{{ route('index') }}" class="text-4xl font-black font-news-title mb-6">
                    AIRA<span class="text-gray-400 font-normal italic">NEWS</span>
                </a>
                <p class="text-gray-400 max-w-lg leading-relaxed text-sm font-medium mb-10">Menyajikan informasi dengan integritas dan kedalaman. Kami percaya bahwa jurnalisme berkualitas adalah pondasi masyarakat yang cerdas.</p>
                <div class="flex gap-8 text-[10px] font-black uppercase tracking-widest text-gray-500">
                    <a href="#" class="hover:text-black transition">Privacy Policy</a>
                    <a href="#" class="hover:text-black transition">Terms of Service</a>
                    <a href="#" class="hover:text-black transition">Contact Us</a>
                </div>
            </div>
            <div class="border-t border-gray-50 pt-10 text-center">
                <p class="text-[10px] text-gray-300 font-bold tracking-[0.3em] uppercase">&copy; {{ date('Y') }} AIRA NEWS PORTAL. ALL RIGHTS RESERVED.</p>
            </div>
        </div>
    </footer>
</body>
</html>
