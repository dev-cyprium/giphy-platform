<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GravatarService;

class GravatarServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GravatarService::class, function($app) {
            return new GravatarService();
        });
      }
}
