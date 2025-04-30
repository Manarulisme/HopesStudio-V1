<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Http\Requests\StorePaketRequest;
use App\Http\Requests\UpdatePaketRequest;
use Illuminate\Contracts\View\View;
use App\Models\AktifPaket;
use App\Models\Pembayaran;

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

    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        // Check if the user is authorized to update the paket
        $this->authorize('update', $paket);

        // Validate the request
        $validatedData = $request->validated();

        // Update the paket
        $paket->update($validatedData);

        // Redirect to index paket with success message
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
    {      // Get packages with status 'aktif' and 'pending'
        $pakets = AktifPaket::where(function ($query) {
            $query->where('status_paket', 'aktif')
                ->orWhere('status_paket', 'pending');
        })
            ->where('sisa_sesi', '>', 0)
            ->get();

        return view('UserPage.ActivePackagePage', compact('pakets'));
    }

    public function orderPaket()
    {
        return view('UserPage.OrderPackagePage');
    }
}
