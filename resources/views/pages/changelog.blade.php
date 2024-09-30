<x-home-layout>
<div class="py-8">
    <div class="mx-auto max-w-4xl px-6 lg:px-8">
        <div class="relative flex flex-col md:flex-row justify-between gap-4 sm:py-8 sm:px-6 lg:px-0">
            <div class="w-full">
                <div class="flex items-center justify-center flex-col mb-8">
                    <h1 class="mb-4 text-3xl font-bold sm:text-5xl sm:tracking-tight">
                        {{ __('Changelog') }}
                    </h1>
                    <p>{{ __('See what\'s new in our app') }}</p>
                </div>
                @foreach($changelogs as $changelog)
                <div class="mb-8 pb-8 border border-base-200 rounded-xl px-8 py-4">
                    <p class="text-sm text-base-500 mb-4">
                        {{ \Carbon\Carbon::parse($changelog->published_at)->format('F j, Y') }}
                    </p>
                    @if ($changelog->tags)
                        <div class="flex flex-wrap gap-2 mb-4">
                            @foreach (explode(',', $changelog->tags) as $tag)
                                <span class="px-2 py-1 text-sm font-medium rounded-full badge bg-yellow-500 text-white border-yellow-500">
                                    {{ $tag }}
                                </span>
                            @endforeach
                        </div>
                    @endif
                    <div class="prose max-w-none">
                        {!! $changelog->description !!}
                    </div>
                </div>
                @endforeach
                @if ($changelogs->isEmpty())
                    <p class="text-lg text-center text-base-500">{{ __('No changelog items available at the moment.') }}</p>
                @endif
            </div>                
        </div>
    </div>
</div>
</x-home-layout>
