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
        Schema::create('pemasukanRW', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('jumlah');
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
        Schema::dropIfExists('pemasukan_rw');
    }
};
