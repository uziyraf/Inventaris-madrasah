<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use Illuminate\Http\Request;

class SantriController extends Controller
{
    public function index()
    {
        $santris = Santri::paginate(10);

        // Komen dulu return view-nya
        return view('murid', compact('santris'));        // Ganti jadi ini buat nampilin data mentah:
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_induk' => 'required|unique:santris',
            'nama_santri' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'kelas' => 'required',
            'status' => 'required',
            'nama_orangtua' => 'required',
            'asal_madin' => 'required',
        ]);

        Santri::create($request->all());

        return redirect()->back()->with('success', 'Data santri berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $santri = Santri::findOrFail($id);
        $santri->update($request->all());

        return redirect()->back()->with('success', 'Data santri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $santri = Santri::findOrFail($id);
        $santri->delete();

        return redirect()->back()->with('success', 'Data santri berhasil dihapus');
    }
}