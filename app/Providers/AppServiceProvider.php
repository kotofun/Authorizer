<?php

namespace App\Providers;

use App\Services\RedirectMapper;
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
        $this->app->configure('services');
        $this->app->configure('redirects');

        $this->app->singleton(RedirectMapper::class);
    }
}
