<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\InventarisImport;
use App\Exports\InventarisTemplateExport;

class InventarisController extends Controller
{
    public function index(Request $request)
    {
        $inventaris = Inventaris::when($request->search, function ($query, $search) {
            $query->where('aset', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%');
        })
            ->when($request->kategori, function ($query, $kategori) {
                $query->where('kategori', $kategori);
            })
            ->when($request->kondisi, function ($query, $kondisi) {
                $query->where('kondisi', $kondisi);
            })
            ->paginate(50)
            ->appends($request->query());

        return view('inventaris', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset' => 'required',
            'jumlah' => 'required|integer|min:1',
            'kategori' => 'required',
            'kondisi' => 'required',
        ]);

        Inventaris::create($request->all());
        return redirect()->back()->with('success', 'Data aset inventaris berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $item = Inventaris::findOrFail($id);
        $item->update($request->all());
        return redirect()->back()->with('success', 'Data aset inventaris berhasil diperbarui');
    }
    public function destroy($id)
    {
        $item = Inventaris::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data aset inventaris berhasil dihapus');
    }

    public function exportCsv()
    {
        $inventaris = Inventaris::latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=laporan_inventaris.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Nama Aset', 'Kategori', 'Jumlah', 'Kondisi', 'Keterangan'];

        $callback = function() use($inventaris, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($inventaris as $item) {
                fputcsv($file, [
                    $item->aset,
                    $item->kategori,
                    $item->jumlah,
                    $item->kondisi,
                    $item->keterangan ?? '-',
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function downloadTemplate()
    {
        return Excel::download(new InventarisTemplateExport, 'template_import_inventaris.xlsx');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:5120',
        ]);

        Excel::import(new InventarisImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Inventaris berhasil diimport dari Excel.');
    }
}