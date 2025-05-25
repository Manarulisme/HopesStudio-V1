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
use App\Http\Controllers\BookJadwalController;
use App\Http\Controllers\CarouselImagesController;
use App\Http\Controllers\KehadiranController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;


// Public routes
Route::get('/', [BerandaController::class, 'index'])->name('beranda_user');
Route::get('/login-user', [BerandaController::class, 'login'])->name('login_user');
Route::post('/login-user', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register-user', [BerandaController::class, 'register'])->name('register_user');
Route::post('/register-user', [BerandaController::class, 'postRegister'])->name('register_user_post');
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

    // Route::post('/admin/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
    // Route Resource User
    Route::resource('/admin/user', UserController::class);
    // Route Resource Admin
    Route::resource('/admin/admin', ProfileController::class);
    Route::post('/pembayarans/{id}/approve', [PembayaranController::class, 'approve'])->name('pembayarans.approve');
    Route::get('/admin/carousel_images/create', [CarouselImagesController::class, 'create'])->name('create_carousel_images');
    Route::post('/admin/carousel_images', [CarouselImagesController::class, 'store'])->name('store_carousel_images');
    Route::get('/admin/carousel_images', [CarouselImagesController::class, 'index'])->name('index_carousel_images');
    Route::delete('admin/carousel_images/{id}', [CarouselImagesController::class, 'destroy'])->name('carousel_images.destroy');
    Route::get('/admin/kehadiran_user', [KehadiranController::class, 'index'])->name('kehadiran_user');
    Route::patch('admin/kehadiran_user/{id}/status', [KehadiranController::class, 'statusKehadiran'])->name('kehadiran.status');



});

// User routes
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/dashboard-user', [DashboardController::class, 'userIndex'])->name('dashboard_user');
    // Order Paket
    Route::resource('order-paket', OrderPaketController::class);
    Route::get('/pay-package/{id}', [OrderPaketController::class, 'showPayPackagePage'])->name('show_pay_package');
    Route::resource('profil-user', UserProfilController::class);
    Route::get('/paket-user', [PaketController::class, 'aktifPaket'])->name('paket_user');
    Route::get('/konfirmasi-pembayaran-user/{id}', [PembayaranController::class, 'konfirmasiPembayaran'])->name('konfirmasi_pembayaran_user');
    Route::match(['post', 'patch'], '/pembayaran-user', [PembayaranController::class, 'sendKonfirmasiPembayaran'])->name('sendKonfirmasiPembayaran');
    Route::get('/pembayaran-user/{id}', [PembayaranController::class, 'bayarPaket'])->name('pembayaran_user');
    Route::get('/sunting-profil', [UserController::class, 'SuntingProfil'])->name('sunting_profil_user');
    Route::get('/order-schedule', [JadwalController::class, 'orderSchedule'])->name('order_schedule_user');
    Route::get('/order-paket', [PaketController::class, 'orderPaket'])->name('order_paket_user');
    Route::resource('/booking-jadwal', BookJadwalController::class);
    Route::post('/booking-jadwal', [BookJadwalController::class, 'bookingJadwal'])->name('booking_jadwal_user');
    Route::get('/jadwal-user', [JadwalController::class, 'listSchedule'])->name('jadwal_user');
    Route::get('/jadwal-user/cari', [JadwalController::class, 'searchSchedule'])->name('jadwal_search');
    Route::get('/show-jadwal-user/{id}', [JadwalController::class, 'showSchedule'])->name('show_jadwal_user');
    Route::get('/detail-artikel/{slug}', [ArtikelController::class, 'detailArtikel'])->name('detail_artikel_user');
    Route::get('/list-artikel', [ArtikelController::class, 'listArtikel'])->name('list_artikel_user');

    // Add this route if it doesn't exist

});

Route::get('/link-storage', function () {
    try {
        Artisan::call('storage:link');
        return 'Storage link created successfully.';
    } catch (\Exception $e) {
        return 'Error: ' . $e->getMessage();
    }
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
