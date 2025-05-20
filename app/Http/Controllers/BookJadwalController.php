<?php

namespace App\Http\Controllers;

use App\Models\BookJadwal;
use App\Http\Requests\StoreBookJadwalRequest;
use App\Http\Requests\UpdateBookJadwalRequest;
use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\AktifPaket;
use Illuminate\Support\Facades\DB;



class BookJadwalController extends Controller
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
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookJadwalRequest $request)
    {

        //validate form input jadwal_id
        $request->validated();

        $bookjadwal = BookJadwal::create([
            'jadwal_id' => $request->jadwal_id,
            'user_id' => Auth::user()->id,
            'aktif_paket_id' => Auth::user()->aktifPakets()->where('status_paket', 'aktif')->first()->id,
            'status' => 'selesai',
            //tanggal_booking = kolom tanggal di jadwals
            'tanggal_booking' => Jadwal::find($request->jadwal_id)->tanggal

        ]);

        //Update aktif_pakets table kolom sisa_sesi -1
        AktifPaket::where('id', $bookjadwal->aktif_paket_id)->update(['sisa_sesi' => $bookjadwal->aktifPaket->sisa_sesi - 1]);

        //if aktif_pakets sisa_sesi = 0, update status_paket to nonaktif
        if ($bookjadwal->aktifPaket->sisa_sesi == 0) {
            AktifPaket::where('id', $bookjadwal->aktif_paket_id)->update(['status_paket' => 'nonaktif']);
        }

        //Update Jadwal table kolom jumlah_peserta +1
        Jadwal::where('id', $bookjadwal->jadwal_id)->update(['jumlah_peserta' => $bookjadwal->jadwal->jumlah_peserta + 1]);

       //update Jadwal table kolom kuota -1
        Jadwal::where('id', $bookjadwal->jadwal_id)->update(['kuota' => $bookjadwal->jadwal->kuota - 1]);

        //if Jadwal kuota = 0, update status to nonaktif
        if ($bookjadwal->jadwal->kuota == 0) {
            Jadwal::where('id', $bookjadwal->jadwal_id)->update(['status' => 'nonaktif']);
        }


        return redirect()->route('paket_user');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {   $detailjadwal = Jadwal::findOrFail($id);
        return view('UserPage.OrderScedulePage', compact('detailjadwal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookJadwal $bookJadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookJadwalRequest $request, BookJadwal $bookJadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookJadwal $bookJadwal)
    {
        //
    }

    public function bookingJadwal(Request $request)
{
    $request->validate([
        'jadwal_id' => 'required|exists:jadwals,id',
    ]);

    DB::beginTransaction();

    try {
        $user = Auth::user();
        $jadwal = Jadwal::findOrFail($request->jadwal_id);
        $aktifPaket = $user->aktifPakets()->where('status_paket', 'aktif')->firstOrFail();

        // Cek kuota & sisa sesi
        if ($jadwal->kuota <= 0) {
            return back()->with('error', 'Kuota sesi ini sudah penuh.');
        }

        if ($aktifPaket->sisa_sesi <= 0) {
            return back()->with('error', 'Sisa sesi Anda sudah habis.');
        }

        // Simpan booking
        $bookjadwal = BookJadwal::create([
            'jadwal_id'       => $jadwal->id,
            'user_id'         => $user->id,
            'aktif_paket_id'  => $aktifPaket->id,
            'status'          => 'selesai',
            'tanggal_booking' => $jadwal->tanggal,
        ]);

        // Kurangi sisa sesi dan refresh data
        $aktifPaket->decrement('sisa_sesi');
        $aktifPaket->refresh();

        // Jika sisa sesi sudah habis, update status paket jadi nonaktif
        if ($aktifPaket->sisa_sesi <= 0) {
            $aktifPaket->update(['status_paket' => 'nonaktif']);
        }

        // Update jadwal peserta dan kuota
        $jadwal->increment('peserta');
        $jadwal->decrement('kuota');
        $jadwal->refresh();

        // Jika kuota sudah habis, update status jadwal jadi nonaktif
        if ($jadwal->kuota <= 0) {
            $jadwal->update(['status' => 'nonaktif']);
        }

        DB::commit();

        return redirect()->route('paket_user')->with('success', 'Booking berhasil!');
    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Terjadi kesalahan saat booking: ' . $e->getMessage());
    }
}

}
