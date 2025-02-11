<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/check-timezone', function () {
    return [
        'timezone' => config('app.timezone'),
        'current_time' => now()->toDateTimeString(),
    ];
});
