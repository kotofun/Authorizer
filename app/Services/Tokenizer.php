<?php

namespace App\Services;

use App\User;
use Carbon\Carbon;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Signer;

/**
 * Class Authorizer.
 *
 * @author Dmitry Basavin <basavind@gmail.com>
 */
class Tokenizer
{
    /* @var \Lcobucci\JWT\Builder */
    private $jwtBuilder;
    /* @var \Lcobucci\JWT\Signer */
    private $jwtSigner;

    public function __construct(Builder $jwtBuilder, Signer $jwtSigner)
    {
        $this->jwtBuilder = $jwtBuilder;
        $this->jwtSigner = $jwtSigner;
    }

    public function buildFrom(User $user, array $rights = [])
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
}
