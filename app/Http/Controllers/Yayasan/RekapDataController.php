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

    // Export Semua Inventaris (Yayasan)
    public function exportCsv()
    {
        $inventaris = Inventaris::with('lembaga')->latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=laporan_inventaris_yayasan.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Asal Lembaga', 'Nama Aset', 'Kategori', 'Jumlah', 'Kondisi', 'Keterangan'];

        $callback = function() use($inventaris, $columns) {
            $file = fopen('php://output', 'w');
            
            // Menulis Header
            fputcsv($file, $columns);

            foreach ($inventaris as $item) {
                fputcsv($file, [
                    $item->lembaga ? $item->lembaga->nama_madrasah : 'Global',
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

    // Export Semua Guru (Yayasan)
    public function exportGuruCsv()
    {
        $gurus = Guru::with('lembaga')->latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=laporan_guru_yayasan.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Asal Lembaga', 'NIK', 'Nama Guru', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Alamat', 'Tahun Mulai Mengajar', 'Status'];

        $callback = function() use($gurus, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($gurus as $guru) {
                fputcsv($file, [
                    $guru->lembaga ? $guru->lembaga->nama_madrasah : 'Global',
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

    // Export Semua Murid (Yayasan)
    public function exportMuridCsv()
    {
        $santris = Santri::with('lembaga')->latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=laporan_murid_yayasan.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Asal Lembaga', 'No. Induk', 'Nama Santri', 'Tempat Lahir', 'Tanggal Lahir', 'Jenis Kelamin', 'Alamat', 'Kelas', 'Status', 'Nama Orangtua', 'Asal Madin'];

        $callback = function() use($santris, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($santris as $santri) {
                fputcsv($file, [
                    $santri->lembaga ? $santri->lembaga->nama_madrasah : 'Global',
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

    // Export Semua Pengurus (Yayasan)
    public function exportPengurusCsv()
    {
        $penguruses = Pengurus::with('lembaga')->latest()->get();

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=laporan_pengurus_yayasan.csv",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $columns = ['Asal Lembaga', 'Nama', 'Jabatan', 'Status', 'Alamat', 'Keterangan'];

        $callback = function() use($penguruses, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($penguruses as $pengurus) {
                fputcsv($file, [
                    $pengurus->lembaga ? $pengurus->lembaga->nama_madrasah : 'Global',
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
}