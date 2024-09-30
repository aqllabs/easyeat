{{--Used for MagicLink Auth--}}
<x-home-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @session('status')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ $value }}
            </div>
        @endsession

        <livewire:social.buttons />
        <div class="divider">or</div>

        <form method="POST" action="{{ route('magic.link') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Send Magic Link') }}
                </x-button>
            </div>
            <div class="flex flex-col items-center justify-end mt-4">
                <p class="text-base">{{ __('Do not have an account?') }}</p>
                <a href="{{ route('register') }}" class="ms-4 flex btn btn-ghost text-info">
                    {{ __('Register') }}
                </a>
            </div>
        </form>
    </x-authentication-card>
</x-home-layout>
