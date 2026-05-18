<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\PengurusImport;
use App\Exports\PengurusTemplateExport;

class PengurusController extends Controller
{
    public function index()
    {
        $penguruses = Pengurus::latest()->paginate(10);
        return view('pengurus', compact('penguruses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        Pengurus::create($request->all());
        return redirect()->back()->with('success', 'Data pengurus berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->update($request->all());
        return redirect()->back()->with('success', 'Data pengurus berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->delete();
        return redirect()->back()->with('success', 'Data pengurus berhasil dihapus');
    }

    public function exportCsv()
    {
        $penguruses = Pengurus::latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=data_pengurus.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Nama', 'Jabatan', 'Status', 'Alamat', 'Keterangan'];

        $callback = function() use($penguruses, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($penguruses as $pengurus) {
                fputcsv($file, [
                    $pengurus->nama,
                    $pengurus->jabatan,
                    $pengurus->status,
                    $pengurus->alamat,
                    $pengurus->keterangan ?? '-',
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function downloadTemplate()
    {
        return Excel::download(new PengurusTemplateExport, 'template_import_pengurus.xlsx');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:5120',
        ]);

        Excel::import(new PengurusImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Pengurus berhasil diimport dari Excel.');
    }
}