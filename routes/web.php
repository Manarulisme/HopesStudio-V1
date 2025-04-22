<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\OrderPaketController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', [BerandaController::class, 'index'])->name('beranda_user');
Route::get('/login-user', [BerandaController::class, 'login'])->name('login_user');
Route::post('/login-user', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register-user', [BerandaController::class, 'register'])->name('register_user');
Route::get('/forgot-user', [BerandaController::class, 'forgot'])->name('forgot_user');
Route::get('/send-otp', [BerandaController::class, 'sendOTP'])->name('send_otp_user');
Route::get('/reset-password-user', [BerandaController::class, 'ResetPassword'])->name('reset_password_user');

// Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'adminIndex'])->name('dashboard_admin');
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    // Route Resource Paket
    Route::resource('/admin/paket', PaketController::class);
    // Route Resource Jadwal
    Route::resource('/admin/jadwal', JadwalController::class);
    // Route Resource Pembayaran
    Route::resource('/admin/pembayaran', PembayaranController::class);
    // Route Resource Artikel
    Route::resource('/admin/artikel', ArtikelController::class);
    // Route Resource User
    Route::resource('/admin/user', UserController::class);
    // Route Resource Admin
    Route::resource('/admin/admin', ProfileController::class);

});

// User routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard-user', [DashboardController::class, 'userIndex'])->name('dashboard_user');
    // Order Paket
    Route::resource('order-paket', OrderPaketController::class);
    Route::get('/pay-package/{id}', [OrderPaketController::class, 'showPayPackagePage'])->name('show_pay_package');
    Route::resource('profil-user', UserProfilController::class);
    Route::get('/paket-user', [PaketController::class, 'aktifPaket'])->name('paket_user');
    Route::get('/pembayaran-user/{id}', [PembayaranController::class, 'konfirmasiPembayaran'])->name('konfirmasi_pembayaran_user');
    Route::match(['post', 'patch'], '/pembayaran-user', [PembayaranController::class, 'sendKonfirmasiPembayaran'])->name('sendKonfirmasiPembayaran');
    Route::get('/pembayaran-user', [PembayaranController::class, 'bayarPaket'])->name('pembayaran_user');
    Route::get('/sunting-profil', [UserController::class, 'SuntingProfil'])->name('sunting_profil_user');
    Route::get('/order-schedule', [JadwalController::class, 'orderSchedule'])->name('order_schedule_user');
    Route::get('/order-paket', [PaketController::class, 'orderPaket'])->name('order_paket_user');
    Route::get('/jadwal-user', [JadwalController::class, 'listSchedule'])->name('jadwal_user');
    Route::get('/cari-jadwal', [JadwalController::class, 'cariSchedule'])->name('cari_jadwal_user');
    Route::get('/show-jadwal-user/{id}', [JadwalController::class, 'showSchedule'])->name('show_jadwal_user');
    Route::get('/detail-artikel/{slug}', [ArtikelController::class, 'detailArtikel'])->name('detail_artikel_user');
    Route::get('/list-artikel', [ArtikelController::class, 'listArtikel'])->name('list_artikel_user');
    Route::get('/jadwal/search', [JadwalController::class, 'cariSchedule'])->name('jadwal_search');
});


// Define a common dashboard route that redirects based on user role
Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user && $user->role === 'admin') {
        return redirect()->route('dashboard_admin');
    } elseif ($user && $user->role === 'user') {
        return redirect()->route('dashboard_user');
    }
    return redirect('/');
})->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/check-timezone', function () {
    return response()->json([
        'timezone' => config('app.timezone'),
        'current_time' => now()->toDateTimeString(),
    ]);
});
