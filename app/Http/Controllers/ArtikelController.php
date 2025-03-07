<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //list Artikel
        $artikels = Artikel::all();
        return view('AdminPage.Artikel.IndexArtikel', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AdminPage.Artikel.CreateArtikel');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtikelRequest $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar_utama' => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('gambar_utama')) {
            $gambar_utama = $request->file('gambar_utama');
            $path = $gambar_utama->store('Assets/Images/gambar_utama', 'public');
        } else {
            return redirect()->back()->withErrors(['gambar_utama' => 'File upload failed.']);
        }

        Artikel::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar_utama' => $path,
            'user_id' => Auth::id(),
            'slug' => Str::slug($request->judul),
        ]);
        return redirect()->route('artikel.index')->with('success', 'Artikel created successfully.');
    }
    /**
     * Display the specified resource.
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtikelRequest $request, Artikel $artikel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artikel $artikel)
    {
        //
    }

    public function detailartikel()
    {
        return view('UserPage.DetailArtikelPage');
    }

    public function listArtikel()
    {
        return view('UserPage.ListArtikelPage');
    }
}
