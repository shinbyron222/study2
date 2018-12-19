<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class GLoginController extends Controller
{
    /* google auth login controller */
    public function redirectToProvider()
    {
        return \Socialite::driver('google')->redirect();
    }


    public function handleProviderCallback()
    {
        try {
            $user = \Socialite::driver('google')->user();

            \Auth::loginUsingId($user->getId());
            return redirect()->route('home');

            // auth()->login($user, true);
            // dd($user);
        } catch (\Exception $e) {
            return redirect('/login');
        }
    }
}
