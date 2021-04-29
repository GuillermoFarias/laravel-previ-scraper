<?php

namespace Gfarias\PreviScraper;

use Illuminate\Support\ServiceProvider as Provider;

class PreviScraperServiceProvider extends Provider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->instance(PreviScraper::class, new PreviScraper());
    }
}
