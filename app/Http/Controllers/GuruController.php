<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $gurus = Guru::where('lembaga_id', auth()->user()->lembaga_id)->get();
        return view('guru', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik' => 'required|unique:gurus',
            'nama_guru' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'tahun_mulai_mengajar' => 'required|digits:4',
        ]);

        Guru::create($request->all());
        return redirect()->back()->with('success', 'Data guru berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);
        $guru->update($request->all());
        return redirect()->back()->with('success', 'Data guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);
        $guru->delete();
        return redirect()->back()->with('success', 'Data guru berhasil dihapus');
    }
}