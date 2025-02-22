<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserController;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda_user');

Route::get('/login', [BerandaController::class, 'login'])->name('login_user');

Route::get('/register', [BerandaController::class, 'register'])->name('register_user');

Route::get('/forgot', [BerandaController::class, 'forgot'])->name('forgot_user');

Route::get('/send-otp', [BerandaController::class, 'sendOTP'])->name('send_otp_user');

Route::get('/reset-password', [BerandaController::class, 'ResetPassword'])->name('reset_password_user');

Route::get('/profil-user', [UserController::class, 'Profil'])->name('profil_user');

Route::get('/dashboard-user', [DashboardController::class, 'index'])->name('dashboard_user');

Route::get('/paket-user', [PaketController::class, 'index'])->name('paket_user');

Route::get('/konfirmasi-pembayaran', [PembayaranController::class, 'konfirmasiPembayaran'])->name('konfirmasi_pembayaran_user');

Route::get('/pembayaran-user', [PembayaranController::class, 'bayarPaket'])->name('pembayaran_user');

Route::get('/sunting-profil', [UserController::class, 'SuntingProfil'])->name('sunting_profil_user');

Route::get('/order-schedule', [JadwalController::class, 'orderSchedule'])->name('order_schedule_user');

Route::get('/order-paket', [PaketController::class, 'orderPaket'])->name('order_paket_user');

Route::get('/jadwal-user', [JadwalController::class, 'listSchedule'])->name('jadwal_user');






Route::get('/check-timezone', function () {
    return [
        'timezone' => config('app.timezone'),
        'current_time' => now()->toDateTimeString(),
    ];
});
