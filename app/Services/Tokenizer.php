<?php

namespace App\Services;

use App\Exceptions\InvalidTokenException;
use App\User;
use Carbon\Carbon;
use Lcobucci\JWT\Builder;
use Lcobucci\JWT\Parser;
use Lcobucci\JWT\Signer;
use Lcobucci\JWT\Token;
use Lcobucci\JWT\ValidationData;

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
    /* @var \Lcobucci\JWT\Parser */
    private $parser;
    /* @var \Lcobucci\JWT\ValidationData */
    private $validationData;

    public function __construct(Builder $jwtBuilder,
                                Signer $jwtSigner,
                                Parser $parser,
                                ValidationData $validationData)
    {
        $this->jwtBuilder = $jwtBuilder;
        $this->jwtSigner = $jwtSigner;
        $this->parser = $parser;
        $this->validationData = $validationData;
    }

    public function refreshToken($token)
    {
        $token = $this->parse($token);

        if ( ! $this->isValid($token)) {
            throw new InvalidTokenException();
        }

        $user = $this->userFrom($token);

        return $this->buildFrom($user);
    }

    private function parse($token)
    {
        if (is_null($token)) {
            throw new InvalidTokenException('token could not be null');
        } elseif (is_string($token)) {
            $token = $this->parser->parse($token);
        }

        return $token;
    }

    public function isValid($token)
    {
        $token = $this->parse($token);

        return $token->validate($this->validationData) && $token->verify($this->jwtSigner, env('JWT_SECRET'));
    }

    public function userFrom(Token $token)
    {
        $user = User::findOrFail($token->getClaim('sub'));

        return $user;
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
