<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Http\Requests\StoreArtikelRequest;
use App\Http\Requests\UpdateArtikelRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

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
            'type' => $request->type,
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
    public function edit(string $id)
    {

        // Ambil artikel berdasarkan ID
        $artikel = Artikel::findOrFail($id);
        // Tampilkan halaman edit dengan data artikel


        return view('AdminPage.Artikel.EditArtikel', compact('artikel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar_utama' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:4000',

        ]);
        // Retrieve the article by its ID
        $artikel = Artikel::findOrFail($id);

        // Validate the request
        // Handle file upload for gambar_utama
        if ($request->hasFile('gambar_utama')) {
            // Delete the old image if it exists
            if ($artikel->gambar_utama && Storage::exists('public/' . $artikel->gambar_utama)) {
                Storage::delete('public/' . $artikel->gambar_utama);
            }

            // Store the new image
            $gambar_utama = $request->file('gambar_utama');
            $path = $gambar_utama->store('Assets/Images/gambar_utama', 'public');
        } else {
            // Use the existing image if no new image is uploaded
            $path = $artikel->gambar_utama;
        }

        // Update the article
        $artikel->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar_utama' => $path,
            'slug' => Str::slug($request->judul),
            'type' => $request->type,
        ]);

        return redirect()->route('artikel.index')->with('success', 'Artikel updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus gambar utama dari storage jika ada
        if ($artikel->gambar_utama && \Storage::exists('public/' . $artikel->gambar_utama)) {
            \Storage::delete('public/' . $artikel->gambar_utama);
        }

        // Hapus artikel dari database
        $artikel->delete();

        return redirect()->route('artikel.index')->with('success', 'Artikel berhasil dihapus.');
    }

    public function detailartikel($slug)
    {
        // Retrieve the article by its slug
        $artikel = Artikel::where('slug', $slug)->firstOrFail();
        $headline = Artikel::where('slug', $slug)->firstOrFail();
        //show artikel berdasarkan kolom slug dan type=headline

        return view('UserPage.DetailArtikelPage', compact('artikel', 'headline'));
    }

    public function listArtikel()
    {
        //list Artikel
        $headlines = Artikel::where('type', 'headline')->get();
        $artikels = Artikel::all();
        return view('UserPage.ListArtikelPage', compact('artikels', 'headlines'));
    }
}
