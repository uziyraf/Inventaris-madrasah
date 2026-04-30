<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        $lembaga = Lembaga::firstOrCreate(['id' => 1]);

        return view('lembaga', compact('lembaga'));
    }

    public function update(Request $request)
    {
        $lembaga = Lembaga::first();
        $lembaga->update($request->all());

        return redirect()->back()->with('success', 'Profil lembaga berhasil diperbarui!');
    }
}