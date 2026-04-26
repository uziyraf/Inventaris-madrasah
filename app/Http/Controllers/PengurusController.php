<?php

namespace App\Http\Controllers;

use App\Models\Pengurus;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $penguruses = Pengurus::latest()->paginate(10);
        return view('pengurus', compact('penguruses'));
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