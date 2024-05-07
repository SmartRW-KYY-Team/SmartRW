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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('nik');
            $table->string('nama');
            $table->date('tgl_lahir');
            $table->string('tempat_lahir');
            $table->enum('jenis_kelamin', ['Laki', 'Perempuan']);
            $table->unsignedBigInteger('agama');
            $table->enum('status_perkawinan', ['Kawin', 'Belum Kawin']);
            $table->string('pekerjaan');
            $table->string('password');
            $table->string('notelp');
            $table->unsignedBigInteger('keluarga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
