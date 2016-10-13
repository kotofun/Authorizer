<?php

namespace App\Http\Middleware;

use App\Services\Tokenizer;

/**
 * Class JWTAuthenticate.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class JWTAuthenticate
{
    /**
     * @var \App\Services\Tokenizer
     */
    private $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function handle($request, \Closure $next)
    {
        $token = $request->cookie('token');

        if (is_null($token) || ( ! $this->tokenizer->isValid($token))) {
            return view('auth.login');
        }

        return $next($request);
    }
}
