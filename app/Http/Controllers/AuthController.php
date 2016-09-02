<?php

namespace App\Http\Controllers;

use App\Services\SocialAccountService;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer;
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

    /* @var \Lcobucci\JWT\Builder */
    private $jwtBuilder;
    /* @var \Lcobucci\JWT\Signer */
    private $jwtSigner;

    public function __construct(Builder $jwtBuilder, Signer $jwtSigner)
    {
        $this->jwtBuilder = $jwtBuilder;
        $this->jwtSigner = $jwtSigner;
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

        return $this->logged($user);
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

    private function buildToken(User $user, array $rights = [])
    {
        $now = Carbon::now();
        $expInterval = \DateInterval::createFromDateString(env('JWT_EXPIRATION_TIME', 3600).' seconds');

        $sub = $user->getAttribute('id');
        $iat = $now->timestamp;
        $exp = $now->add($expInterval)->timestamp;

        $builder = $this->jwtBuilder
            ->setSubject($sub)
            ->setIssuedAt($iat)
            ->setExpiration($exp)
            ->set('name', $user->getAttribute('name'));

        foreach ($rights as $name => $value) {
            $builder->set($name, $value);
        }

        $token = $builder
            ->sign($this->jwtSigner, env('JWT_SECRET'))
            ->getToken();

        return $token;
    }

    private function logged(User $user, array $rights = [])
    {
        $token = $this->buildToken($user, $rights);
        $cookie = new Cookie('token', $token, 0, '/', null, false, false);

        return view('auth.logged')->withCookie($cookie);
    }
}
