<x-home-layout>
    <div class="py-24 sm:py-32">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto max-w-2xl lg:mx-0">
                <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">{{ __('Blog') }}</h2>
                <p class="mt-2 text-lg leading-8 text-gray-600">{{ __('Welcome to our blog') }}</p>
            </div>
            <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($articles as $article)
                    <livewire:article :article="$article" :key="$article->id"/>
                @endforeach
            </div>
        </div>
    </div>
</x-home-layout>
