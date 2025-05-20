<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userIndex()
    {
        $pakets = Paket::all(); // semua paket yang tersedia
        $userPakets = auth()->user()->pakets; // ambil paket milik user dari tabel aktif_pakets

        return view('UserPage.DashboardPage', compact('pakets', 'userPakets'));
    }


    public function OrderPaket($id)
    {
        $OrderPakets = Paket::findOrFail($id);
        return view('UserPage.OrderPackagePage', compact('OrderPakets'));
    }

    public function adminIndex()
    {
        return view('dashboard'); // Breeze dashboard view
    }
}
