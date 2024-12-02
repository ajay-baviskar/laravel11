<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
function login (Request $request)
{
    $request->session()->put('email',  $request->input('email'));
    return redirect('profiles');

}


function logout()
{
    session()->pull('email');
    return redirect('profiles');

}
}
