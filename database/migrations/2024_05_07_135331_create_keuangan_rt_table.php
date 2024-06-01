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
        Schema::create('keuanganRT', function (Blueprint $table) {
            $table->id('id_keuanganRT');
            $table->enum('tipe', ['Keluar', 'Masuk']);
            $table->date('tanggal');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->unsignedBigInteger('rt_id');
            $table->integer('sisa_saldo')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengeluaran_rt');
    }
};
