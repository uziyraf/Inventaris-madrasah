<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // 1. Ambil semua murid khusus di lembaga admin yang lagi login
        $lembaga_id = auth()->user()->lembaga_id;
        $santris = Santri::where('lembaga_id', $lembaga_id)->get();

        // 2. Hitung statistik global (Satu Sekolah)
        $totalSiswa = $santris->count();
        $totalLaki = $santris->where('jenis_kelamin', 'Laki-laki')->count();
        $totalPerempuan = $santris->where('jenis_kelamin', 'Perempuan')->count();

        // 3. Olah data biar sesuai sama format Alpine.js di Blade
        $kelasData = [];

        // Kelompokkan berdasarkan nama kelas (misal: '7A', '8B')
        $groupedClasses = $santris->groupBy('kelas');

        foreach ($groupedClasses as $nama_kelas => $students) {

            // Bikin list siswa untuk dimunculin di dalam Modal Tabel
            $studentList = $students->map(function ($s) {
                return [
                    'name' => $s->nama_santri,
                    'nis' => $s->no_induk,
                    'gender' => $s->jenis_kelamin == 'Laki-laki' ? 'L' : 'P'
                ];
            })->values()->toArray();

            $kelasData[] = [
                'nama_kelas' => $nama_kelas,
                'total' => $students->count(),
                'l' => $students->where('jenis_kelamin', 'Laki-laki')->count(),
                'p' => $students->where('jenis_kelamin', 'Perempuan')->count(),
                'students' => $studentList
            ];
        }

        $kelasData = collect($kelasData)->sortBy('nama_kelas')->values()->toArray();

        return view('kelas', compact('totalSiswa', 'totalLaki', 'totalPerempuan', 'kelasData'));
    }

    public function exportCsv()
    {
        $lembaga_id = auth()->user()->lembaga_id;
        $santris = Santri::where('lembaga_id', $lembaga_id)->get();
        $groupedClasses = $santris->groupBy('kelas')->sortKeys();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=data_kelas.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Nama Kelas', 'Total Siswa', 'Laki-laki', 'Perempuan'];

        $callback = function() use($groupedClasses, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($groupedClasses as $nama_kelas => $students) {
                fputcsv($file, [
                    $nama_kelas,
                    $students->count(),
                    $students->where('jenis_kelamin', 'Laki-laki')->count(),
                    $students->where('jenis_kelamin', 'Perempuan')->count(),
                ]);
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}