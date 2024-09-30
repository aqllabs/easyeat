<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Services\OgImageService;
use Illuminate\Console\Command;

class GenerateOgImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:og-images';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate OG Images';

    /**
     * Execute the console command.
     */
    public function handle(OgImageService $ogImageService)
    {
        $this->info('Generating OG images...');

        $articles = Article::all();

        foreach ($articles as $article) {
            $this->info('Generating OG image for article: '.$article->title);

            $ogImageService->saveImage($article->title ?? $article->seo_title);

            $this->info('OG image generated: '.$article->seo_title);
        }
    }
}
