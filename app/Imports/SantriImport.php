<?php

namespace App\Imports;

use App\Models\Santri;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Shared\Date as ExcelDate;
use Illuminate\Support\Facades\Log;

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
        // 2: TEMPAT, TANGGAL LAHIR (combined)
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
        $rawTTL = $row[2] ?? '';
        
        // Log raw value for debugging
        Log::info("Import Santri [{$namaSantri}] - Raw TTL value: " . var_export($rawTTL, true) . " - type: " . gettype($rawTTL));

        // If Excel stored the date as a numeric serial number in the TTL column
        if (is_numeric($rawTTL)) {
            try {
                $date = ExcelDate::excelToDateTimeObject((float) $rawTTL);
                $tanggalLahir = $date->format('Y-m-d');
                // Validate: tanggal lahir should be in the past and reasonable (1950-2020)
                $year = (int) $date->format('Y');
                if ($year < 1950 || $year > 2020) {
                    $tanggalLahir = null;
                }
                Log::info("  -> Numeric date parsed: {$tanggalLahir}");
                return Santri::updateOrCreate(
                    ['no_induk' => $noInduk, 'lembaga_id' => $lembaga_id],
                    [
                        'nama_santri'   => $namaSantri,
                        'tempat_lahir'  => null,
                        'tanggal_lahir' => $tanggalLahir,
                        'jenis_kelamin' => null,
                        'alamat'        => trim((string) ($row[3] ?? '')) ?: null,
                        'kelas'         => trim((string) ($row[5] ?? '')) ?: null,
                        'status'        => 'Aktif',
                        'nama_orangtua' => trim((string) ($row[6] ?? '')) ?: null,
                        'asal_madin'    => trim((string) ($row[7] ?? '')) ?: null,
                    ]
                );
            } catch (\Exception $e) {
                // Fall through to text parsing
            }
        }

        [$tempatLahir, $tanggalLahir] = $this->parseTempatTanggal((string) $rawTTL);
        Log::info("  -> Parsed: tempat={$tempatLahir}, tanggal={$tanggalLahir}");

        return Santri::updateOrCreate(
            [
                'no_induk'   => $noInduk,
                'lembaga_id' => $lembaga_id,
            ],
            [
                'nama_santri'   => $namaSantri,
                'tempat_lahir'  => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'jenis_kelamin' => null,
                'alamat'        => trim((string) ($row[3] ?? '')) ?: null,
                'kelas'         => trim((string) ($row[5] ?? '')) ?: null,
                'status'        => 'Aktif',
                'nama_orangtua' => trim((string) ($row[6] ?? '')) ?: null,
                'asal_madin'    => trim((string) ($row[7] ?? '')) ?: null,
            ]
        );
    }

    /**
     * Parse "TEMPAT, TANGGAL LAHIR" combined column.
     * Handles: "Pasuruan, 02 Mei 2004" or "Pasuruan 15 September 2011"
     * Also handles: "Pasuruan, 03-06-2012" or "Pasuruan 12/07/2011"
     */
    private function parseTempatTanggal(string $combined): array
    {
        $combined = trim($combined);

        if (empty($combined)) {
            return [null, null];
        }

        // Try 1: Split by comma (e.g. "Pasuruan, 15 September 2011" or "Pasuruan, 03-06-2012")
        if (str_contains($combined, ',')) {
            $parts = explode(',', $combined, 2);
            $tempatLahir = trim($parts[0]) ?: null;
            $tanggalStr  = isset($parts[1]) ? trim($parts[1]) : '';
            $tanggalLahir = $this->parseDate($tanggalStr);
            if ($tanggalLahir) {
                return [$tempatLahir, $tanggalLahir];
            }
        }

        // Try 2: No comma — detect "Pasuruan 15 September 2011" pattern with month names
        $months = 'Januari|Februari|Maret|April|Mei|Juni|Juli|Agustus|September|Oktober|November|Desember'
            . '|January|February|March|April|May|June|July|August|September|October|November|December';
        $pattern = '/^(.+?)\s+(\d{1,2}\s+(?:' . $months . ')\s+\d{4})$/iu';

        if (preg_match($pattern, $combined, $matches)) {
            $tempatLahir = trim($matches[1]) ?: null;
            $tanggalLahir = $this->parseDate(trim($matches[2]));
            return [$tempatLahir, $tanggalLahir];
        }

        // Try 3: "Pasuruan 03-06-2012" or "Pasuruan 12/07/2011" (DD-MM-YYYY or DD/MM/YYYY)
        $pattern2 = '/^(.+?)\s+(\d{1,2}[\-\/]\d{1,2}[\-\/]\d{4})$/';
        if (preg_match($pattern2, $combined, $matches)) {
            $tempatLahir = trim($matches[1]) ?: null;
            $tanggalLahir = $this->parseDate(trim($matches[2]));
            return [$tempatLahir, $tanggalLahir];
        }

        // Try 4: Maybe it's just the date alone (no tempat)
        $tanggalLahir = $this->parseDate($combined);
        if ($tanggalLahir) {
            return [null, $tanggalLahir];
        }

        // Fallback: treat entire value as tempat_lahir
        return [$combined, null];
    }

    /**
     * Convert various date formats to 'Y-m-d' for MySQL.
     * Handles: "02 Mei 2004", "02 May 2004", "2004-05-02", "03-06-2012", "12/07/2011"
     */
    private function parseDate(string $dateStr): ?string
    {
        $dateStr = trim($dateStr);

        if (empty($dateStr)) {
            return null;
        }

        // Map Indonesian month names to English (using word boundaries to prevent corruption)
        $indonesian = [
            '/\bJanuari\b/i'   => 'January',
            '/\bFebruari\b/i'  => 'February',
            '/\bMaret\b/i'     => 'March',
            '/\bMei\b/i'       => 'May',
            '/\bJuni\b/i'      => 'June',
            '/\bJuli\b/i'      => 'July',
            '/\bAgustus\b/i'   => 'August',
            '/\bOktober\b/i'   => 'October',
            '/\bNopember\b/i'  => 'November',
            '/\bDesember\b/i'  => 'December',
        ];
        $dateStr = preg_replace(array_keys($indonesian), array_values($indonesian), $dateStr);

        // Handle DD-MM-YYYY or DD/MM/YYYY format explicitly
        if (preg_match('/^(\d{1,2})[\-\/](\d{1,2})[\-\/](\d{4})$/', $dateStr, $m)) {
            $day   = (int) $m[1];
            $month = (int) $m[2];
            $year  = (int) $m[3];
            // Validate ranges
            if ($month >= 1 && $month <= 12 && $day >= 1 && $day <= 31 && $year >= 1950 && $year <= 2020) {
                return sprintf('%04d-%02d-%02d', $year, $month, $day);
            }
            return null;
        }

        // Try parsing with DateTime
        try {
            $date = new \DateTime($dateStr);
            $year = (int) $date->format('Y');
            // Sanity check: tanggal lahir harus antara 1950-2020
            if ($year < 1950 || $year > 2020) {
                return null;
            }
            return $date->format('Y-m-d');
        } catch (\Exception $e) {
            return null;
        }
    }
}
