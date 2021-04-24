<?php

namespace Gfarias\PreviService;

use Illuminate\Support\ServiceProvider as Provider;

class PreviServiceProvider extends Provider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(PreviService::class, function () {
            return new PreviService();
        });
    }
}
