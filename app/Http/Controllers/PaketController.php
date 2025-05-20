<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use Illuminate\Contracts\View\View;
use App\Models\AktifPaket;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class PaketController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $pakets = Paket::all();

        return view('AdminPage.Paket.IndexPaket', compact('pakets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Paket::class);
        return view('AdminPage.Paket.CreatePaket');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaketRequest $request)
    {
        $this->authorize('store', Paket::class);
        //Validate Form
        $request->validated();

        //create paket
        Paket::create($request->all());

        //redirect to index paket
        return redirect()->route('paket.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        return view('AdminPage.Paket.EditPaket', compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, $id): RedirectResponse
    {
        $paket = Paket::findOrFail($id);

        // Check if the user is authorized to update the paket
        $this->authorize('update', $paket);

        // Validate the request data
        $request->validate([
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'jumlah_sesi' => 'required|integer',
            'masa_aktif_hari' => 'required|integer',
            'deskripsi' => 'nullable|string',
        ]);

        // Update the paket
        $paket->update($request->all());

        return redirect()->route('paket.index')->with('success', 'Paket updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);

        // Check if the user is authorized to delete the paket
        $this->authorize('delete', $paket);

        // Check if the paket is associated with any active packages
        $activePaket = AktifPaket::where('paket_id', $paket->id)->first();
        if ($activePaket) {
            $pembayaran = Pembayaran::where('aktif_paket_id', $activePaket->id)->first();
            if ($pembayaran) {
                return redirect()->route('paket.index')->with('error', 'Cannot delete this package as it is associated with an active package that has payments.');
            }
        }

        // Delete the paket
        $paket->delete();

        return redirect()->route('paket.index')->with('success', 'Paket deleted successfully.');
    }

    public function aktifPaket()
    {
        // Get the authenticated user's ID
        $userId = auth()->id();

        // Get packages with status 'aktif' and 'pending' that match the authenticated user's ID
        $pakets = AktifPaket::where(function ($query) {
            $query->where('status_paket', 'aktif')
                ->orWhere('status_paket', 'pending');
        })
            ->where('user_id', $userId)
            ->where('sisa_sesi', '>', 0)
            ->get();

        return view('UserPage.ActivePackagePage', compact('pakets'));
    }

    public function orderPaket()
    {
        return view('UserPage.OrderPackagePage');
    }
}
