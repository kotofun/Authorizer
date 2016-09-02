<?php

namespace App\Http\Middleware;

use App\Services\Tokenizer;
use App\User;
use Closure;
use Symfony\Component\HttpFoundation\Cookie;

class CheckToken
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
        if (is_null($token)) {
            return $next($request);
        }

        $token = $this->tokenizer->parse($token);

        if ($this->tokenizer->isValid($token)) {
            $user = $this->tokenizer->userFrom($token);

            $token = $this->tokenizer->buildFrom($user);

            return $this->logged($user, $token);
        }
    }

    private function logged(User $user, $token)
    {
        $cookie = new Cookie('token', $token, 0, '/', null, false, false);

        return view('auth.logged')
            ->with($user->toArray())
            ->withCookie($cookie);
    }
}
