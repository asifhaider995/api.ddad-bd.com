<?php

namespace App\Providers;

use App\HourlyPlaylist;
use Carbon\Carbon;
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
        $this->app->singleton(HourlyPlaylist::class, function() {
            return new HourlyPlaylist();
        });
    }
}
