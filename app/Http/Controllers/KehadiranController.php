<?php

namespace App\Http\Controllers;

use App\Models\BookJadwal;
use Illuminate\Http\Request;

class KehadiranController extends Controller
{
    public function index()
    {
        $kehadirans = BookJadwal::where('status', 'dipesan')->latest()->paginate(10);
        return view('AdminPage.Kehadiran.IndexKehadiran', compact('kehadirans'));
    }

public function statusKehadiran(Request $request, $id)
{
    $request->validate([
        'status_kehadiran' => 'required|in:selesai,batal',
    ]);

    $kehadiran = BookJadwal::findOrFail($id); // Atau model Kehadiran jika kamu pakai model lain
    $kehadiran->status = $request->status_kehadiran;
    $kehadiran->save();

    return redirect()->back()->with('success', 'Status kehadiran berhasil diperbarui.');
}

}
