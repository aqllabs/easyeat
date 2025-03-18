<x-home-layout>
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
            <div class="mx-auto mt-6 grid max-w-2xl grid-cols-1 gap-x-6 gap-y-10 border-t border-gray-200 pt-6 sm:mt-8 sm:pt-8 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach($articles as $article)
                    <livewire:article :article="$article" :key="$article->id"/>
                @endforeach
            </div>
        </div>
</x-home-layout>
