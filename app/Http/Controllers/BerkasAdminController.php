<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use Illuminate\Http\Request;

class BerkasAdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $berkas = Berkas::query()
            ->where('nama', 'LIKE', "%{$search}%")
            ->orWhere('nik', 'LIKE', "%{$search}%")
            ->orWhere('alamat', 'LIKE', "%{$search}%")
            ->orWhere('nomer_hak', 'LIKE', "%{$search}%")
            ->paginate(10);

        return view('admin.berkas', compact('berkas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nik' => 'required|string|max:16',
            'alamat' => 'required|string',
            'nomer_hak' => 'required|string|max:255',
            'luas_tanah' => 'required|integer',
            'tanggal_pengajuan' => 'required|date',
        ]);

        // Find the existing Berkas by ID
        $berkas = Berkas::findOrFail($id);

        // Update the Berkas with the new data
        $berkas->update([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'alamat' => $request->alamat,
            'nomer_hak' => $request->nomer_hak,
            'luas_tanah' => $request->luas_tanah,
            'tanggal_pengajuan' => $request->tanggal_pengajuan,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Berkas berhasil diupdate');
    }

    public function destroy($id)
    {
        // Find the existing Berkas by ID
        $berkas = Berkas::findOrFail($id);

        // Delete the Berkas
        $berkas->delete();

        return back()->with('success', 'Berkas berhasil dihapus');
    }
}
