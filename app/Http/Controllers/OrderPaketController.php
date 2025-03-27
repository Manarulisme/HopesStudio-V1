<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Contracts\View\View;
use App\Models\AktifPaket;
use Illuminate\Support\Facades\Auth;
use App\Models\Pembayaran;
use Illuminate\Http\Request;

class OrderPaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'OrderPakets_id' => 'required|exists:pakets,id',
        ]);

        $package = Paket::findOrFail($request->OrderPakets_id);
        $user = Auth::user();

        // Save to pembayarans table
        $pembayaran = Pembayaran::create([
            'kode_pembayaran' => 'PAY-' . strtoupper(uniqid()),
            'nama_pengirim' => $user->name,
            'bukti_pembayaran' => null, // This can be updated later with the actual payment proof
            'status_pembayaran' => 'pending',
            'tanggal_pembayaran' => now(),
            'user_id' => $user->id,
            'paket_id' => $package->id,
        ]);

        // Save to aktif_pakets table
        AktifPaket::create([
            'status_paket' => 'pending',
            'sisa_sesi' => $package->jumlah_sesi,
            'tanggal_aktif' => now(),
            'tanggal_kadaluarsa' => now()->addMonths(1), // Example expiration date
            'user_id' => $user->id,
            'paket_id' => $package->id,
            'pembayaran_id' => $pembayaran->id,
        ]);

        return redirect()->route('paket_user')->with('success', 'Paket berhasil dipesan.');
    }

    public function showPayPackagePage($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('UserPage.PayPackagePage', compact('pembayaran'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $OrderPakets = Paket::findOrFail($id);
        return view('UserPage.OrderPackagePage', compact('OrderPakets'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
