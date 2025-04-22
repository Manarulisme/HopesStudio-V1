<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Http\Requests\StorePembayaranRequest;
use App\Http\Requests\UpdatePembayaranRequest;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //list Konfiramsi Pembayaran
        $pembayarans = Pembayaran::all();
        return view('AdminPage.Konfirmasi.IndexKonfirmasi', compact('pembayarans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('AdminPage.Konfirmasi.CreateKonfirmasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembayaranRequest $request)
    {
        // //validasi pembayaran
        // $validated = $request->validated();
        // //upload bukti pembayaran ke local storage
        // $path = $request->file('bukti_pembayaran')->store('Assets/Images/bukti_pembayaran', 'public');
        // //create pembayaran
        // Pembayaran::create([
        //     'kode_pembayaran' => $request->kode_pembayaran,
        //     'nama_pengirim' => $request->nama_pengirim,
        //     'bukti_pembayaran' => $path,
        //     'status_pembayaran' => $request->status_pembayaran,
        //     'tanggal_pembayaran' => $request->tanggal_pembayaran,
        // ]);
        // return redirect()->route('pembayaran.index')->with('success', 'Pembayaran created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembayaranRequest $request, Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        //
    }

    public function konfirmasiPembayaran($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        return view('UserPage.ConfirmPayPage', ['pembayaran' => $pembayaran]);
    }

    public function sendKonfirmasiPembayaran(Request $request)
    {
        // Validate the request data
        $request->validate([
            'kode_pembayaran' => 'required|string|max:255',
            'nama_pengirim' => 'required|string|max:255',
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanggal_pembayaran' => 'required|date',
        ]);

        // Upload the payment proof to local storage
        $path = $request->file('bukti_pembayaran')->store('Assets/Images/bukti_pembayaran', 'public');

        // Create or update the payment record in the Pembayarans table
        $pembayaran = Pembayaran::updateOrCreate(
            ['kode_pembayaran' => $request->kode_pembayaran], // Match by kode_pembayaran
            [
            'nama_pengirim' => $request->nama_pengirim,
            'bukti_pembayaran' => $path,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            ]
        );

        return redirect()->route('paket_user')->with('success', 'Payment confirmation sent successfully.');
    }

    public function bayarPaket()
    {
        return view('UserPage.PayPackagePage');
    }
}
