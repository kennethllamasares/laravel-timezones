<?php

namespace KennethLlamasares\Timezones;

use Illuminate\Support\ServiceProvider;
use KennethLlamasares\Timezones\Console\SeedTimezones;

class TimezonesServiceProvider extends ServiceProvider {

    public function register() 
    {
        $this->registerCommands();
    }

    public function boot()
    {
        $this->publishConfigs();
        $this->publishMigrations();
    }

    public function publishConfigs()
    {
        $this->publishes([
            __DIR__ . '/config/main.php' => config_path('timezones.php')
        ], 'config');

        $this->mergeConfigFrom(__DIR__ . '/config/main.php', 'timezones');
    }

    public function publishMigrations()
    {
        $this->publishes([
            __DIR__ . '/database/migrations' => $this->app->databasePath() . '/migrations'
        ], 'migrations');
    }

    public function registerCommands()
    {
        $this->commands([SeedTimezones::class]);
    }
}

