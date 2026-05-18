<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class GuruImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $lembaga_id = auth()->user()->lembaga_id;
        
        // We ensure keys exist based on our template headings
        // The WithHeadingRow concern slugifies the headers, e.g. "Nama Guru" -> "nama_guru"
        if (!isset($row['nik'])) {
            return null;
        }

        return Guru::updateOrCreate(
            [
                'nik' => trim($row['nik']),
                'lembaga_id' => $lembaga_id
            ],
            [
                'nama_guru' => trim($row['nama_guru'] ?? ''),
                'tempat_lahir' => trim($row['tempat_lahir'] ?? ''),
                'tanggal_lahir' => trim($row['tanggal_lahir_yyyy_mm_dd'] ?? ''),
                'jenis_kelamin' => trim($row['jenis_kelamin_laki_lakiperempuan'] ?? ''),
                'alamat' => trim($row['alamat'] ?? ''),
                'tahun_mulai_mengajar' => trim($row['tahun_mulai_mengajar_yyyy'] ?? ''),
                'status' => trim($row['status_aktiftidak_aktif'] ?? 'Aktif'),
            ]
        );
    }
}
