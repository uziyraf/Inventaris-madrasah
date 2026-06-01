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
        User::firstOrCreate(
            ['email' => 'yayasan@admin.com'],
            [
                'name' => 'Super Admin Yayasan',
                'password' => Hash::make('password123'),
                'role' => 'yayasan',
                'lembaga_id' => null,
            ]
        );

        // ==========================================
        // 2. RUN REAL DATA SEEDER
        // ==========================================
        $this->call([
            RealDataGuruSeeder::class,
        ]);
    }
}