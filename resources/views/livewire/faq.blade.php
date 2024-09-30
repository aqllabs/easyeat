<div class="py-8 sm:py-16 px-8">
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mx-auto max-w-2xl lg:text-center">
            <p class="mt-2 text-3xl font-bold tracking-tight sm:text-4xl">{{ __('FAQs') }}</p>
            <p class="mt-6 text-lg leading-8">{{ __('Have questions? We have got you covered!') }} </p>
        </div>
    </div>
    <div class="mx-auto max-w-3xl mt-8">
        <div class="join join-vertical w-full">
            @foreach($faqs as $key => $faq)
                <div wire:key="{{ $key }}"
                     wire:click="toggleFaq({{$key}})"
                     class="collapse collapse-arrow join-item border border-base-300">
                    <input type="radio" id="'faq-'{{ $key }}" name="my-accordion" {{ $selectedFaq === $key ? 'checked' : '' }}/>
                    <div class="collapse-title text-xl font-medium">
                        {{ $faq['title'] }}
                    </div>
                    <div class="collapse-content">
                        <p>{{ $faq['content'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
