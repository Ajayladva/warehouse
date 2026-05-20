<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\Viewcontroller;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginOtpMail;





Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);


Route::post('/verifyOtp', [LoginController::class, 'verifyOtp'])
    ->name('verifyOtp');


Route::get('/otp-page', [LoginController::class, 'showotppage'])
    ->name('showotppage');



Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [Viewcontroller::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/', [Viewcontroller::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/project', [Viewcontroller::class, 'project'])
        ->name('project');

    Route::get('/profile', [Viewcontroller::class, 'profile'])
        ->name('profile');

    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])
        ->name('profile.update');

    Route::post('/profile/password', [ProfileController::class, 'changePassword'])
        ->name('password.change');

    Route::post('/logout', [ProfileController::class, 'logout'])
        ->name('logout');
});



