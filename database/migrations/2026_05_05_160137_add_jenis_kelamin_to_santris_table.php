<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Menambahkan kolom jenis_kelamin ke tabel santris
        Schema::table('santris', function (Blueprint $table) {
            if (!Schema::hasColumn('santris', 'jenis_kelamin')) {
                $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable()->after('nama_santri');
            }
        });
    }

    public function down(): void
    {
        Schema::table('santris', function (Blueprint $table) {
            $table->dropColumn('jenis_kelamin');
        });
    }
};