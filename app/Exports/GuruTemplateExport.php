<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GuruTemplateExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'NIK',
            'Nama Guru',
            'Tempat Lahir',
            'Tanggal Lahir (YYYY-MM-DD)',
            'Jenis Kelamin (Laki-laki/Perempuan)',
            'Alamat',
            'Tahun Mulai Mengajar (YYYY)',
            'Status (Aktif/Tidak Aktif)'
        ];
    }

    public function array(): array
    {
        return [
            [
                '3514071401840001',
                'Budi Santoso',
                'Pasuruan',
                '1983-01-14',
                'Laki-laki',
                'Karangnongko',
                '2010',
                'Aktif'
            ]
        ];
    }
}
