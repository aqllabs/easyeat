@section('seo.title', $article->title)
@section('seo.description', $article->seo_description)
@section('seo.image', Storage::disk('s3')->url($article->thumbnail))

<x-home-layout>
    <div class="lg:flex lg:items-start lg:justify-between lg:flex-col py-16">
    <div class="min-w-0 flex-1 ">
        <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">
            {{
                $article->title
            }}
        </h2>
        <div class="mt-1 flex flex-col sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
            <div class="mt-2 flex items-center text-sm text-gray-500">
                <svg class="mr-1.5 h-5 w-5 flex-shrink-0 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                     aria-hidden="true">
                    <path fill-rule="evenodd"
                          d="M5.75 2a.75.75 0 01.75.75V4h7V2.75a.75.75 0 011.5 0V4h.25A2.75 2.75 0 0118 6.75v8.5A2.75 2.75 0 0115.25 18H4.75A2.75 2.75 0 012 15.25v-8.5A2.75 2.75 0 014.75 4H5V2.75A.75.75 0 015.75 2zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75z"
                          clip-rule="evenodd"/>
                </svg>
                {{ $article->created_at->format('M d Y, H:m') }}
            </div>
        </div>
    </div>
    <div>
        <div class="w-full sm:max-w-2xl mt-4 rounded-xl overflow-hidden">
            <img class="w-full" src="{{ Storage::disk('s3')->url($article->thumbnail) }}" alt="{{ $article->title }}">
        </div>
        <div class="w-full sm:max-w-2xl mt-6 bg-white overflow-hidden sm:rounded-lg prose">
            {!! $article->content !!}
        </div>
    </div>
    </div>
</x-home-layout>
