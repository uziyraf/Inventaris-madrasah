<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SantriImport implements ToModel, WithStartRow
{
    /**
     * Skip the first header row, start reading data from row 2.
     */
    public function startRow(): int
    {
        return 2;
    }

    public function model(array $row)
    {
        $lembaga_id = auth()->user()->lembaga_id;

        // Column positions based on user's actual Excel format:
        // 0: NO.
        // 1: NAMA SANTRI
        // 2: TEMPAT, TANGGAL LAHIR (combined, e.g. "Pasuruan, 02 Mei 2004")
        // 3: ALAMAT
        // 4: NO. INDUK
        // 5: KELAS
        // 6: NAMA ORANG TUA
        // 7: ASAL MADIN

        $namaSantri = trim((string) ($row[1] ?? ''));
        $noInduk    = trim((string) ($row[4] ?? ''));

        // Skip empty rows
        if (empty($namaSantri) || empty($noInduk)) {
            return null;
        }

        // Parse combined "TEMPAT, TANGGAL LAHIR"
        [$tempatLahir, $tanggalLahir] = $this->parseTempatTanggal((string) ($row[2] ?? ''));

        return Santri::updateOrCreate(
            [
                'no_induk'   => $noInduk,
                'lembaga_id' => $lembaga_id,
            ],
            [
                'nama_santri'   => $namaSantri,
                'tempat_lahir'  => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => null, // Tidak ada di Excel, bisa diisi manual
                'alamat'        => trim((string) ($row[3] ?? '')) ?: null,
                'kelas'         => trim((string) ($row[5] ?? '')) ?: null,
                'status'        => 'Aktif', // Default Aktif
                'nama_orangtua' => trim((string) ($row[6] ?? '')) ?: null,
                'asal_madin'    => trim((string) ($row[7] ?? '')) ?: null,
            ]
        );
    }

    /**
     * Parse "TEMPAT, TANGGAL LAHIR" combined column.
     * Example input: "Pasuruan, 02 Mei 2004"
     * Returns: ['Pasuruan', '2004-05-02']
     */
    private function parseTempatTanggal(string $combined): array
    {
        $combined = trim($combined);

        if (empty($combined)) {
            return [null, null];
        }

        // Split by first comma
        $parts = explode(',', $combined, 2);

        $tempatLahir = trim($parts[0]) ?: null;
        $tanggalStr  = isset($parts[1]) ? trim($parts[1]) : '';

        $tanggalLahir = $this->parseDate($tanggalStr);

        return [$tempatLahir, $tanggalLahir];
    }

    /**
     * Convert various date formats to 'Y-m-d' for MySQL.
     * Handles: "02 Mei 2004", "02 May 2004", "2004-05-02", "02/05/2004"
     */
    private function parseDate(string $dateStr): ?string
    {
        $dateStr = trim($dateStr);

        if (empty($dateStr)) {
            return null;
        }

        // Map Indonesian month names to English
        $indonesian = [
            'Januari'   => 'January',
            'Februari'  => 'February',
            'Maret'     => 'March',
            'April'     => 'April',
            'Mei'       => 'May',
            'Juni'      => 'June',
            'Juli'      => 'July',
            'Agustus'   => 'August',
            'September' => 'September',
            'Oktober'   => 'October',
            'November'  => 'November',
            'Desember'  => 'December',
            // short forms
            'Jan' => 'January', 'Feb' => 'February', 'Mar' => 'March',
            'Apr' => 'April',   'Mei' => 'May',       'Jun' => 'June',
            'Jul' => 'July',    'Agt' => 'August',    'Sep' => 'September',
            'Okt' => 'October', 'Nov' => 'November',  'Des' => 'December',
        ];
        $dateStr = str_ireplace(array_keys($indonesian), array_values($indonesian), $dateStr);

        // Try parsing
        try {
            $date = new \DateTime($dateStr);
            // Sanity check: reject dates that are suspiciously in the future (default fallback dates)
            if ((int) $date->format('Y') > (int) date('Y')) {
                return null;
            }
            return $date->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
