<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SantriImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $lembaga_id = auth()->user()->lembaga_id;
        
        if (!isset($row['no_induk'])) {
            return null;
        }

        return Santri::updateOrCreate(
            [
                'no_induk' => trim($row['no_induk']),
                'lembaga_id' => $lembaga_id
            ],
            [
                'nama_santri' => trim($row['nama_santri'] ?? ''),
                'tempat_lahir' => trim($row['tempat_lahir'] ?? ''),
                'tanggal_lahir' => trim($row['tanggal_lahir_yyyy_mm_dd'] ?? ''),
                'jenis_kelamin' => trim($row['jenis_kelamin_laki_lakiperempuan'] ?? ''),
                'alamat' => trim($row['alamat'] ?? ''),
                'kelas' => trim($row['kelas'] ?? ''),
                'status' => trim($row['status_aktiftidak_aktif'] ?? 'Aktif'),
                'nama_orangtua' => trim($row['nama_orang_tua'] ?? ''),
                'asal_madin' => trim($row['asal_madin'] ?? ''),
            ]
        );
    }
}
