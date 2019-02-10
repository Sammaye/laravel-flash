<?php

namespace sammaye\Flash;

use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('flash', function () {
            return $this->app->make(FlashStore::class);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/views', 'flash');
        $this->publishes([
          __DIR__ . '/views' => base_path('resources/views/vendor/flash')
        ]);
    }
}
