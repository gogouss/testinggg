<x-layout :title="__('Welcome to Steam')">
    <div class="bg-gradient-to-b from-[#1b2838] to-[#2a475e]">
        <div class="max-w-[1280px] mx-auto px-4 py-6">
            <!-- Subnav -->
            <nav class="bg-gradient-to-r from-[#3b6e8c] to-[#1a3e5c] mb-8 rounded shadow-lg">
                <ul class="flex items-center h-[35px] text-[13px]">
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="{{ route('home') }}">{{ __('Your Store') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="#new-trending">{{ __('New & Noteworthy') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="#special-offers">{{ __('Categories') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="#free-to-play">{{ __('Points Shop') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="#new-trending">{{ __('News') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="#">{{ __('Labs') }}</a></li>
                    <li class="ml-auto px-4 flex items-center">
                        <form method="GET" action="{{ route('game.search') }}">
                            <input type="text" name="q" placeholder="{{ __('search') }}" class="bg-[#316282] border border-[#00000040] px-2 py-1 text-[12px] w-[200px] placeholder-[#0e1c25]">
                        </form>
                    </li>
                </ul>
            </nav>

            <!-- Featured Carousel -->
            @if($featured->count() > 0)
            <section id="featured" class="mb-8" data-carousel tabindex="0" aria-roledescription="carousel" aria-label="{{ __('Featured & Recommended') }}">
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-[14px] uppercase tracking-wide">{{ __('Featured & Recommended') }}</h2>
                    <div class="flex items-center gap-2">
                        <span class="text-[12px] text-[#8f98a0]" data-carousel-counter>1 / {{ $featured->count() }}</span>
                        <button type="button" data-carousel-prev aria-label="{{ __('Previous') }}" class="w-6 h-6 flex items-center justify-center bg-[#2a475e] hover:bg-[#3b6e8c] text-[#c7d5e0] hover:text-white transition-colors">
                            <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path d="M12.5 15.5 5 10l7.5-5.5v11Z"/></svg>
                        </button>
                        <button type="button" data-carousel-next aria-label="{{ __('Next') }}" class="w-6 h-6 flex items-center justify-center bg-[#2a475e] hover:bg-[#3b6e8c] text-[#c7d5e0] hover:text-white transition-colors">
                            <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path d="M7.5 4.5 15 10l-7.5 5.5v-11Z"/></svg>
                        </button>
                    </div>
                </div>
                <div class="relative bg-black shadow-xl">
                    @foreach($featured as $index => $game)
                    <div data-carousel-slide class="flex w-full {{ $index === 0 ? '' : 'hidden' }}">
                        <div class="relative w-[616px] shrink-0 h-[353px] overflow-hidden group">
                            <img src="{{ $game->header_image }}" alt="{{ $game->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-black/70 to-transparent pointer-events-none"></div>
                            <span class="absolute bottom-3 left-3 text-[11px] uppercase tracking-wide text-white/70">{{ $index + 1 }} / {{ $featured->count() }}</span>
                        </div>
                        <div class="flex-1 p-4 bg-gradient-to-br from-[#0a141d] to-[#101822]">
                            <h3 class="text-[24px] mb-4">{{ $game->title }}</h3>
                            @if($featured->count() > 1)
                            <div class="grid grid-cols-2 gap-1 mb-4">
                                @foreach($featured->except([$index])->take(4) as $thumbIndex => $thumb)
                                <button type="button" data-carousel-goto="{{ $thumbIndex }}" title="{{ $thumb->title }}" class="relative block h-[69px] overflow-hidden group/thumb">
                                    <img src="{{ $thumb->capsule_image }}" alt="{{ $thumb->title }}" class="w-full h-full object-cover opacity-70 group-hover/thumb:opacity-100 transition-opacity">
                                    <span class="absolute inset-x-0 bottom-0 bg-black/80 px-1 py-0.5 text-[10px] leading-4 truncate text-left opacity-0 group-hover/thumb:opacity-100 transition-opacity">{{ $thumb->title }}</span>
                                </button>
                                @endforeach
                            </div>
                            @endif
                            <p class="text-[13px] mb-2">{{ __('Now Available') }}</p>
                            <p class="text-[12px] text-[#acb2b8] mb-4 line-clamp-3">{{ $game->short_description }}</p>
                            <div class="flex items-center gap-2">
                                @if($game->is_free)
                                    <span class="text-[13px] text-[#66c0f4]">{{ __('Free To Play') }}</span>
                                @elseif($game->discount_percent > 0)
                                    <span class="bg-[#4c6b22] text-[#a4d007] px-2 py-1 text-[14px]">-{{ $game->discount_percent }}%</span>
                                    <div class="text-right">
                                        <div class="text-[11px] text-[#7193a6] line-through">${{ number_format($game->price, 2) }}</div>
                                        <div class="text-[13px]">${{ number_format($game->discount_price, 2) }}</div>
                                    </div>
                                @else
                                    <span class="text-[13px]">${{ number_format($game->price, 2) }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- Special Offers -->
            @if($specials->count() > 0)
            <section id="special-offers" class="mb-8">
                <h2 class="text-[14px] uppercase tracking-wide mb-2">{{ __('Special Offers') }}</h2>
                <div class="grid grid-cols-3 gap-4">
                    @foreach($specials as $game)
                    <a href="{{ route('game.show', $game->slug) }}" class="bg-gradient-to-b from-[#2a475e] to-[#1b2838] shadow-lg hover:shadow-xl transition-shadow group">
                        <div class="h-[143px] overflow-hidden">
                            <img src="{{ $game->capsule_image }}" alt="{{ $game->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-2">
                            <div class="flex items-center gap-2">
                                <span class="bg-[#4c6b22] text-[#a4d007] px-2 py-1 text-[14px] font-bold">-{{ $game->discount_percent }}%</span>
                                <div>
                                    <div class="text-[11px] text-[#7193a6] line-through">${{ number_format($game->price, 2) }}</div>
                                    <div class="text-[13px] text-[#acdbf5]">${{ number_format($game->discount_price, 2) }}</div>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </section>
            @endif

            <!-- New & Trending -->
            <section id="new-trending" class="mb-8" data-pager>
                <div class="flex items-center justify-between mb-2">
                    <h2 class="text-[14px] uppercase tracking-wide">{{ __('New & Trending') }}</h2>
                    @if($games->count() > 5)
                    <div class="flex items-center gap-1">
                        <button type="button" data-pager-prev aria-label="{{ __('Previous page') }}" class="w-6 h-6 flex items-center justify-center bg-[#16202d] hover:bg-[#2a475e] transition-colors">
                            <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path d="M12.5 15.5 5 10l7.5-5.5v11Z"/></svg>
                        </button>
                        @foreach($games->chunk(5) as $pageIndex => $page)
                        <button type="button" data-pager-goto="{{ $pageIndex }}" aria-label="{{ __('Page') }} {{ $pageIndex + 1 }}" class="w-6 h-6 flex items-center justify-center text-[12px] bg-[#16202d] hover:bg-[#2a475e] transition-colors">{{ $pageIndex + 1 }}</button>
                        @endforeach
                        <button type="button" data-pager-next aria-label="{{ __('Next page') }}" class="w-6 h-6 flex items-center justify-center bg-[#16202d] hover:bg-[#2a475e] transition-colors">
                            <svg class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor"><path d="M7.5 4.5 15 10l-7.5 5.5v-11Z"/></svg>
                        </button>
                    </div>
                    @endif
                </div>
                @foreach($games->chunk(5) as $pageIndex => $pageGames)
                <div data-pager-page class="space-y-1 {{ $pageIndex === 0 ? '' : 'hidden' }}">
                    @foreach($pageGames as $game)
                    <a href="{{ route('game.show', $game->slug) }}" class="flex items-center bg-[#16202d] hover:bg-gradient-to-r hover:from-[#3b6e8c] hover:to-[#16202d] transition-all group">
                        <img src="{{ $game->capsule_image }}" alt="{{ $game->title }}" class="w-[184px] h-[69px] object-cover">
                        <div class="flex-1 px-4">
                            <h3 class="text-[14px] group-hover:text-white">{{ $game->title }}</h3>
                            <p class="text-[11px] text-[#384959] group-hover:text-[#c7d5e0]">{{ $game->genres }}</p>
                        </div>
                        <div class="px-4 text-right">
                            @if($game->is_free)
                                <span class="text-[13px] text-[#66c0f4]">{{ __('Free') }}</span>
                            @elseif($game->discount_percent > 0)
                                <div class="flex items-center gap-2">
                                    <span class="bg-[#4c6b22] text-[#a4d007] px-1 py-0.5 text-[12px]">-{{ $game->discount_percent }}%</span>
                                    <div>
                                        <div class="text-[10px] text-[#7193a6] line-through">${{ number_format($game->price, 2) }}</div>
                                        <div class="text-[13px]">${{ number_format($game->discount_price, 2) }}</div>
                                    </div>
                                </div>
                            @else
                                <span class="text-[13px]">${{ number_format($game->price, 2) }}</span>
                            @endif
                        </div>
                    </a>
                    @endforeach
                </div>
                @endforeach
            </section>

            <!-- Free to Play -->
            @if($freeGames->count() > 0)
            <section id="free-to-play">
                <h2 class="text-[14px] uppercase tracking-wide mb-2">{{ __('Free To Play') }}</h2>
                <div class="grid grid-cols-4 gap-2">
                    @foreach($freeGames as $game)
                    <a href="{{ route('game.show', $game->slug) }}" class="bg-[#16202d] hover:bg-[#2a475e] transition-colors group">
                        <div class="h-[90px] overflow-hidden">
                            <img src="{{ $game->header_image }}" alt="{{ $game->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        </div>
                        <div class="p-2">
                            <h3 class="text-[12px] mb-2 truncate group-hover:text-white">{{ $game->title }}</h3>
                            <span class="bg-[#4c6b22] text-[#a4d007] px-2 py-0.5 text-[11px]">{{ __('Free To Play') }}</span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </section>
            @endif
        </div>
    </div>
</x-layout>
