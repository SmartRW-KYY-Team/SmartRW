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
        //
        Schema::create('kriteria_bansos', function (Blueprint $table) {
            $table->id('id_kriteria_bansos');
            $table->string('nama_kriteria');
            $table->double('pendapatan');
            $table->double('kendaraan');
            $table->double('jenis_lantai');
            $table->double('kondisi_dinding');
            $table->double('kondisi_atap');
            $table->double('tanggungan');
            $table->double('listrik');
            $table->double('luas_tanah');
            $table->double('luas_bangunan');
            $table->double('bobot')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
