<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App;

class JdateServiceProvider extends ServiceProvider
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
        App::bind('jdate', function()
        {
            return new \App\Jdate\Jdate;
        });
    }
}
