<?php

namespace App\Observers;

use App\Models\Article;
use App\Services\OgImageService;
use Illuminate\Support\Facades\Storage;

class ArticleObserver
{
    public function __construct(public OgImageService $ogImageService)
    {
        //
    }

    /**
     * Handle the Article "created" event.
     */
    public function created(Article $article): void
    {
        $this->ogImageService->saveImage($article->title, $article->description);
    }

    /**
     * Handle the Article "updated" event.
     */
    public function updated(Article $article): void
    {
        if ($article->isDirty('title') || $article->isDirty('description')) {
            $this->ogImageService->saveImage($article->title, $article->description);
        }
    }

    /**
     * Handle the Article "deleted" event.
     */
    public function deleted(Article $article): void
    {
        Storage::delete($article->thumbnail);
    }

    /**
     * Handle the Article "restored" event.
     */
    public function restored(Article $article): void
    {
        //
    }

    /**
     * Handle the Article "force deleted" event.
     */
    public function forceDeleted(Article $article): void
    {
        //
    }
}
