<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\SocialAccountService;

class SocialAccountController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback(SocialAccountService $profileService,$provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        }catch (\Exception $e){
            return abort(403, 'Unauthorized action.');
        }
        $authUser = $profileService->findOrCreate($user,$provider);
        auth()->login($authUser,true);
        return redirect()->route('home');
    }
}
