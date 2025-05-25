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
        //list Konfiramsi Pembayaran berdasarkan status_pembayaran 'pending'
        //baca variabel pembayaran
        $pembayarans = Pembayaran::where('status_pembayaran', 'pending')
            ->latest()
            ->paginate(10);
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
    public function approve($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);

        // Check permission using policy
        if (!auth()->user()->can('update', $pembayaran)) {
            abort(403, 'Unauthorized action.');
        }

        // Update payment status in pembayarans table
        $pembayaran->status_pembayaran = 'approved';
        $pembayaran->save();

        // Update status_paket in aktif_pakets table using Eloquent relationship
        $pembayaran->aktifPaket()->update(['status_paket' => 'aktif']);

        return redirect()->back()->with('success', 'Status pembayaran dan paket berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembayaran $pembayaran)
    {
        // Hapus data di tabel aktif_pakets yang terkait dengan pembayaran ini
        $pembayaran->aktifPaket()->delete();

        // Hapus data di tabel pembayarans
        $pembayaran->delete();

        return redirect()->route('pembayaran.index')->with('success', 'Pembayaran dan data terkait berhasil dihapus.');
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

    public function bayarPaket($id)
    {
        $pembayaran = Pembayaran::with('paket')->findOrFail($id);
        return view('UserPage.PayPackagePage', ['pembayaran' => $pembayaran]);
    }
}
