<div class="hero min-h-screen bg-base-100">
    <div class="hero-content flex-col lg:flex-row">
        <div class="basis-2/3">
            <h1 class="text-5xl sm:text-7xl font-bold">
                {{ __('Find Your Perfect Meal with') }} <span class="text-secondary">{{ __('EasyEat') }}</span></h1>
            <p class="mt-6">
                {{ __('EasyEat is your go-to directory for finding restaurants and places that cater to your specific dietary needs. We carefully select and curate dining options to ensure you can eat out with confidence, regardless of your dietary restrictions.') }}
            </p>
            <a href="/" class="btn btn-secondary btn-widest text-lg text-white mt-4">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                </svg>
                {{ __('Find Restaurants') }}
            </a>
            <livewire:ratings/>
        </div>
        <div class="basis-1/3">
            <img src="https://placehold.co/400x300?text=Diverse+Dining+Options" class="rounded-lg" alt="Diverse dining options for various dietary needs"/>
        </div>
    </div>
</div>
