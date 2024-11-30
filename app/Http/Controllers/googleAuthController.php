<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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
        $google_id = Socialite::driver('google')->user();

        User::where("google_id",$google_id->getId())->first();





    }
}
