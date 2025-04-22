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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaketRequest $request, Paket $paket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
        //
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
