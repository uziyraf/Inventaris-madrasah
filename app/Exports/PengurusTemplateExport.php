<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PengurusTemplateExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'Nama Pengurus',
            'Jabatan',
            'Status (Aktif/Tidak Aktif)',
            'Alamat',
            'Keterangan'
        ];
    }

    public function array(): array
    {
        return [
            [
                'Siti Aminah',
                'Bendahara',
                'Aktif',
                'Jl. Merdeka No 10',
                'Mengurus keuangan sekolah'
            ]
        ];
    }
}
