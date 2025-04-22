<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Http\Requests\StoreJadwalRequest;
use App\Http\Requests\UpdateJadwalRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   //baca variabel jadwal
        $jadwals = Jadwal::all();
        //Redirect ke Index Jadwal
        return view('AdminPage.Jadwal.IndexJadwal', compact('jadwals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminPage.Jadwal.CreateJadwal');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tanggal' => 'required|date',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            // validasi foto ruangan bisa berupa jpg, jpeg, png, dan webp
            'foto_ruangan' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'trainer' => 'required|string|max:255',
            'jenis_pelatihan' => 'required|string',
            'kuota' => 'required|integer',
            'ruang' => 'required|string|max:255'
        ]);

        if ($request->hasFile('foto_ruangan')) {
            $foto_ruangan = $request->file('foto_ruangan');
            $path = $foto_ruangan->store('Assets/Images/foto_ruangan', 'public');
        } else {
            return redirect()->back()->withErrors(['foto_ruangan' => 'File upload failed.']);
        }

        Jadwal::create([
            'tanggal' => $request->tanggal,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
            'trainer' => $request->trainer,
            'foto_ruangan' => $path,
            'jenis_pelatihan' => $request->jenis_pelatihan,
            'kuota' => $request->kuota,
            'ruang' => $request->ruang
        ]);


        return redirect()->route('jadwal.index')->with('success', 'Jadwal created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jadwal $jadwal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJadwalRequest $request, Jadwal $jadwal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jadwal $jadwal)
    {
        // Delete the associated image file from storage
        if ($jadwal->foto_ruangan) {
            Storage::disk('public')->delete($jadwal->foto_ruangan);
        }

        // Delete the jadwal record from the database
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal deleted successfully.');
    }

    public function listSchedule()
    {
        // Retrieve today's schedule from the jadwal table
        $jadwals = Jadwal::whereDate('tanggal', now()->toDateString())->get();
        return view('UserPage.SchedulePage', compact('jadwals'));
    }

    public function orderSchedule()
    {
        return view('UserPage.OrderScedulePage');
    }

    public function cariSchedule(Request $request)
    {
         // Validate the input date
    $request->validate([
        'tanggal' => 'required|date',
    ]);

    // Retrieve jadwals based on the provided date
    $carjadwals = Jadwal::whereDate('tanggal', $request->tanggal)->get();

        return view('UserPage.CariSchedulePage', compact('carjadwals'));
    }

    public function showSchedule($id)
    {
        // Find the schedule by ID
        $jadwals = Jadwal::findOrFail($id);

        // Return the view with the schedule data
        return view('UserPage.OrderScedulePage', compact('jadwals'));
    }



}
