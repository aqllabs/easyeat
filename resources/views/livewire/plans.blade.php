<div id="pricing" class="px-8 py-8 sm:py-16">
    <div class="px-6 mx-auto max-w-7xl lg:px-8">
        <div class="max-w-2xl mx-auto lg:text-center">
            <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">
                {{ __('Choose Your Plan') }}
            </p>
            <p class="mt-6 text-lg leading-8">
                {{  __('Select the perfect plan that fits your social media needs.') }}
                {{ __('Start with our :days days free trial and upgrade anytime to unlock more powerful features', ['days' => 7]) }}
            </p>
        </div>
    </div>
    <div class="grid max-w-6xl grid-cols-1 gap-10 mx-auto my-8 lg:grid-cols-3">
        @foreach($plans as $plan)
            <div class="relative px-8 py-12 border border-base-200 rounded-3xl shadow-xl hover:shadow-2xl cursor-pointer {{ isset($plan['bestseller']) && $plan['bestseller'] ? 'border-secondary border-2' : '' }}">
                @if(isset($plan['bestseller']) && $plan['bestseller'] === true)
                    <span class="absolute px-4 text-sm font-semibold text-white rounded-full top-5 right-5 bg-secondary sm:font-medium sm:text-base">bestseller</span>
                @endif
                <p class="mb-2 text-3xl font-extrabold">{{ $plan['name'] }}</p>
                <p class="h-16 mb-6">
                    <span>{{ __('Best For:') }} </span> <span>{{ $plan['description'] }}</span></p>
                <p class="mb-6">
                    <span class="text-4xl font-extrabold">
                        {{ config('services.cashier.currency_symbol') }}{{ $plan['price'] }}
                    </span>
                    @if($plan['price'] !== 0)
                        <span class="text-base font-medium">/{{ $plan['interval'] }}</span>
                    @endif
                </p>
                {{-- Change to --}}
                {{-- route('lemonsqueezy.subscription.checkout', ['productId' => $plan['productId'], 'variantId' => $plan['variantId']])--}}
                {{-- for LemonSqueezy--}}
                @if($plan['price'] !== 0)
                    <a href="{{ Auth::user() ? route('stripe.subscription.checkout', ['price' => $plan['slug']]) : route('register')}}"
                    class="flex mx-auto mb-6 text-center btn btn-secondary btn-wide">
                        {{ __('Choose Plan') }}
                    </a>
                @else
                    <a href="{{ route('register') }}"
                    class="flex mx-auto mb-6 text-center btn btn-secondary btn-wide">
                        {{ __('Choose Plan') }}
                    </a>
                @endif
                <p class="mb-4 text-sm">*{{ __(':days Days Free Trial', ['days' => 7]) }}</p>
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
