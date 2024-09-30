<?php

namespace App\Providers;

use App\Services\LemonSqueezyService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

class LemonSqueezyServiceProvider extends ServiceProvider
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
        $this->app->bind(LemonSqueezyService::class, function () {
            $client = Http::baseUrl(config('services.lemonsqueezy.base_url'))
                ->timeout(3600)
                ->withToken(config('services.lemonsqueezy.key'));

            return new \App\Services\LemonSqueezyService($client, config('services.lemonsqueezy.store'));
        });
    }
}
