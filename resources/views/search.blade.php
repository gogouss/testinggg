<x-layout :title="__('Search') . ' · Steam'">
    <div class="bg-gradient-to-b from-[#1b2838] to-[#2a475e]">
        <div class="max-w-[1280px] mx-auto px-4 py-6">
            <nav class="bg-gradient-to-r from-[#3b6e8c] to-[#1a3e5c] mb-8 rounded shadow-lg">
                <ul class="flex items-center h-[35px] text-[13px]">
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="{{ route('home') }}">{{ __('Your Store') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="{{ route('home') }}#new-trending">{{ __('New & Noteworthy') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="{{ route('home') }}#special-offers">{{ __('Categories') }}</a></li>
                    <li class="ml-auto px-4 flex items-center">
                        <form method="GET" action="{{ route('game.search') }}" class="flex items-center">
                            <input type="text" name="q" value="{{ $query }}" placeholder="{{ __('search the store') }}"
                                   class="bg-[#316282] border border-[#00000040] px-2 py-1 text-[12px] w-[240px] placeholder-[#0e1c25]">
                        </form>
                    </li>
                </ul>
            </nav>

            <div class="mb-4">
                <h1 class="text-[22px] text-white">{{ __('Search results') }}</h1>
                @if($query !== '')
                <p class="text-[12px] text-[#8f98a0]">{{ __('Showing results for') }} &ldquo;{{ $query }}&rdquo; — {{ trans_choice(':count game|:count games', $results->count()) }}</p>
                @endif
            </div>

            @if($results->isEmpty())
            <div class="bg-[#16202d] px-4 py-8 text-center text-[13px] text-[#8f98a0]">
                {{ $query === '' ? __('Type a game title or genre to start searching.') : __('No games matched your search. Try a different title or genre.') }}
            </div>
            @else
            <div class="space-y-1">
                @foreach($results as $game)
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
            @endif
        </div>
    </div>
</x-layout>
