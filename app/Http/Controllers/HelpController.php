<?php

namespace App\Http\Controllers;

use App\Exceptions\InvalidTokenException;
use App\Services\Tokenizer;
use Illuminate\Support\Facades\Cookie;

/**
 * Class HelpController.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class HelpController extends Controller
{
    /* @var \App\Services\Tokenizer */
    private $tokenizer;

    public function __construct(Tokenizer $tokenizer)
    {
        $this->tokenizer = $tokenizer;
    }

    public function index()
    {
        $token = Cookie::get('token');
        $token = $this->tokenizer->refreshToken($token);
        $user = $this->tryGetUserFrom($token);

        return view('help.show', compact('user'));
    }

    /**
     * @param $token
     *
     * @return mixed
     */
    private function tryGetUserFrom($token)
    {
        try {
            $user = $this->tokenizer->userFrom($token);
        } catch (InvalidTokenException $e) {
            return;
        }

        return $user;
    }
}
