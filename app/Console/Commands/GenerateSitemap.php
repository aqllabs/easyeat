<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:sitemap';

    protected $description = 'Generate sitemap';

    public function handle(): void
    {
        $url = config('app.url');

        SitemapGenerator::create($url)->writeToFile(public_path('sitemap.xml'));

        $time = now();
        $output = "Sitemap generated {$time}";
        $this->info($output);
    }
}
