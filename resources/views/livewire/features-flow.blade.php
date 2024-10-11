<section class="relative py-8 lg:py-20" id="features">
    <div class="absolute start-[10%] z-0">
        <div
            class="pointer-events-none aspect-square w-60 rounded-full bg-gradient-to-r from-primary/10 via-violet-500/10 to-purple-500/10 blur-3xl [transform:translate3d(0,0,0)] lg:w-[600px]"
        ></div>
    </div>

    <div class="container">
        <div class="flex flex-col items-center">
            <h2 class="inline text-4xl font-semibold">{{ __('How EasyEat Works') }}</h2>

            <p class="mt-4 text-lg sm:text-center">
                {{ __('Discover how EasyEat helps you find the perfect dining spot for your dietary needs') }}
            </p>
        </div>

        <div class="relative z-[2] mt-8 grid gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-12">
            <div
                class="overflow-hidden rounded-lg bg-base-200 shadow-md transition-all hover:shadow-xl"
            >
                <img alt="Restaurant Search" class="overflow-hidden rounded-ss-lg" src="https://placehold.co/600x400?text=Restaurant+Search" />
            </div>

            <div class="lg:mt-8">
                <div class="badge badge-primary">{{ __('Search') }}</div>
                <h3 class="mt-2 text-3xl font-semibold">{{ __('Find Restaurants') }}</h3>
                <p class="mt-2 text-base font-medium">
                    {{ __('Easily search for restaurants that cater to your specific dietary needs') }}
                </p>

                <ul class="mt-4 list-inside list-disc text-base">
                    <li>{{ __('Filter by dietary restrictions') }}</li>
                    <li>{{ __('Search by location') }}</li>
                    <li>{{ __('View detailed menu information') }}</li>
                    <li>{{ __('Read user reviews') }}</li>
                </ul>
            </div>
        </div>

        <div class="mt-8 grid gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-12">
            <div>
                <div class="badge badge-primary">{{ __('Personalize') }}</div>
                <h3 class="mt-2 text-3xl font-semibold">{{ __('Customize Your Profile') }}</h3>
                <p class="mt-2 text-base">
                    {{ __('Create a personalized profile to get tailored restaurant recommendations based on your dietary preferences and restrictions.') }}
                </p>

                <ul class="mt-4 list-inside list-disc text-base">
                    <li>{{ __('Set dietary preferences') }}</li>
                    <li>{{ __('Save favorite restaurants') }}</li>
                    <li>{{ __('Get personalized recommendations') }}</li>
                    <li>{{ __('Track your dining history') }}</li>
                </ul>
            </div>

            <div class="order-first lg:order-last">
                <div
                    class="overflow-hidden rounded-lg bg-base-200 shadow-md transition-all hover:shadow-xl"
                >
                    <img alt="User Profile" class="overflow-hidden rounded-ss-lg" src="https://placehold.co/600x400?text=User+Profile" />
                </div>
            </div>
        </div>

        <div class="mt-8 grid gap-8 lg:mt-20 lg:grid-cols-2 lg:gap-12">
            <div
                class="overflow-hidden rounded-lg bg-base-200 shadow-md transition-all hover:shadow-xl"
            >
                <img alt="Community Reviews" class="overflow-hidden rounded-ss-lg" src="https://placehold.co/600x400?text=Community+Reviews" />
            </div>

            <div class="lg:mt-8">
                <div class="badge badge-primary">{{ __('Community') }}</div>
                <h3 class="mt-2 text-3xl font-semibold">{{ __('Share Your Experience') }}</h3>
                <p class="mt-2 text-base">
                    {{ __('Contribute to our community by sharing your dining experiences and helping others with similar dietary needs.') }}
                </p>

                <ul class="mt-4 list-inside list-disc text-base">
                    <li>{{ __('Write detailed reviews') }}</li>
                    <li>{{ __('Rate restaurants for dietary accommodations') }}</li>
                    <li>{{ __('Share photos of menu items') }}</li>
                    <li>{{ __('Engage with other community members') }}</li>
                </ul>
            </div>
        </div>
    </div>
</section>