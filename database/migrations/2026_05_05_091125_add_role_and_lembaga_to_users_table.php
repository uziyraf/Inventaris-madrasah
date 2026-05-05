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
        Schema::table('users', function (Blueprint $table) {
            // Role defaultnya lembaga
            $table->enum('role', ['yayasan', 'lembaga'])->default('lembaga');

            // lembaga_id buat ngunci data. Boleh kosong (nullable) karena Yayasan kaga terikat 1 lembaga
            $table->unsignedBigInteger('lembaga_id')->nullable();

            // Relasi ke tabel lembagas
            $table->foreign('lembaga_id')->references('id')->on('lembagas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['lembaga_id']);
            $table->dropColumn(['role', 'lembaga_id']);
        });
    }
};
