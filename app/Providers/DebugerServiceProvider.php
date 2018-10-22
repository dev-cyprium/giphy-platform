<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\DebugerService;

class DebugerServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('debuger', function() {
            return new DebugerService();
        });
      }
}