<?php
namespace App;

use App\Models\SocialAccount;
use App\Models\User;
use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService
{
    public function findOrCreate(ProviderUser $providerUser,$provider)
    {
        $account = SocialAccount::whereProviderId($providerUser->getId())
            ->whereProviderName($provider)
            ->first();
        if ($account)
            return $account->user;

        $user = User::whereEmail($providerUser->getEmail())->first();
        if (!$user){
            $user = User::create([
                'email' => $providerUser->getEmail(),
                'name' => $providerUser->getName(),
            ]);
        }
        $user->accounts()->create([
            'email' => $providerUser->getEmail(),
            'provider_name' => $provider,
            'provider_id' => $providerUser->getId(),
            'avatar' => $providerUser->getAvatar(),
        ]);
        return $user;

    }

}
