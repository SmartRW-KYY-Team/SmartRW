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
        Schema::create('suratDomisili', function (Blueprint $table) {
            $table->id('id_suratDomisili');
            $table->unsignedBigInteger('pemohon_id');
            $table->string('status');
            $table->text('keterangan');
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
        Schema::dropIfExists('surat_domisili');
    }
};
