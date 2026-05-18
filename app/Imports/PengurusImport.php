<?php

namespace App\Imports;

use App\Models\Pengurus;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PengurusImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $lembaga_id = auth()->user()->lembaga_id;
        
        if (!isset($row['nama_pengurus'])) {
            return null;
        }

        return Pengurus::updateOrCreate(
            [
                'nama' => trim($row['nama_pengurus']),
                'jabatan' => trim($row['jabatan'] ?? ''),
                'lembaga_id' => $lembaga_id
            ],
            [
                'status' => trim($row['status_aktiftidak_aktif'] ?? 'Aktif'),
                'alamat' => trim($row['alamat'] ?? ''),
                'keterangan' => trim($row['keterangan'] ?? ''),
            ]
        );
    }
}
