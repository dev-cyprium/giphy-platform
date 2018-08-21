<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\GiphyService;

class GiphyServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(GiphyService::class, function($app) {
            return new GiphyService();
        });
    }
// TODO: skloni 
    // provider nam treba da ne bi mi istancirali Giphy svaki put kad nam treba Giphy
    // dva razloga za provider:
    // -- kada koristimo neki tudji API
    // -- kada nam treba zajednicki kod za vise kontrolera (utilities)
 
    // Provider je klasa koja instancira servis (u skoro svakom slucaju singleton jer nam ne treba vise od jedne istane da bi hanleovali Giphy (kao baza, uvek jedna istanca))
}
