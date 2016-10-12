<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidTokenException;
use App\Services\RedirectMapper;
use App\Services\SocialAccountService;
use App\Services\Tokenizer;
use Illuminate\Support\Facades\Cookie as CookieFacade;
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

    /**
     * @var \App\Services\Tokenizer
     */
    private $tokenizer;

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

    public function handle(SocialAccountService $socialAccountService, $provider)
    {
        $redirectUrl = $this->buildRedirectUrlFor($provider);

        $token = CookieFacade::get('token');
        try {
            $user = $this->tokenizer->userFrom($token);
        } catch (InvalidTokenException $e) {
            $user = null;
        }

        $user = $socialAccountService->createOrGetUser(
            $provider,
            Socialite::driver($provider)
                ->stateless()
                ->redirectUrl($redirectUrl)
                ->user(),
            $user);

        $token = $this->tokenizer->buildFrom($user);

        if ($to = $this->mapper->getRedirectTo()) {
            $cookie = new Cookie('token', $token, 0, '/', null, false, false);

            return redirect($to)->withCookie($cookie);
        }

        return redirect('/');
    }
}
