<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lembagas', function (Blueprint $table) {
            $table->id();
            $table->string('nama_madrasah')->nullable();
            $table->text('alamat')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kurikulum')->nullable();
            $table->string('waktu_penyelenggaraan')->nullable(); // Pagi/Siang
            $table->string('jam_kbm')->nullable(); // Misal: 07.00 - 13.00
            $table->string('nsm')->nullable(); // No Statistik Madrasah
            $table->string('tahun_berdiri')->nullable();
            $table->string('ijin_operasional')->nullable();
            $table->string('no_telp')->nullable();
            $table->string('nama_yayasan')->nullable();
            $table->text('alamat_yayasan')->nullable();
            $table->string('sk_menkumham')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lembagas');
    }
};
