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
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('aset');
            $table->integer('jumlah')->default(1);
            $table->enum('kategori', [
                'Gedung',
                'Furnitur',
                'Elektronik',
                'Perlengkapan Administrasi & Kantor',
                'Sarana Pendukung',
                'Kendaraan'
            ]);
            $table->enum('kondisi', [ // Gw pake nama kolom 'kondisi' ya biar baku
                'Baik',
                'Rusak Ringan',
                'Rusak Sedang',
                'Rusak Berat',
                'Dalam Peminjaman'
            ]);
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
