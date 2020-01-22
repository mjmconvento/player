<?php

namespace App\Providers;

use App\Classes\PlayerFormatter;
use App\Classes\PlayerParser;
use App\Interfaces\FormatPlayerNamesInterface;
use App\Interfaces\ParsePlayerInterface;
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
        $this->app->bind(FormatPlayerNamesInterface::class, function($app) {
            return new PlayerFormatter();
        });

        $this->app->bind(ParsePlayerInterface::class, function($app) {
            return new PlayerParser();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
