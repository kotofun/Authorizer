<?php

namespace App\Http\Controllers;

use App\Services\Tokenizer;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class TokenController extends BaseController
{
    /* @var \App\Services\Tokenizer */
    private $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function refresh(Request $request)
    {
        $token = $request->get('token');

        if (is_null($token = $this->tokenizer->refreshToken($token))) {
            return response()->json(['error' => 'token is not valid'], 401);
        }

        return response()->json(['token' => $token->__toString()]);
    }
}
