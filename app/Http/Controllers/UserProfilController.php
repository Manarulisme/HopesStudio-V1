<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class UserProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('UserPage.ProfilPage');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $user = User::findOrFail($id);
        return view('UserPage.SuntingProfilPage', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
        public function update(Request $request, string $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'nik' => 'nullable|string|max:255',
                'alamat' => 'nullable|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'no_telepon' => 'nullable|string|max:255',
                'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $user = User::findOrFail($id);

            if ($request->hasFile('foto_profil') && $request->file('foto_profil')->isValid()) {
                $foto_profil = $request->file('foto_profil');

                // Ensure the directory exists
                if (!file_exists(public_path('Assets/Images/foto_profil'))) {
                    mkdir(public_path('Assets/Images/foto_profil'), 0755, true);
                }

                // Move the new file
                $foto_profil->move(public_path('Assets/Images/foto_profil'), $foto_profil->hashName());

                // Delete the old file if it exists
                if ($user->foto_profil) {
                    $oldFilePath = public_path('Assets/Images/foto_profil/' . $user->foto_profil);
                    if (file_exists($oldFilePath)) {
                        unlink($oldFilePath);
                    }
                }

                // Update user with the new file
                $user->update([
                    'foto_profil' => $foto_profil->hashName(),
                    'name' => $request->name,
                    'nik' => $request->nik,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                ]);
            } else {
                // Update user without the file
                $user->update([
                    'name' => $request->name,
                    'nik' => $request->nik,
                    'alamat' => $request->alamat,
                    'email' => $request->email,
                    'no_telepon' => $request->no_telepon,
                ]);
            }

            return redirect()->route('profil-user.index')->with('success', 'Profile updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
