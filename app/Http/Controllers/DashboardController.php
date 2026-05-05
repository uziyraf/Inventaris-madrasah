<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Santri;
use App\Models\Guru;
use App\Models\Pengurus;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalInventaris = Inventaris::sum('jumlah');
        $inventarisDipinjam = Inventaris::where('kondisi', 'Dalam Peminjaman')->sum('jumlah');
        $inventarisPerawatan = Inventaris::whereIn('kondisi', ['Rusak Ringan', 'Rusak Sedang'])->sum('jumlah');
        $inventarisRusakBerat = Inventaris::where('kondisi', 'Rusak Berat')->sum('jumlah');

        $totalSantri = Santri::count();
        $totalGuru = Guru::count();
        $totalPengurus = Pengurus::count();

        return view('dashboard', compact(
            'totalInventaris',
            'inventarisDipinjam',
            'inventarisPerawatan',
            'inventarisRusakBerat',
            'totalSantri',
            'totalGuru',
            'totalPengurus'
        ));
    }
}