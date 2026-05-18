<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventarisTemplateExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'Nama Aset',
            'Kategori (Gedung/Furnitur/Elektronik/Dll)',
            'Jumlah (Angka)',
            'Kondisi (Baik/Rusak Ringan/Rusak Berat)',
            'Keterangan'
        ];
    }

    public function array(): array
    {
        return [
            [
                'Meja Belajar Kayu Jati',
                'Furnitur',
                '40',
                'Baik',
                'Pengadaan tahun 2021'
            ]
        ];
    }
}
