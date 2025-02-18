<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda_user');

Route::get('/login', [BerandaController::class, 'login'])->name('login_user');

Route::get('/register', [BerandaController::class, 'register'])->name('register_user');

Route::get('/forgot', [BerandaController::class, 'forgot'])->name('forgot_user');

Route::get('/send-otp', [BerandaController::class, 'sendOTP'])->name('send_otp_user');

Route::get(('/profil_user'), [UserController::class, 'Profil'])->name('profil_user');



Route::get('/check-timezone', function () {
    return [
        'timezone' => config('app.timezone'),
        'current_time' => now()->toDateTimeString(),
    ];
});
