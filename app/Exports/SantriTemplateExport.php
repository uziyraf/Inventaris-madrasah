<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SantriTemplateExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'No Induk',
            'Nama Santri',
            'Tempat Lahir',
            'Tanggal Lahir (YYYY-MM-DD)',
            'Jenis Kelamin (Laki-laki/Perempuan)',
            'Alamat',
            'Kelas',
            'Status (Aktif/Tidak Aktif)',
            'Nama Orang Tua',
            'Asal Madin'
        ];
    }

    public function array(): array
    {
        return [
            [
                '12345',
                'Ahmad Dahlan',
                'Pasuruan',
                '2010-05-12',
                'Laki-laki',
                'Pandaan',
                '7A',
                'Aktif',
                'Bapak Dahlan',
                'Madin Al Ikhlas'
            ]
        ];
    }
}
