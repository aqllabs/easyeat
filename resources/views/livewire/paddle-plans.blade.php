<div id="pricing" class="py-8 sm:py-16 px-8">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">{{ __('Choose Your Plan') }}</p>
            <p class="mt-6 text-lg leading-8">
                {{  __('Select the perfect plan that fits your social media needs.') }}
                {{ __('Start with our :days days free trial and upgrade anytime to unlock more powerful features', ['days' => 7]) }}
            </p>
        </div>
    </div>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 mx-auto max-w-6xl my-8">
        @foreach($plans as $plan)
            <div class="px-8 py-12 border border-base-200 rounded-3xl shadow-xl hover:shadow-2xl cursor-pointer">
                <p class="text-3xl font-extrabold mb-2">{{ $plan['name'] }}</p>
                <p class="mb-6">
                    <span>{{ __('Best For:') }} </span> <span>{{ $plan['description'] }}</span></p>
                <p class="mb-6">
                    <span class="text-4xl font-extrabold">
                        {{ config('services.cashier.currency_symbol') }}{{ $plan['price'] }}
                    </span>
                    @if($plan['price'] !== 0)
                        <span class="text-base font-medium">/{{ $plan['interval'] }}</span>
                    @endif
                </p>
                <a href="{{ route('register') }}"
                   class="mb-6 btn btn-secondary btn-wide text-center mx-auto flex">
                    {{ __('Choose Plan') }}
                </a>
                <p class="text-sm mb-4">*{{ __(':days Days Free Trial', ['days' => 7]) }}</p>
                <ul>
                    @foreach($plan['features'] as $feature)
                        <li class="flex">
                            - {{ $feature }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endforeach
    </div>
</div>
