<?php

namespace App\Http\Controllers;

use App\Services\OgImageService;
use Throwable;

class OgImageController extends Controller
{
    /**
     * @throws Throwable
     */
    public function __invoke(OgImageService $ogImageService)
    {
        return $ogImageService->getImage(request('title'), request('description'));
    }
}
