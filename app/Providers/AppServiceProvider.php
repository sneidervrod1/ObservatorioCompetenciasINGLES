<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{

    public function boot(): void
    {
        Schema::defaultStringLength(191); 
        Paginator::useTailwind();

        if ($this->app->environment('production')){
            \URL::forceScheme('https');

        }
    }


    public function register(): void
    {
    }
}
