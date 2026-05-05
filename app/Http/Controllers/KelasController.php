<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        // Ambil semua data santri
        $santris = Santri::all();

        // Hitung total keseluruhan
        $totalSiswa = $santris->count();
        // Asumsi data jenis_kelamin isinya 'Laki-laki' atau 'L'
        $totalLaki = $santris->filter(function ($s) {
            return in_array($s->jenis_kelamin, ['Laki-laki', 'L', 'Laki-Laki']);
        })->count();
        $totalPerempuan = $totalSiswa - $totalLaki;

        // Kelompokkan data santri berdasarkan 'kelas'
        $kelasData = $santris->groupBy('kelas')->map(function ($items, $kelas) {
            $l = $items->filter(function ($s) {
                return in_array($s->jenis_kelamin, ['Laki-laki', 'L', 'Laki-Laki']);
            })->count();

            $p = $items->count() - $l;

            return [
                'nama_kelas' => $kelas,
                'total' => $items->count(),
                'l' => $l,
                'p' => $p,
                // Siapkan data siswa buat dilempar ke Modal Popup
                'students' => $items->map(function ($item) {
                    return [
                        'name' => $item->nama_santri,
                        'nis' => $item->no_induk,
                        'gender' => in_array($item->jenis_kelamin, ['Laki-laki', 'L']) ? 'L' : 'P'
                    ];
                })->values()
            ];
        })->sortBy('nama_kelas'); // Urutkan nama kelas (opsional)

        return view('kelas', compact('totalSiswa', 'totalLaki', 'totalPerempuan', 'kelasData'));
    }
}