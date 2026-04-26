<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index(Request $request)
    {
        // Panggil query dasarnya dulu
        $query = Inventaris::query();

        // Filter berdasarkan kolom pencarian
        if ($request->filled('search')) {
            $query->where('aset', 'like', '%' . $request->search . '%')
                ->orWhere('keterangan', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Filter berdasarkan Kondisi
        if ($request->filled('kondisi')) {
            $query->where('kondisi', $request->kondisi);
        }

        // Eksekusi query, paginasi, dan pertahankan filter saat pindah halaman
        $inventaris = $query->latest()->paginate(10)->appends($request->all());

        return view('user.inventaris', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jabatan' => 'required',
            'alamat' => 'required',
            'status' => 'required',
        ]);

        Pengurus::create($request->all());
        return redirect()->back()->with('success', 'Data pengurus berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->update($request->all());
        return redirect()->back()->with('success', 'Data pengurus berhasil diperbarui');
    }

    public function destroy($id)
    {
        $pengurus = Pengurus::findOrFail($id);
        $pengurus->delete();
        return redirect()->back()->with('success', 'Data pengurus berhasil dihapus');
    }
}