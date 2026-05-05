<?php

namespace App\Http\Controllers\Yayasan;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\Santri;
use App\Models\Inventaris;
use App\Models\Pengurus;
// Pastikan model-model di atas udah lu punya
use Illuminate\Http\Request;

class RekapDataController extends Controller
{
    // Nampilin Dasbor Yayasan (Rekap Total)
    public function dashboard()
    {
        return view('admin.dashboard'); // Lu bikin file resources/views/admin/dashboard.blade.php
    }

    // Nampilin Semua Guru
    public function guru()
    {
        // Ambil semua guru dari semua lembaga (kalau ada relasi ke lembaga, pakai with('lembaga'))
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
        // Hitung total murid per kelas dari SEMUA lembaga
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