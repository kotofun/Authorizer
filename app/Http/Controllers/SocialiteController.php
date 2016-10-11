<?php

namespace App\Http\Controllers;

use App\Services\RedirectMapper;
use App\Services\SocialAccountService;
use App\Services\Tokenizer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Request;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Cookie;

/**
 * Class SocialiteController.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class SocialiteController
{
    /**
     * @var \App\Services\RedirectMapper
     */
    private $mapper;

    public function __construct(Tokenizer $tokenizer, RedirectMapper $mapper)
    {
        $this->tokenizer = $tokenizer;
        $this->mapper = $mapper;
    }

    public function request($provider)
    {
        $redirectUrl = $this->buildRedirectUrlFor($provider);

        return Socialite::driver($provider)
            ->stateless()
            ->redirectUrl($redirectUrl)
            ->redirect();
    }

    public function handle(SocialAccountService $socialAccountService, $provider)
    {
        $redirectUrl = $this->buildRedirectUrlFor($provider);

        $user = $socialAccountService->createOrGetUser(
            Socialite::driver($provider)
                ->stateless()
                ->redirectUrl($redirectUrl)
                ->user(),
            $provider);

        $token = $this->tokenizer->buildFrom($user);

        if ($to = $this->mapper->getRedirectTo()) {
            $cookie = new Cookie('token', $token, 0, '/', null, false, false);

            return redirect($to)->withCookie($cookie);
        }

        return redirect('/');
    }

    /**
     * @param $provider
     *
     * @return mixed|string
     */
    private function buildRedirectUrlFor($provider)
    {
        $redirectUrl = config("services.{$provider}.redirect");

        if ($to = $this->mapper->getRedirectTo()) {
            $redirectUrl .= "?{$this->mapper->getRedirectKey()}={$to}";

            return $redirectUrl;
        }

        return $redirectUrl;
    }
}
