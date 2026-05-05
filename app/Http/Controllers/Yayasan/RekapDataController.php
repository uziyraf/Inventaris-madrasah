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
        // Jika mau dipaginasi, ganti get() dengan paginate(10)
        $gurus = Guru::with('lembaga')->latest()->paginate(10);
        return view('admin.guru', compact('gurus'));
    }

    // Nampilin Semua Murid/Santri
    public function murid()
    {
        $santris = Santri::with('lembaga')->latest()->paginate(10);
        return view('admin.murid', compact('santris'));
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
        $penguruses = Pengurus::with('lembaga')->latest()->paginate(10);
        return view('admin.pengurus', compact('penguruses'));
    }

    // Nampilin Semua Inventaris
    public function inventaris(Request $request)
    {
        // Menggunakan relasi dan logic filter
        $query = Inventaris::with('lembaga')->latest();

        if ($request->filled('search')) {
            $query->where('aset', 'like', '%' . $request->search . '%')
                ->orWhere('keterangan', 'like', '%' . $request->search . '%');
        }

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        $inventaris = $query->paginate(10);

        return view('admin.inventaris', compact('inventaris'));
    }
}