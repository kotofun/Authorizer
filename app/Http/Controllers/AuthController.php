<?php

namespace App\Http\Controllers;

use App\Services\SocialAccountService;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Lcobucci\JWT\Builder;

class AuthController extends Controller
{
    /**
     * @var \Lcobucci\JWT\Builder
     */
    private $jwtBuilder;

    /**
     * Create a new controller instance.
     *
     * @param \Lcobucci\JWT\Builder $jwtBuilder
     */
    public function __construct(Builder $jwtBuilder)
    {
        $this->jwtBuilder = $jwtBuilder;
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

    public function register(Request $request)
    {
        if ('GET' === $request->method()) {
            return view('auth.register');
        }

        $validator = Validator::make($request->all(), [
            'last_name' => 'required|alpha',
            'first_name' => 'required|alpha',
            'email' => 'required|confirmed|email|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        if ($validator->fails()) {
            return view('auth.register')->withErrors($validator)->with($request->all());
        }

        User::createFromRegister($request->all());

        return redirect()->route('auth.index');
    }

    public function login(Request $request)
    {
        return view('providers.index');
    }
}
