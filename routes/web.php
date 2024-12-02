<?php

use App\Http\Controllers\googleAuthController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('/', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::view('dashboard', 'dashboard')
    ->middleware(['isAdmin','auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth','isAdmin'])
    ->name('profile');


Route::get('auth/google',[googleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[googleAuthController::class,'callBackUrl']);

Route::get('greeting',function ()
{
    return view('greeting',["name"=>"Ajay Baviskar"]);
});

Route::view('test-view','home');
Route::view('logins','login');
Route::post('logins',[UserController::class,'login']);
Route::get('logout',[UserController::class,'logout']);


Route::view('profiles','profiles');
require __DIR__.'/auth.php';
