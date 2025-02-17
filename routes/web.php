<?php

use App\Http\Controllers\BerandaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [BerandaController::class, 'index']);

Route::get('/login', [BerandaController::class, 'login']);

Route::get('/check-timezone', function () {
    return [
        'timezone' => config('app.timezone'),
        'current_time' => now()->toDateTimeString(),
    ];
});
