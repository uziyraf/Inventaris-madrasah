<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Lembaga;
use App\Models\Guru;
use App\Models\Santri;
use App\Models\Pengurus;
use App\Models\Inventaris;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Pakai Faker versi Indonesia biar namanya lokal
        $faker = Faker::create('id_ID');

        // ==========================================
        // 1. BUAT AKUN SUPER ADMIN YAYASAN
        // ==========================================
        User::create([
            'name' => 'Super Admin Yayasan',
            'email' => 'yayasan@admin.com',
            'password' => Hash::make('password123'),
            'role' => 'yayasan',
            'lembaga_id' => null,
        ]);

        // ==========================================
        // 2. BUAT 3 LEMBAGA & ISINYA
        // ==========================================
        $namaLembagas = ['MTs Yudharta', 'MA Yudharta', 'MI Yudharta'];

        foreach ($namaLembagas as $index => $nama) {
            // A. Buat Lembaga
            $lembaga = Lembaga::create([
                'nama_madrasah' => $nama,
            ]);

            // B. Buat Akun Admin untuk Lembaga ini
            User::create([
                'name' => 'Admin ' . $nama,
                'email' => 'admin' . ($index + 1) . '@lembaga.com', // admin1@lembaga.com, admin2@...
                'password' => Hash::make('password123'),
                'role' => 'lembaga',
                'lembaga_id' => $lembaga->id,
            ]);

            // C. Generate 25 Guru per Lembaga
            for ($i = 0; $i < 25; $i++) {
                Guru::create([
                    'lembaga_id' => $lembaga->id,
                    'nik' => $faker->nik(),
                    'nama_guru' => $faker->name(),
                    'tempat_lahir' => $faker->city(),
                    'tanggal_lahir' => $faker->date('Y-m-d', '1998-01-01'),
                    'alamat' => $faker->address(),
                    'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                    'tahun_mulai_mengajar' => $faker->numberBetween(2010, 2025),
                ]);
            }

            // D. Generate 50 Murid/Santri per Lembaga
            for ($i = 0; $i < 50; $i++) {
                Santri::create([
                    'lembaga_id' => $lembaga->id,
                    'no_induk' => $faker->unique()->numerify('#####'),
                    'nama_santri' => $faker->name(),
                    'tempat_lahir' => $faker->city(),
                    'tanggal_lahir' => $faker->date('Y-m-d', '2010-12-31'),
                    'alamat' => $faker->address(),
                    'kelas' => $faker->randomElement(['7A', '7B', '8A', '9A', '10 IPA', '11 IPS', '12 Agama']),
                    'nama_orangtua' => $faker->name('male'),
                    'asal_madin' => 'Madin ' . $faker->city(),
                ]);
            }

            // E. Generate 8 Pengurus per Lembaga
            for ($i = 0; $i < 8; $i++) {
                Pengurus::create([
                    'lembaga_id' => $lembaga->id,
                    'nama' => $faker->name(),
                    'jabatan' => $faker->randomElement(['Kepala Tata Usaha', 'Bendahara', 'Staff IT', 'Koordinator Sarpras', 'Satpam']),
                    'status' => $faker->randomElement(['Aktif', 'Aktif', 'Tidak Aktif']), // Sengaja banyakin aktif
                    'alamat' => $faker->address(),
                    'keterangan' => $faker->sentence(),
                ]);
            }

            // F. Generate 30 Inventaris per Lembaga
            $kategoriInventaris = ['Gedung', 'Furnitur', 'Elektronik', 'Perlengkapan Administrasi & Kantor', 'Sarana Pendukung', 'Kendaraan'];
            $kondisiInventaris = ['Baik', 'Baik', 'Baik', 'Rusak Ringan', 'Rusak Sedang', 'Rusak Berat', 'Dalam Peminjaman'];

            for ($i = 0; $i < 30; $i++) {
                Inventaris::create([
                    'lembaga_id' => $lembaga->id,
                    'aset' => ucwords($faker->words(2, true)) . ' ' . $faker->randomElement(['Merk A', 'Merk B', 'Lokal']),
                    'kategori' => $faker->randomElement($kategoriInventaris),
                    'jumlah' => $faker->numberBetween(1, 40),
                    'kondisi' => $faker->randomElement($kondisiInventaris),
                    'keterangan' => $faker->sentence(),
                ]);
            }
        }
    }
}