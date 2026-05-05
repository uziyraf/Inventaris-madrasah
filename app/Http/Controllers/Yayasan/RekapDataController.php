<?php

namespace App\Http\Controllers\Yayasan;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Santri;
use App\Models\Inventaris;
use App\Models\Pengurus;
use App\Models\Lembaga; // Pastikan Model Lembaga dipanggil
use Illuminate\Http\Request;

class RekapDataController extends Controller
{
    // Nampilin Dasbor Yayasan (Rekap Total Semua Lembaga)
    public function dashboard()
    {
        // Hitung total keseluruhan data dari database
        $totalLembaga = Lembaga::count();
        $totalGuru = Guru::count();
        $totalMurid = Santri::count();
        $totalPengurus = Pengurus::count();
        $totalInventaris = Inventaris::count();

        // Kirim semua variabel total ke halaman dasbor
        return view('admin.dashboard', compact(
            'totalLembaga',
            'totalGuru',
            'totalMurid',
            'totalPengurus',
            'totalInventaris'
        ));
    }

    // Nampilin Semua Guru
    public function guru()
    {
        $gurus = Guru::latest()->get();
        return view('guru', compact('gurus'));
    }

    // Nampilin Semua Murid/Santri
    public function murid()
    {
        $murids = Santri::latest()->get();
        return view('murid', compact('murids'));
    }

    // Nampilin Rincian Kelas Global
    public function kelas()
    {
        $kelasData = Santri::selectRaw('kelas, count(*) as total')
            ->groupBy('kelas')
            ->get();
        return view('kelas', compact('kelasData'));
    }

    // Nampilin Semua Pengurus
    public function pengurus()
    {
        $pengurus = Pengurus::latest()->get();
        return view('pengurus', compact('pengurus'));
    }

    // Nampilin Semua Inventaris
    public function inventaris()
    {
        $inventaris = Inventaris::latest()->get();
        return view('inventaris', compact('inventaris'));
    }
}