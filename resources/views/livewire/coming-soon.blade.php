{{--You can update your theme directly here by changing the data-theme attribute value to your desired theme.--}}
{{--To see the full list of themes check here: https://daisyui.com/docs/themes/--}}

<div class="hero min-h-screen bg-base-200" data-theme="bumblebee">
    <div class="hero-content flex w-full flex-col sm:flex-row">
        <div class="basis-2/3 text-left mr-8">
            <h1 class="text-5xl sm:text-7xl font-bold leading-10">
                {{ __('Launch your Startup with') }} <span class="text-secondary">{{ __('Laravel Starter Kit') }}</span> {{ __('in Days.') }}
            </h1>
            <h2 class="py-6"><b>{{ __('Laravel Starter Kit') }}</b> {{ __('is your Laravel Jetstream, Tailwind, Inertia.js, Vue boilerplate.') }}
                <br>{{ __('Streamline your SaaS app development with ready-to-go components for payments, emails, OpenAI, Blog, Admin and many more.') }} </h2>
        </div>
        <div class="basis-1/3">
            <h3 class="text-4xl text-center mb-8">{{ __('Join the waitlist') }}</h3>
            <div class="card shadow-2xl bg-base-100">
                <form class="card-body" wire:submit="save">
                    <div class="form-control">
                        <label class="label mb-4">
                            <span class="label-text text-xl">{{ __('Add your email to be notified once') }} <span class="text-secondary">{{ __('Laravel Starter Kit') }}</span> {{ __('is ready') }}</span>
                        </label>
                        <input class="rounded-lg mb-4 border-base-300" type="text" placeholder="Email" wire:model="email">
                        <x-validation-errors class="mb-4" />
                        <button type="submit" class="btn btn-secondary" wire:loading.attr="disabled">
                            {{ __('Subscribe') }}
                            <div wire:loading>
                                <span class="loading loading-ring loading-xs"></span>
                            </div>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
