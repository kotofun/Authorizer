<?php

namespace App\Http\Middleware;

use App\Services\Tokenizer;
use App\User;
use Closure;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Cookie;

class RefreshToken
{
    /* @var \App\Services\Tokenizer */
    private $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->cookie('token');
        if (is_null($token) || ( ! $this->tokenizer->isValid($token))) {
            return $next($request);
        }

        $token = $this->tokenizer->refreshToken($token);
        $user = $this->tokenizer->userFrom($token);

        return $this->logged($user, $token);
    }

    private function logged(User $user, $token)
    {
        $cookie = new Cookie('token', $token, 0, '/', null, false, false);
        $response = new Response(view('auth.logged')->with(['user' => $user->toArray()]));
        $response->withCookie($cookie);

        return $response;
    }
}
