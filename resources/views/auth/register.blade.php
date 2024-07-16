<x-authentication-layout>
    <h1 class="text-3xl text-gray-800 dark:text-gray-100 font-bold mb-6 text-center">{{ __('Daftar Akun') }}</h1>
    <!-- Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="space-y-4">
            <div>
                <x-label for="name">{{ __('Nama Lengkap') }} <span class="text-red-500">*</span></x-label>
                <x-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div>
                <x-label for="name_opd">{{ __('Nama OPD') }} <span class="text-red-500">*</span></x-label>
                <x-input id="name_opd" type="name_opd" name="name_opd" :value="old('name_opd')" required />
            </div>

            <div>
                <x-label for="phone">{{ __('Nomer Telepon') }} <span class="text-red-500">*</span></x-label>
                <x-input id="phone" type="phone" name="phone" :value="old('phone')" required />
            </div>

            <div>
                <x-label for="email">{{ __('Email Address') }} <span class="text-red-500">*</span></x-label>
                <x-input id="email" type="email" name="email" :value="old('email')" required />
            </div>

            <div>
                <x-label for="alamat">{{ __('Alamat') }} <span class="text-red-500">*</span></x-label>
                <x-input id="alamat" type="alamat" name="alamat" :value="old('alamat')" required />
            </div>

            <div>
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div>
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
        </div>
        <div class="flex items-center justify-between mt-6">
            <x-button>
                {{ __('Daftar') }}
            </x-button>
        </div>
        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-6">
            <label class="flex items-start">
                <input type="checkbox" class="form-checkbox mt-1" name="terms" id="terms" />
                <span class="text-sm ml-2">
                    {!! __('I agree to the :terms_of_service and :privacy_policy', [
                    'terms_of_service' => '<a target="blank" href="'.route('terms.show').'" class="text-sm underline hover:no-underline">'._('Terms of Service').'</a>',
                    'privacy_policy' => '<a target="blank" href="'.route('policy.show').'" class="text-sm underline hover:no-underline">'._('Privacy Policy').'</a>',
                    ]) !!}
                </span>
            </label>
        </div>
        @endif
    </form>
    <x-validation-errors class="mt-4" />
    <!-- Footer -->
    <div class="pt-5 mt-6 border-t border-gray-100 dark:border-gray-700/60">
        <div class="text-sm">
            {{ _('Sudah Punya akun?') }} <a class="font-medium text-violet-500 hover:text-violet-600 dark:hover:text-violet-400" href="{{ route('login') }}">{{ _('Masuk') }}</a>
        </div>
    </div>
</x-authentication-layout>
