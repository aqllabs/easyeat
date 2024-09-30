<?php

namespace App\Http\Controllers;

use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;

class SitemapController extends Controller
{
    public function index(): Sitemap
    {
        $url = config('app.url');

        return SitemapGenerator::create($url)->getSitemap();
    }
}
