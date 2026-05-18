<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SantriImport;
use App\Exports\SantriTemplateExport;

class SantriController extends Controller
{
    public function index(Request $request)
    {
        $lembaga_id = auth()->user()->lembaga_id;

        // Get all unique kelas values for the filter dropdown
        $kelasList = Santri::where('lembaga_id', $lembaga_id)
            ->whereNotNull('kelas')
            ->where('kelas', '!=', '')
            ->distinct()
            ->orderBy('kelas')
            ->pluck('kelas');

        // Build query with optional kelas filter
        $query = Santri::where('lembaga_id', $lembaga_id);
        $selectedKelas = $request->query('kelas');
        if ($selectedKelas) {
            $query->where('kelas', $selectedKelas);
        }

        $santris = $query->latest()->paginate(10)->appends(['kelas' => $selectedKelas]);

        return view('murid', compact('santris', 'kelasList', 'selectedKelas'));
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

    public function downloadTemplate()
    {
        return Excel::download(new SantriTemplateExport, 'template_import_murid.xlsx');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:5120',
        ]);

        Excel::import(new SantriImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Murid berhasil diimport dari Excel.');
    }
}