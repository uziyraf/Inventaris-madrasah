<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::paginate(10);

        // Komen dulu return view-nya
        return view('murid', compact('santris'));        // Ganti jadi ini buat nampilin data mentah:
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_induk' => 'required|unique:santris',
            'nama_santri' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'kelas' => 'required',
            'status' => 'required',
            'nama_orangtua' => 'required',
            'asal_madin' => 'required',
        ]);

        Santri::create($request->all());

        return redirect()->back()->with('success', 'Data santri berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);
        $santri->update($request->all());

        return redirect()->back()->with('success', 'Data santri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->back()->with('success', 'Data santri berhasil dihapus');
    }

    public function exportCsv()
    {
        $santris = Santri::latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=data_murid.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['No. Induk', 'Nama Santri', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Alamat', 'Kelas', 'Status', 'Nama Orangtua', 'Asal Madin'];

        $callback = function() use($santris, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($santris as $santri) {
                fputcsv($file, [
                    $santri->no_induk,
                    $santri->nama_santri,
                    $santri->tempat_lahir,
                    $santri->tanggal_lahir,
                    $santri->jenis_kelamin,
                    $santri->alamat,
                    $santri->kelas,
                    $santri->status,
                    $santri->nama_orangtua,
                    $santri->asal_madin,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}