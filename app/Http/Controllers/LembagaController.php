<?php

namespace App\Http\Controllers;

use App\Models\Lembaga;
use Illuminate\Http\Request;

class LembagaController extends Controller
{
    public function index()
    {
        $lembaga = $this->getLembagaForUser(auth()->user());

        return view('lembaga', compact('lembaga'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_madrasah' => 'nullable|string|max:255',
            'nsm' => 'nullable|string|max:255',
            'tahun_berdiri' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'desa' => 'nullable|string|max:255',
            'kecamatan' => 'nullable|string|max:255',
            'no_telp' => 'nullable|string|max:255',
            'ijin_operasional' => 'nullable|string|max:255',
            'nama_yayasan' => 'nullable|string|max:255',
            'sk_menkumham' => 'nullable|string|max:255',
            'alamat_yayasan' => 'nullable|string',
            'kurikulum' => 'nullable|string|max:255',
            'waktu_penyelenggaraan' => 'nullable|string|max:255',
            'jam_kbm' => 'nullable|string|max:255',
        ]);

        $lembaga = $this->getLembagaForUser($request->user());
        $lembaga->update($data);

        return redirect()->back()->with('success', 'Profil lembaga berhasil diperbarui!');
    }

    private function getLembagaForUser($user): Lembaga
    {
        if ($user->lembaga_id) {
            return Lembaga::findOrFail($user->lembaga_id);
        }

        $lembaga = Lembaga::create([
            'nama_madrasah' => $user->name,
        ]);

        $user->forceFill([
            'lembaga_id' => $lembaga->id,
        ])->save();

        return $lembaga;
    }
}
