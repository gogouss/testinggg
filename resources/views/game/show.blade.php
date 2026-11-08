<x-layout :title="__(':title on Steam', ['title' => $game->title])">
    <div class="bg-gradient-to-b from-[#1b2838] to-[#2a475e]">
        <div class="max-w-[1280px] mx-auto px-4 py-6">
            <nav class="bg-gradient-to-r from-[#3b6e8c] to-[#1a3e5c] mb-6 rounded shadow-lg">
                <ul class="flex items-center h-[35px] text-[13px]">
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="{{ route('home') }}">{{ __('Your Store') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="{{ route('home') }}#new-trending">{{ __('New & Noteworthy') }}</a></li>
                    <li class="px-4 hover:bg-[#4c7b9b] h-full flex items-center"><a href="{{ route('home') }}#special-offers">{{ __('Categories') }}</a></li>
                    <li class="ml-auto px-4 flex items-center">
                        <form method="GET" action="{{ route('game.search') }}">
                            <input type="text" name="q" placeholder="{{ __('search the store') }}" class="bg-[#316282] border border-[#00000040] px-2 py-1 text-[12px] w-[200px] placeholder-[#0e1c25]">
                        </form>
                    </li>
                </ul>
            </nav>

            <div class="mb-4">
                <h1 class="text-[26px] text-white">{{ $game->title }}</h1>
                <a href="{{ route('home') }}" class="text-[12px] text-[#67c1f5] hover:text-white">&lt;&lt; {{ __('All Games') }}</a>
            </div>

            <div class="flex gap-4 mb-8">
                <div class="w-[616px]">
                    <div class="mb-2">
                        <img src="{{ $game->header_image }}" alt="{{ $game->title }}" class="w-full h-[353px] object-cover">
                    </div>
                </div>
                <div class="flex-1">
                    <img src="{{ $game->capsule_image }}" alt="{{ $game->title }}" class="w-full h-[151px] object-cover mb-4">
                    <p class="text-[13px] text-[#c6d4df] mb-4 leading-relaxed">{{ $game->short_description }}</p>
                    <div class="text-[12px] space-y-1 mb-4">
                        <div class="flex"><span class="w-[100px] text-[#556772]">{{ __('Title:') }}</span><span>{{ $game->title }}</span></div>
                        <div class="flex"><span class="w-[100px] text-[#556772]">{{ __('Genre:') }}</span><span class="text-[#67c1f5]">{{ $game->genres }}</span></div>
                        <div class="flex"><span class="w-[100px] text-[#556772]">{{ __('Developer:') }}</span><span class="text-[#67c1f5]">{{ $game->developer }}</span></div>
                        <div class="flex"><span class="w-[100px] text-[#556772]">{{ __('Publisher:') }}</span><span class="text-[#67c1f5]">{{ $game->publisher }}</span></div>
                        @if($game->release_date)
                        <div class="flex"><span class="w-[100px] text-[#556772]">{{ __('Release Date:') }}</span><span>{{ $game->release_date->format('d M, Y') }}</span></div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-[#1a3e5c] to-[#2a475e] p-4 mb-8">
                <h2 class="text-[21px] text-white mb-2">{{ __('Buy :title', ['title' => $game->title]) }}</h2>
                <div class="flex items-center justify-between bg-[#00000033] p-3">
                    <span class="text-[13px]">{{ __('Buy :title', ['title' => $game->title]) }}</span>
                    <div class="flex items-center gap-3">
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
                        <button class="bg-gradient-to-r from-[#75b022] to-[#588a1b] hover:from-[#8ed629] hover:to-[#6aa621] text-white px-6 py-2 text-[15px]">
                            @if($game->is_free) {{ __('Play Game') }} @else {{ __('Add to Cart') }} @endif
                        </button>
                    </div>
                </div>
            </div>

            @if($game->description)
            <div class="mb-8">
                <h2 class="text-[18px] text-white mb-3 pb-2 border-b border-[#3b6e8c]">{{ __('About This Game') }}</h2>
                <div class="text-[14px] text-[#acb2b8] leading-relaxed space-y-4">
                    <p>{{ $game->description }}</p>
                </div>
            </div>
            @endif
        </div>
    </div>
</x-layout>
