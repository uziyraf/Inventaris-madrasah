<?php

namespace App\Imports;

use App\Models\Inventaris;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InventarisImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $lembaga_id = auth()->user()->lembaga_id;
        
        if (!isset($row['nama_aset'])) {
            return null;
        }

        return Inventaris::updateOrCreate(
            [
                'aset' => trim($row['nama_aset']),
                'kategori' => trim($row['kategori_gedungfurniturelektronikdll'] ?? ''),
                'lembaga_id' => $lembaga_id
            ],
            [
                'jumlah' => (int) trim($row['jumlah_angka'] ?? 0),
                'kondisi' => trim($row['kondisi_baikrusak_ringanrusak_berat'] ?? 'Baik'),
                'keterangan' => trim($row['keterangan'] ?? ''),
            ]
        );
    }
}
