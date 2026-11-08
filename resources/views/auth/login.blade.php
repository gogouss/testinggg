<x-layout :title="__('Sign in') . ' · Steam'">
    <div class="bg-gradient-to-b from-[#1b2838] to-[#2a475e]">
        <div class="max-w-[1280px] mx-auto px-4 py-12">
            <div class="max-w-[420px] mx-auto bg-[#171a21] border border-[#2a475e] p-6 shadow-2xl">
                <h1 class="text-[20px] text-white mb-1">{{ __('Sign in') }}</h1>
                <p class="text-[12px] text-[#8f98a0] mb-4">{{ __('with your account name and password') }}</p>

                @if($errors->any())
                <div class="border border-[#a44] bg-[#3a1d1d] text-[#e6a4a4] text-[12px] px-3 py-2 mb-4">
                    {{ $errors->first() }}
                </div>
                @endif

                <form method="POST" action="{{ route('login.store') }}" class="space-y-3">
                    @csrf
                    <label class="block">
                        <span class="block text-[12px] text-[#b8b6b4] mb-1">{{ __('Account name') }}</span>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="username"
                               class="w-full bg-[#1b2838] border border-[#00000066] px-2 py-1.5 text-[13px] text-white focus:border-[#67c1f5] focus:outline-none">
                    </label>
                    <label class="block">
                        <span class="block text-[12px] text-[#b8b6b4] mb-1">{{ __('Password') }}</span>
                        <input type="password" name="password" required autocomplete="current-password"
                               class="w-full bg-[#1b2838] border border-[#00000066] px-2 py-1.5 text-[13px] text-white focus:border-[#67c1f5] focus:outline-none">
                    </label>
                    <label class="flex items-center gap-2 text-[12px] text-[#b8b6b4]">
                        <input type="checkbox" name="remember" value="1" class="accent-[#67c1f5]">
                        {{ __('Remember me') }}
                    </label>
                    <button type="submit" class="w-full bg-gradient-to-r from-[#75b022] to-[#588a1b] hover:from-[#8ed629] hover:to-[#6aa621] text-white py-2 text-[14px] transition-colors">
                        {{ __('Sign in') }}
                    </button>
                </form>

                <p class="text-[11px] text-[#5c6a76] mt-4">{{ __('Demo account') }}: <span class="text-[#8f98a0]">demo / password</span></p>
            </div>
        </div>
    </div>
</x-layout>
