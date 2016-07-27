<?php

namespace App\Services;

use App\SocialAccount;
use App\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function createOrGetUser(ProviderUser $providerUser, $providerName)
    {
        $account = SocialAccount::findByProvider($providerName, $providerUser->getId())
            ->first();

        if ($account) {
            return $account->user;
        }
        $account = SocialAccount::create([
            'provider' => $providerName,
            'provider_user_id' => $providerUser->getId(),
        ]);

        $user = User::where('email', $providerUser->getEmail())
            ->first();

        if ( ! $user) {
            User::createBySocialProvider($providerUser);
        }

        $account->user()->associate($user);
        $account->save();

        return $user;
    }
}
