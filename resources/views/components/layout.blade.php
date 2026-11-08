@props(['title' => config('app.name', 'Steam')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#1b2838] text-[#c7d5e0] min-h-screen font-sans">
    <!-- Header -->
    <header class="bg-[#171a21]">
        <div class="max-w-[1280px] mx-auto px-4">
            <nav class="flex items-center h-[104px]">
                <a href="{{ route('home') }}" class="mr-10 shrink-0" aria-label="Steam">
                    <img src="https://store.akamai.steamstatic.com/public/shared/images/header/logo_steam.svg?t=962016" alt="Steam" class="h-[44px]">
                </a>
                <ul class="flex items-center gap-6 text-[14px] uppercase whitespace-nowrap">
                    <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-white' : '' }} hover:text-white transition-colors">{{ __('STORE') }}</a></li>
                    <li><a href="https://steamcommunity.com/" class="hover:text-white transition-colors">{{ __('COMMUNITY') }}</a></li>
                    <li><a href="https://store.steampowered.com/about/" class="hover:text-white transition-colors">{{ __('ABOUT') }}</a></li>
                    <li><a href="https://help.steampowered.com/" class="hover:text-white transition-colors">{{ __('SUPPORT') }}</a></li>
                </ul>
                <div class="ml-auto flex items-center gap-3 text-[11px] whitespace-nowrap">
                    <a href="https://store.steampowered.com/about/" class="bg-[#5c7e10] hover:bg-[#7ea64b] px-2 py-1 text-white flex items-center gap-1 transition-colors">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path></svg>
                        {{ __('Install Steam') }}
                    </a>

                    @auth
                    <div class="relative" data-menu>
                        <button type="button" data-menu-toggle aria-haspopup="true" aria-expanded="false" class="flex items-center gap-1 text-[#b8b6b4] hover:text-white transition-colors">
                            <span class="w-5 h-5 flex items-center justify-center bg-gradient-to-b from-[#67c1f5] to-[#417a9b] text-[#0e1c25] font-bold uppercase">{{ mb_substr(auth()->user()->name, 0, 1) }}</span>
                            {{ auth()->user()->name }}
                            <svg class="w-2.5 h-2.5" viewBox="0 0 20 20" fill="currentColor"><path d="M5 7.5 10 13l5-5.5H5Z"/></svg>
                        </button>
                        <div data-menu-panel class="hidden absolute right-0 top-full mt-2 w-[190px] bg-[#171a21] border border-[#2a475e] shadow-2xl py-1 z-50">
                            <a href="{{ route('home') }}" class="block px-3 py-1.5 text-[12px] text-[#b8b6b4] hover:text-white hover:bg-[#2a475e]">{{ __('Store') }}</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full text-left px-3 py-1.5 text-[12px] text-[#b8b6b4] hover:text-white hover:bg-[#2a475e]">{{ __('Sign out') }}</button>
                            </form>
                        </div>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="hover:text-white transition-colors">{{ __('login') }}</a>
                    @endauth

                    <span class="text-[#616a72]">|</span>

                    <div class="relative" data-menu>
                        <button type="button" data-menu-toggle aria-haspopup="true" aria-expanded="false" class="flex items-center gap-1 hover:text-white transition-colors">
                            <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path d="M10 1a9 9 0 100 18 9 9 0 000-18Zm6.9 6h-2.6a13.4 13.4 0 00-1.2-3.5A7.5 7.5 0 0116.9 7ZM10 2.6c.7 1 1.3 2.3 1.7 4.4H8.3c.4-2.1 1-3.4 1.7-4.4ZM6 7H3.1a7.5 7.5 0 013.8-3.5A13.4 13.4 0 005.7 7Zm0 2H2.6a7.6 7.6 0 000 2H6a15 15 0 010-2Zm.2 4H3.1a7.5 7.5 0 003.8 3.5A13.4 13.4 0 016.2 13Zm2.1 0h3.4c-.4 2.1-1 3.4-1.7 4.4-.7-1-1.3-2.3-1.7-4.4Zm1.7-2c-.5 0-1.5-1.9-1.5-2h3c0 .1-1 2-1.5 2Zm2.1-4.5A13.4 13.4 0 0112.2 7h2.1a7.5 7.5 0 00-3.8-3.5ZM14 9h3.4a7.6 7.6 0 010 2H14a15 15 0 000-2Zm-.7 4h2.6a7.5 7.5 0 01-3.8 3.5 13.4 13.4 0 001.2-3.5Z"/></svg>
                            {{ __('language') }}
                            <svg class="w-2.5 h-2.5" viewBox="0 0 20 20" fill="currentColor"><path d="M5 7.5 10 13l5-5.5H5Z"/></svg>
                        </button>
                        <div data-menu-panel class="hidden absolute right-0 top-full mt-2 w-[210px] bg-[#171a21] border border-[#2a475e] shadow-2xl py-1 z-50">
                            @foreach(config('languages', []) as $code => $label)
                            <a href="{{ route('language.switch', $code) }}" class="flex items-center justify-between px-3 py-1.5 text-[12px] hover:bg-[#2a475e] {{ app()->getLocale() === $code ? 'text-white bg-[#2a475e]' : 'text-[#b8b6b4]' }}">
                                <span>{{ $label }}</span>
                                @if(app()->getLocale() === $code)
                                <svg class="w-3 h-3 text-[#67c1f5]" viewBox="0 0 20 20" fill="currentColor"><path d="m4.5 10.5 3 3 8-8-1.4-1.4-6.6 6.6-1.6-1.6-1.4 1.4Z"/></svg>
                                @endif
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-[#171a21] mt-16 py-8">
        <div class="max-w-[1280px] mx-auto px-4 text-[12px] text-[#8f98a0]">
            <div class="border-t border-[#363c44] pt-6">
                <div class="flex gap-4">
                    <img src="https://store.akamai.steamstatic.com/public/images/footerLogo_valve_new.png" alt="Valve" class="h-[25px]">
                    <div>
                        <p>© 2025 Valve Corporation. All rights reserved. All trademarks are property of their respective owners in the US and other countries.</p>
                        <p class="mt-1">{{ __('VAT included in all prices where applicable.') }}</p>
                    </div>
                </div>
                <div class="flex gap-4 mt-4 text-[#c6d4df]">
                    <a href="https://store.steampowered.com/about/" class="hover:text-white">{{ __('About Valve') }}</a>
                    <span>|</span>
                    <a href="https://partner.steamgames.com/" class="hover:text-white">{{ __('Steamworks') }}</a>
                    <span>|</span>
                    <a href="https://www.valvesoftware.com/en/jobs" class="hover:text-white">{{ __('Jobs') }}</a>
                    <span>|</span>
                    <a href="https://store.steampowered.com/about/" class="hover:text-white">{{ __('Steam Distribution') }}</a>
                    <span>|</span>
                    <a href="https://help.steampowered.com/" class="hover:text-white">{{ __('Support') }}</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
