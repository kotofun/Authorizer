<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;

class SocializeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function request($provider)
    {
        return Socialite::with($provider)->stateless()->redirect();
    }

    public function handle($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
    }
}
