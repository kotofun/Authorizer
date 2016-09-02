<?php

namespace App\Http\Controllers;

use App\Services\Tokenizer;
use App\Services\SocialAccountService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\Cookie;

class AuthController extends Controller
{
    /* @var array register validation */
    private $rules = [
        'last_name' => 'required|alpha',
        'first_name' => 'required|alpha',
        'email' => 'required|confirmed|email|unique:users',
        'password' => 'required|confirmed|min:6',
    ];

    /* @var \App\Services\Tokenizer */
    private $tokenizer;

    public function __construct(Tokenizer $tokenizer, Request $request)
    {
        $this->tokenizer = $tokenizer;
    }

    public function request($provider)
    {
        return Socialite::with($provider)
            ->stateless()
            ->redirect();
    }

    public function handle(SocialAccountService $socialAccountService, $provider)
    {
        $user = $socialAccountService->createOrGetUser(
            Socialite::driver($provider)
                ->stateless()
                ->user(),
            $provider);

        $token = $this->tokenizer->buildFrom($user);

        return $this->logged($user, $token);
    }

    public function register(Request $request)
    {
        if ('GET' === $request->method()) {
            return view('auth.register');
        }

        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return view('auth.register')->withErrors($validator)->with($request->all());
        }

        User::createFromRegister($request->all());

        return redirect()->route('auth.login.get');
    }

    public function login(Request $request)
    {
        if ('GET' === $request->method()) {
            return view('auth.login');
        }

        $user = User::where($request->only('email'))->first();

        if ( ! is_null($user) && Hash::check($request->get('password'), $user->password)) {
            return "You are logged, dear {$user->name}";
        }

        return view('auth.login')->with(['auth_fails' => true]);
    }

    private function logged(User $user, $token)
    {
        $cookie = new Cookie('token', $token, 0, '/', null, false, false);
        $response = new Response(view('auth.logged')->with($user->toArray()));
        $response->withCookie($cookie);

        return $response;
    }
}
