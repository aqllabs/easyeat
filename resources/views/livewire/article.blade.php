<a href="{{ route('blog.article', $article) }}" class="block">
    <article class="cursor-pointer flex max-w-xl flex-col items-start justify-between">
        <div class="rounded-xl h-52 w-full overflow-hidden shadow-md">
            <img class="object-contain object-center" src="{{ Storage::disk('s3')->url($article->thumbnail) }}" alt="">
        </div>
        <div class="flex items-center gap-x-4 text-xs mt-4">
            <time datetime="2020-03-16" class="text-gray-500">{{ $article->created_at}}</time>
        </div>
        <div class="group relative">
            <h3 class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                <span class="absolute inset-0"></span>
                {{ $article->title }}
            </h3>
            <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">
                {{ $article->seo_description }}
            </p>
        </div>
        <div class="relative mt-8 flex items-center gap-x-4">
            <img src="{{ $article->user->profile_photo_url }}" alt="" class="h-10 w-10 rounded-full bg-gray-50">
            <div class="text-sm leading-6">
                <p class="font-semibold text-gray-900">
                    {{ $article->user->name }}
                </p>
            </div>
        </div>
    </article>
</a>
