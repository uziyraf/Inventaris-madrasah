<?php

namespace App\Http\Controllers\Yayasan;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanYayasanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::latest()->get();
        return view('admin.laporan', compact('laporans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Belum Selesai,Sudah Selesai',
        ]);

        $laporan = Laporan::findOrFail($id);
        $laporan->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Status laporan berhasil diperbarui.');
    }
}
