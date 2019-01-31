<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Billing\Stripe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        // Add post archives to sidebar
        \View::composer('layouts.sidebar', function($view) {
            $view->with('archives', \App\Post::archives());
            $view->with('tags', \App\Tag::has('posts')->pluck('name'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // \App::bind(Stripe::class, function() {
        // \App::bind('\App\Billing\Stripe', function() {

        $this->app->singleton(Stripe::class, function($app) {

            // Since we passed $app into the function, we can use it here to resolve something else that we may need to resolve something else.
            
            // $x = $app->singleton(SomeOtherClass::class);

            return new Stripe(config('services.stripe.secret'));
        });

        // Swaps the two
        // App::instance('\App\Billing\Stripe', $stripe);

        // $stripe = App::make('\App\Billing\Stripe');
        // $stripe = app('App\Billing\Stripe');
        // $stripe = resolve('App\Billing\Stripe');
    }
}
