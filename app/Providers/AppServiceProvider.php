<?php

namespace App\Providers;

use Event;
use App\Ubication;
use App\Events\UbicationCreated;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Ubication::created(function ($ubication){
            Event::fire(new UbicationCreated($ubication));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
