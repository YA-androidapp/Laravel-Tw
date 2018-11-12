<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Socialite;

class SocialiteController extends Controller
{
    /**
     * Handle Social login request
     *
     * @return response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from Social Logged in.
     * @param $social
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($user) {
            Auth::login($user);
            return redirect()->action('HomeController@index');
        } else {
            if (mb_strtolower($provider) === 'twitter') {
                var_dump($userSocial);die();
                $user = User::create([
                    'email' => $userSocial->getEmail(),
                    'name' => $userSocial->name,
                    'twitter_nickname' => $userSocial->nickname,
                    'twitter_id' => $userSocial->id,
                    'twitter_avatar' => $userSocial->avatar_original,
                ]);
                Auth::login($user);
                return redirect()->action('HomeController@index');
            } else {
                return view('auth.register', ['name' => $userSocial->getName(), 'email' => $userSocial->getEmail()]);
            }
        }
    }
}
