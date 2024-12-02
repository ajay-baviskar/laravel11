<?php

use App\Http\Controllers\googleAuthController;
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


require __DIR__.'/auth.php';
