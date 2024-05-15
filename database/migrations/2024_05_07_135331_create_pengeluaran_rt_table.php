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
        Schema::create('pengeluaranRT', function (Blueprint $table) {
            $table->id('id_pengeluaranRT');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->integer('jumlah');
            $table->unsignedBigInteger('rt_id');
            $table->unsignedBigInteger('rw_id');
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
