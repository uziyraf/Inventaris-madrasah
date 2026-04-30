<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    public function index(Request $request)
    {
        $inventaris = Inventaris::when($request->search, function ($query, $search) {
            $query->where('aset', 'like', '%' . $search . '%')
                ->orWhere('keterangan', 'like', '%' . $search . '%');
        })
            ->when($request->kategori, function ($query, $kategori) {
                $query->where('kategori', $kategori);
            })
            ->when($request->kondisi, function ($query, $kondisi) {
                $query->where('kondisi', $kondisi);
            })
            ->paginate(50)
            ->appends($request->query());

        return view('inventaris', compact('inventaris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'aset' => 'required',
            'jumlah' => 'required|integer|min:1',
            'kategori' => 'required',
            'kondisi' => 'required',
        ]);

        Inventaris::create($request->all());
        return redirect()->back()->with('success', 'Data aset inventaris berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah' => 'required|integer|min:1',
        ]);

        $item = Inventaris::findOrFail($id);
        $item->update($request->all());
        return redirect()->back()->with('success', 'Data aset inventaris berhasil diperbarui');
    }
    public function destroy($id)
    {
        $item = Inventaris::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Data aset inventaris berhasil dihapus');
    }
}