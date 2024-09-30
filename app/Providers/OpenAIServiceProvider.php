<?php

namespace App\Providers;

use App\Services\OpenAIService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class OpenAIServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(OpenAIService::class, function () {
            $client = Http::baseUrl(config('services.openai.urls.base'))
                ->timeout(3600)
                ->withToken(config('services.openai.key'));

            return new OpenAIService($client);
        });
    }
}
