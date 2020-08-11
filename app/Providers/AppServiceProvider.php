<?php

namespace App\Providers;

use App\Services\GeoLocation\FreeGeoIp;
use App\Services\GeoLocation\GeoLocation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(GeoLocation::class, FreeGeoIp::class);
    }
}
