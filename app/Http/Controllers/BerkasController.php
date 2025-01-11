<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    public function index()
    {
        return view('berkas');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'nomer_hak' => 'required|string|max:255',
            'luas_tanah' => 'required|integer',
            'tanggal_pengajuan' => 'required|date',
        ]);

        // Create a new Berkas with the authenticated user's ID
        Berkas::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'nomer_hak' => $request->nomer_hak,
            'luas_tanah' => $request->luas_tanah,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Berkas berhasil diunggah');
    }
}
