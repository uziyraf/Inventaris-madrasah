<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where('lembaga_id', auth()->user()->lembaga_id)
            ->latest()
            ->get();

        return view('laporan', compact('laporans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'          => 'required|string|max:255',
            'masa_laporan'  => 'required|in:Triwulan 1,Triwulan 2,Triwulan 3,Triwulan 4',
            'tahun'         => 'required|digits:4|integer|min:2000|max:2099',
            'tanggal_submit'=> 'required|date',
            'file'          => 'required|file|mimes:pdf,doc,docx,xls,xlsx|max:10240',
        ]);

        $user = auth()->user();

        // Upload file
        $filePath = $request->file('file')->store('laporan', 'public');

        Laporan::create([
            'lembaga_id'    => $user->lembaga_id,
            'nama'          => $request->nama,
            'madrasah'      => $user->name,
            'masa_laporan'  => $request->masa_laporan,
            'tahun'         => $request->tahun,
            'tanggal_submit'=> $request->tanggal_submit,
            'file'          => $filePath,
        ]);

        return redirect()->back()->with('success', 'Laporan berhasil diunggah.');
    }

    public function destroy($id)
    {
        $laporan = Laporan::where('lembaga_id', auth()->user()->lembaga_id)->findOrFail($id);

        // Hapus file dari storage
        if (Storage::disk('public')->exists($laporan->file)) {
            Storage::disk('public')->delete($laporan->file);
        }

        $laporan->delete();

        return redirect()->back()->with('success', 'Laporan berhasil dihapus.');
    }
}
