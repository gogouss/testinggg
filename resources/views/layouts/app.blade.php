<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? config('app.name', 'Steam') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1b2838] text-[#c7d5e0] min-h-screen font-sans">
    <!-- Header -->
    <header class="bg-[#171a21]">
        <div class="max-w-[940px] mx-auto px-4">
            <nav class="flex items-center h-[104px]">
                <a href="{{ route('home') }}" class="mr-10">
                    <img src="https://store.akamai.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" alt="Steam" class="h-[44px]">
                </a>
                <ul class="flex items-center gap-6 text-[14px]">
                    <li><a href="{{ route('home') }}" class="hover:text-white">STORE</a></li>
                    <li><a href="#" class="hover:text-white">COMMUNITY</a></li>
                    <li><a href="#" class="hover:text-white">ABOUT</a></li>
                    <li><a href="#" class="hover:text-white">SUPPORT</a></li>
                </ul>
                <div class="ml-auto flex items-center gap-3 text-[11px]">
                    <a href="#" class="bg-[#5c7e10] hover:bg-[#7ea64b] px-2 py-1 text-white flex items-center gap-1">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                        Install Steam
                    </a>
                    <a href="#" class="hover:text-white">login</a>
                    <span class="text-[#616a72]">|</span>
                    <a href="#" class="hover:text-white">language</a>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-[#171a21] mt-16 py-8">
        <div class="max-w-[940px] mx-auto px-4 text-[12px] text-[#8f98a0]">
            <div class="border-t border-[#363c44] pt-6">
                <div class="flex gap-4">
                    <img src="https://store.akamai.steamstatic.com/public/images/footerLogo_valve_new.png" alt="Valve" class="h-[25px]">
                    <div>
                        <p>© 2025 Valve Corporation. All rights reserved. All trademarks are property of their respective owners in the US and other countries.</p>
                        <p class="mt-1">VAT included in all prices where applicable.</p>
                    </div>
                </div>
                <div class="flex gap-4 mt-4 text-[#c6d4df]">
                    <a href="#" class="hover:text-white">About Valve</a>
                    <span>|</span>
                    <a href="#" class="hover:text-white">Steamworks</a>
                    <span>|</span>
                    <a href="#" class="hover:text-white">Jobs</a>
                    <span>|</span>
                    <a href="#" class="hover:text-white">Steam Distribution</a>
                    <span>|</span>
                    <a href="#" class="hover:text-white">Support</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
