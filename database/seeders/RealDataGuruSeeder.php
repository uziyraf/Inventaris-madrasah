<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guru;
use App\Models\Lembaga;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RealDataGuruSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Cek atau Buat Lembaga Baru "Madin Miftahul Ulum 22" (Berdasarkan kop surat Excel)
        $lembaga = Lembaga::firstOrCreate(
            ['nama_madrasah' => 'Madin Miftahul Ulum 22']
        );

        // Cek atau buat akun admin untuk lembaga ini
        $admin = User::firstOrCreate(
            ['email' => 'admin.madin22@lembaga.com'],
            [
                'name' => 'Admin Madin 22',
                'password' => Hash::make('password123'),
                'role' => 'lembaga',
                'lembaga_id' => $lembaga->id,
            ]
        );

        // 2. Data Guru dari Excel
        $gurus = [
            [
                'nik' => '3514071401840001',
                'nama_guru' => "M.Mas'ud",
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1983-01-14',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2010',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514071605540002',
                'nama_guru' => "H.Abdulloh Syafi'i",
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1955-06-20',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '1984',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514070406680003',
                'nama_guru' => 'Yajid',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1978-06-04',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2000',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514072312940001',
                'nama_guru' => 'Syamsul Arifin',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1994-12-23',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2019',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514070404690001',
                'nama_guru' => 'M.Saifulloh',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1968-05-04',
                'alamat' => 'Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '1988',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514071708720003',
                'nama_guru' => "M.Kho'ir",
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1972-08-17',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2000',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514071106820002',
                'nama_guru' => 'M.Yunus',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1982-10-18',
                'alamat' => 'Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2010',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514071404740001',
                'nama_guru' => 'Mustofa dimyati',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1974-10-10',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '1993',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514072612880001',
                'nama_guru' => 'M. Nidzom Muhajir',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1988-12-26',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2018',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514071610920001',
                'nama_guru' => 'Muhammad Faishol A',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1992-10-16',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2012',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514070403890002',
                'nama_guru' => "Mas'udi",
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1989-03-04',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2019',
                'status' => 'Aktif',
            ],
            [
                'nik' => '3514071408960005',
                'nama_guru' => 'Sodiq',
                'tempat_lahir' => 'Pasuruan',
                'tanggal_lahir' => '1996-08-14',
                'alamat' => 'Karangnongko Karangmenggah Wonorejo',
                'jenis_kelamin' => 'Laki-laki',
                'tahun_mulai_mengajar' => '2019',
                'status' => 'Aktif',
            ],
        ];

        foreach ($gurus as $guruData) {
            Guru::updateOrCreate(
                ['nik' => $guruData['nik'], 'lembaga_id' => $lembaga->id],
                $guruData
            );
        }
    }
}
