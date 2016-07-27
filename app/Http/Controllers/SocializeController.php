<?php

namespace App\Http\Controllers;

use App\Services\SocialAccountService;
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

    public function handle(SocialAccountService $socialAccountService, $provider)
    {
        $user = $socialAccountService->createOrGetUser(
            Socialite::driver($provider)->stateless()->user(),
            $provider);

        return "You are logged, dear {$user->name}";
    }
}
