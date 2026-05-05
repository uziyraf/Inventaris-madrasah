<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Cek & Tambah ke tabel gurus
        if (!Schema::hasColumn('gurus', 'lembaga_id')) {
            Schema::table('gurus', function (Blueprint $table) {
                $table->unsignedBigInteger('lembaga_id')->nullable()->after('id');
            });
        }

        // Cek & Tambah ke tabel santris (murid)
        if (!Schema::hasColumn('santris', 'lembaga_id')) {
            Schema::table('santris', function (Blueprint $table) {
                $table->unsignedBigInteger('lembaga_id')->nullable()->after('id');
            });
        }

        // Cek & Tambah ke tabel penguruses
        if (!Schema::hasColumn('penguruses', 'lembaga_id')) {
            Schema::table('penguruses', function (Blueprint $table) {
                $table->unsignedBigInteger('lembaga_id')->nullable()->after('id');
            });
        }

        // Cek & Tambah ke tabel inventaris
        if (!Schema::hasColumn('inventaris', 'lembaga_id')) {
            Schema::table('inventaris', function (Blueprint $table) {
                $table->unsignedBigInteger('lembaga_id')->nullable()->after('id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('gurus', 'lembaga_id')) {
            Schema::table('gurus', function (Blueprint $table) {
                $table->dropColumn('lembaga_id');
            });
        }
        if (Schema::hasColumn('santris', 'lembaga_id')) {
            Schema::table('santris', function (Blueprint $table) {
                $table->dropColumn('lembaga_id');
            });
        }
        if (Schema::hasColumn('penguruses', 'lembaga_id')) {
            Schema::table('penguruses', function (Blueprint $table) {
                $table->dropColumn('lembaga_id');
            });
        }
        if (Schema::hasColumn('inventaris', 'lembaga_id')) {
            Schema::table('inventaris', function (Blueprint $table) {
                $table->dropColumn('lembaga_id');
            });
        }
    }
};