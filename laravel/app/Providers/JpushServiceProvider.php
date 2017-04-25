<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class JpushServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->publishes([
            __DIR__ . '/../../vendor/jpush/config/config.php' => config_path('Jpush.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
