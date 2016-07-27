<?php

namespace App\Providers;

use App\SocialAccount;
use Illuminate\Support\ServiceProvider;

class SocialAccountServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SocialAccount::class, function ($app) {
            return new SocialAccount();
        });
    }
}
