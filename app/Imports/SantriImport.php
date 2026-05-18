<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;

class SantriImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $lembaga_id = auth()->user()->lembaga_id;

        // Get No Induk - try multiple possible heading formats
        $noInduk = $this->getVal($row, ['no_induk', 'no induk', 'noinduk', 'nomor_induk']);
        if (empty($noInduk)) {
            return null;
        }

        // Parse tanggal_lahir - handle both text 'YYYY-MM-DD' and Excel numeric date
        $tanggalRaw = $this->getVal($row, [
            'tanggal_lahir_yyyy_mm_dd', 'tanggal_lahir', 'tgl_lahir',
            'tanggal lahir (yyyy-mm-dd)', 'tanggal lahir'
        ]);
        $tanggalLahir = $this->parseDate($tanggalRaw);

        // Normalize jenis_kelamin
        $jenisRaw = strtolower(trim((string) $this->getVal($row, [
            'jenis_kelamin_laki_lakiperempuan', 'jenis_kelamin',
            'jenis kelamin (laki-laki/perempuan)', 'jenis kelamin'
        ]) ?? ''));
        if (in_array($jenisRaw, ['laki-laki', 'laki laki', 'l', 'pria', 'male'])) {
            $jenisKelamin = 'Laki-laki';
        } elseif (in_array($jenisRaw, ['perempuan', 'p', 'wanita', 'female'])) {
            $jenisKelamin = 'Perempuan';
        } else {
            $jenisKelamin = null;
        }

        return Santri::updateOrCreate(
            [
                'no_induk'   => trim((string) $noInduk),
                'lembaga_id' => $lembaga_id,
            ],
            [
                'nama_santri'   => trim((string) $this->getVal($row, ['nama_santri', 'nama santri', 'nama']) ?? ''),
                'tempat_lahir'  => trim((string) $this->getVal($row, ['tempat_lahir', 'tempat lahir']) ?? '') ?: null,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => $jenisKelamin,
                'alamat'        => trim((string) $this->getVal($row, ['alamat']) ?? '') ?: null,
                'kelas'         => trim((string) $this->getVal($row, ['kelas']) ?? '') ?: null,
                'status'        => trim((string) $this->getVal($row, ['status_aktiftidak_aktif', 'status']) ?? '') ?: 'Aktif',
                'nama_orangtua' => trim((string) $this->getVal($row, ['nama_orang_tua', 'nama_orangtua', 'nama orang tua']) ?? '') ?: null,
                'asal_madin'    => trim((string) $this->getVal($row, ['asal_madin', 'asal madin']) ?? '') ?: null,
            ]
        );
    }

    /**
     * Try multiple possible key names and return the first found value.
     */
    private function getVal(array $row, array $keys): mixed
    {
        foreach ($keys as $key) {
            if (isset($row[$key]) && $row[$key] !== null && $row[$key] !== '') {
                return $row[$key];
            }
        }
        return null;
    }

    /**
     * Parse a date value that may be a string or an Excel numeric date.
     */
    private function parseDate(mixed $value): ?string
    {
        if (empty($value)) {
            return null;
        }

        // If it's already a string formatted as date
        if (is_string($value) && preg_match('/^\d{4}-\d{2}-\d{2}$/', trim($value))) {
            return trim($value);
        }

        // If it's a numeric value (Excel stores dates as serial numbers)
        if (is_numeric($value)) {
            try {
                $date = ExcelDate::excelToDateTimeObject((float) $value);
                return $date->format('Y-m-d');
            } catch (\Exception $e) {
                return null;
            }
        }

        // Try parsing any other string date format
        try {
            $date = new \DateTime((string) $value);
            return $date->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
