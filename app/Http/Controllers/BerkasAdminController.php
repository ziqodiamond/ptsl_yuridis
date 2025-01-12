<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berkas;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

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


    public function cetak(Request $request)
    {
        // Validate the month (bulan) and year (tahun) input
        $request->validate([
            'bulan' => 'required|numeric|min:1|max:12',  // Ensure bulan is between 1 and 12
            'tahun' => 'required|numeric',  // Ensure tahun is numeric
        ]);

        // Format the month to be 2 digits
        $bulan = str_pad($request->bulan, 2, '0', STR_PAD_LEFT);

        // Parse the date for the first day of the selected month and year
        $date = $request->tahun . '-' . $bulan . '-01';

        // Get the data for that specific month and year
        $berkas = Berkas::whereMonth('tanggal_pengajuan', $bulan)
            ->whereYear('tanggal_pengajuan', $request->tahun)
            ->get();

        // Prepare the data for the PDF
        $data = [
            'berkas' => $berkas,
            'bulan' => Carbon::createFromFormat('Y-m-d', $date)->locale('id')->isoFormat('MMMM YYYY'),  // "Januari 2025"
            'tahun' => $request->tahun,
        ];

        // Set the path to the logo
        $path = storage_path('app/public/images/logo.png');
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $dataLogo = file_get_contents($path);
        $base64Logo = 'data:image/' . $type . ';base64,' . base64_encode($dataLogo);

        // Add the logo to the data
        $data['logo'] = $base64Logo;

        // Generate the PDF with the data passed to the view
        $pdf = Pdf::loadView('admin.laporan.template', $data)->setPaper('a4', 'portrait');

        // Stream the PDF for download or inline viewing
        return $pdf->stream('laporan-berkas.pdf');
    }
}
