<x-authentication-layout>
    <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6 text-center">{{ __('eRequest') }}</h1>
    @if (session('status'))
    <div class="mb-4 font-medium text-sm text-green-600">
        {{ session('status') }}
    </div>
    @endif
    <!-- Form -->
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            <x-button class="ml-3">
                {{ __('Masuk') }}
            </x-button>
        </div>
    </form>
    <x-validation-errors class="mt-4" />
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        <div class="text-sm">
            {{ _('Belum memiliki akun?') }} <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="{{ route('register') }}">{{ _('Daftar') }}</a>
        </div>
    </div>
</x-authentication-layout>