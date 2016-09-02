<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Lcobucci\JWT\Signer;
use Lcobucci\JWT\Signer\Hmac\Sha256;

class JwtServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(Signer::class, Sha256::class);
    }
}
