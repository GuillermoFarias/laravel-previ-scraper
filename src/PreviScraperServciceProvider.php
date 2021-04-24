<?php

namespace Gfarias\PreviScraper;

use Illuminate\Support\ServiceProvider as Provider;

class PreviScraperServciceProvider extends Provider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PreviScraper::class, function () {
            return new PreviScraper();
        });
    }
}
