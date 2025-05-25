<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;
use App\Models\CarouselImage;
use App\Models\BookJadwal;
use App\Models\AktifPaket;
use Carbon\Carbon;
use App\Models\User;

class DashboardController extends Controller
{
public function userIndex()
{
    $pakets = Paket::all(); // Semua paket yang tersedia
    $userPakets = auth()->user()->pakets; // Ambil paket milik user dari tabel pivot/relasi

    // Ambil gambar carousel dari kategori "info image utama"
    $carouselImages = CarouselImage::with('category')
        ->whereHas('category', function ($query) {
            $query->where('name', 'info image utama');
        })
        ->latest()
        ->get();

    return view('UserPage.DashboardPage', compact('pakets', 'userPakets', 'carouselImages'));
}


    public function OrderPaket($id)
    {
        $OrderPakets = Paket::findOrFail($id);
        return view('UserPage.OrderPackagePage', compact('OrderPakets'));
    }

public function adminIndex()
{
    $today = now();
    $bookJadwals = BookJadwal::all();

    $paketHariIni = AktifPaket::whereDate('created_at', $today)->count();
    $paketBulanIni = AktifPaket::whereMonth('created_at', $today->month)->whereYear('created_at', $today->year)->count();
    $paketTahunIni = AktifPaket::whereYear('created_at', $today->year)->count();

    $jadwalHariIni = BookJadwal::whereDate('created_at', $today)->count();
    $jadwalBulanIni = BookJadwal::whereMonth('created_at', $today->month)->whereYear('created_at', $today->year)->count();
    $jadwalTahunIni = BookJadwal::whereYear('created_at', $today->year)->count();

    $userHariIni = User::whereDate('created_at', $today)->count();
    $userBulanIni = User::whereMonth('created_at', $today->month)->whereYear('created_at', $today->year)->count();
    $userTahunIni = User::whereYear('created_at', $today->year)->count();

    return view('dashboard', compact(
        'paketHariIni', 'paketBulanIni', 'paketTahunIni',
        'jadwalHariIni', 'jadwalBulanIni', 'jadwalTahunIni',
        'userHariIni', 'userBulanIni', 'userTahunIni'
    ));
}
}
