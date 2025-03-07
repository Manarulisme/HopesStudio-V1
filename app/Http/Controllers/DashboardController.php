<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function userIndex()
    {
        $pakets = Paket::all();
        return view('UserPage.DashboardPage', compact('pakets'));
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
