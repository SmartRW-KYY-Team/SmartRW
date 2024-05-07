<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('suratSKTM', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pemohon');
            $table->string('nama_orang_tua');
            $table->string('pekerjaan_orang_tua');
            $table->integer('gaji_orang_tua');
            $table->string('status');
            $table->text('keterangan');
            $table->unsignedBigInteger('rt');
            $table->unsignedBigInteger('rw');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_sktm');
    }
};
