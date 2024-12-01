<?php

use App\Http\Controllers\googleAuthController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

// Route::view('/', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');


Route::get('auth/google',[googleAuthController::class,'redirect'])->name('google-auth');
Route::get('auth/google/call-back',[googleAuthController::class,'callBackUrl']);



require __DIR__.'/auth.php';
