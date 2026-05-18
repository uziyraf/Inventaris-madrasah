<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\GuruImport;
use App\Exports\GuruTemplateExport;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::where('lembaga_id', auth()->user()->lembaga_id)
            ->latest()
            ->paginate(10); // <--- GANTI .get() JADI .paginate(10) DI SINI

        return view('guru', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'lembaga_id' => auth()->user()->lembaga_id,
            'nik' => 'required|unique:gurus',
            'nama_guru' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'status' => 'required',
            'tahun_mulai_mengajar' => 'required|digits:4',
        ]);

        Guru::create($request->all());
        return redirect()->back()->with('success', 'Data guru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());
        return redirect()->back()->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->back()->with('success', 'Data guru berhasil dihapus');
    }

    public function exportCsv()
    {
        $gurus = Guru::where('lembaga_id', auth()->user()->lembaga_id)->latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=data_guru.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['NIK', 'Nama Guru', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Alamat', 'Tahun Mulai Mengajar', 'Status'];

        $callback = function() use($gurus, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($gurus as $guru) {
                fputcsv($file, [
                    $guru->nik,
                    $guru->nama_guru,
                    $guru->tempat_lahir,
                    $guru->tanggal_lahir,
                    $guru->jenis_kelamin,
                    $guru->alamat,
                    $guru->tahun_mulai_mengajar,
                    $guru->status,
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    public function downloadTemplate()
    {
        return Excel::download(new GuruTemplateExport, 'template_import_guru.xlsx');
    }

    public function importCsv(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv|max:5120',
        ]);

        Excel::import(new GuruImport, $request->file('file'));

        return redirect()->back()->with('success', 'Data Guru berhasil diimport dari Excel.');
    }
}