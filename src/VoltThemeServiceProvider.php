<?php

namespace Sdbruder\VoltTheme;

use Illuminate\Support\ServiceProvider;

class VoltThemeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/volt.php', 'courier'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/volt.php' => config_path('volt.php'),
        ], 'volt-config');

        $this->publishes([
            __DIR__.'/../resources/views' => resource_path('views/vendor/voltTheme'),
        ], 'volt-views');

        $this->publishes([
            __DIR__.'/../static/assets' => public_path('assets'),
            __DIR__.'/../static/css' => public_path('css'),
            __DIR__.'/../static/vendor' => public_path('vendor'),
        ], 'volt-public');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'voltTheme');
    }

}
