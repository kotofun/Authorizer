<?php

namespace App\Services;

use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser($providerName, ProviderUser $providerUser, User $authoredUser = null)
    {
        if ($socialAccount = $this->socialAccountFor($providerName, $providerUser)) {
            $authoredUser = $socialAccount->user;
        } else {
            if (is_null($authoredUser)) {
                $authoredUser = $this->createNewUser();
            }

            $socialAccount = $this->createSocialAccount($providerName, $providerUser);
            $this->attachSocialAccount($authoredUser, $socialAccount);
        }

        return $authoredUser->fresh();
    }

    private function socialAccountFor($providerName, ProviderUser $providerUser)
    {
        return SocialAccount::findByProvider($providerName, $providerUser->getId())
            ->first();
    }

    private function createNewUser()
    {
        return User::create();
    }

    private function createSocialAccount($providerName, ProviderUser $providerUser)
    {
        // Create social account if social account for user does not exists
        $socialAccount = SocialAccount::create([
            'provider' => $providerName,
            'provider_user_id' => $providerUser->getId(),
            'token' => $providerUser->token,
            'refresh_token' => $providerUser->refreshToken,
            'expires_in' => $providerUser->expiresIn,
            'nickname' => $providerUser->getNickname(),
            'name' => $providerUser->getName(),
            'email' => $providerUser->getEmail(),
            'avatar' => $providerUser->getAvatar(),
        ]);

        return $socialAccount;
    }

    private function attachSocialAccount(User $authoredUser, SocialAccount $socialAccount)
    {
        $socialAccount->user()->associate($authoredUser);
        $socialAccount->save();

        return $authoredUser;
    }
}
