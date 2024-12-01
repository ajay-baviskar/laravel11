<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class googleAuthController extends Controller
{
    //

    function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    function callBackUrl()
    {
        try {
            $google_id = Socialite::driver('google')->user();

            $user = User::where("google_id", $google_id->getId())->first();

            if (!$user) {
                $newUser =  User::create([
                    "name" => $google_id->getName(),
                    "email" => $google_id->getEmail(),
                    "google_id" => $google_id->getId()
                ]);

                Auth::login($newUser);

                return redirect()->intended('dashboard');
            } else {
                Auth::login($user);
                return redirect()->intended('dashboard');
            }
        } catch (\Throwable $th) {
            dd($th);
            //throw $th;
        }
    }
}
