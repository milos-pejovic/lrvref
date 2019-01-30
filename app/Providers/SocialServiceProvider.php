<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SocialServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Twitter::class, function() {
            return new Twitter('api-key');
        });
        
//        $this->app->singleton(Instagram::class, function() {
//            return new Instagram('api-key');
//        });
    }
}
