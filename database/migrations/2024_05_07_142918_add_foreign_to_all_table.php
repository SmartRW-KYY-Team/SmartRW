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
        // Add foreign user
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('agama_id')->references('id_agama')->on('agama');
            $table->foreign('keluarga_id')->references('id_keluarga')->on('keluarga');
        });
        // Add foreign rt
        Schema::table('rt', function (Blueprint $table) {
            $table->foreign('ketua_id')->references('id_user')->on('users');
            $table->foreign('sekretaris_id')->references('id_user')->on('users');
            $table->foreign('bendahara_id')->references('id_user')->on('users');
        });
        // Add foreign rw
        Schema::table('rw', function (Blueprint $table) {
            $table->foreign('ketua_id')->references('id_user')->on('users');
            $table->foreign('sekretaris_id')->references('id_user')->on('users');
            $table->foreign('bendahara_id')->references('id_user')->on('users');
        });
        // Add foreign keluarga
        Schema::table('keluarga', function (Blueprint $table) {
            $table->foreign('kepala_keluarga_id')->references('id_user')->on('users');
            $table->foreign('rt_id')->references('id_rt')->on('rt');
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign pengaduan
        Schema::table('pengaduan', function (Blueprint $table) {
            $table->foreign('pengadu_id')->references('id_user')->on('users');
            $table->foreign('rt_id')->references('id_rt')->on('rt');
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign kegiatan
        Schema::table('kegiatan', function (Blueprint $table) {
            $table->foreign('rt_id')->references('id_rt')->on('rt');
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign suratDomisili
        Schema::table('suratDomisili', function (Blueprint $table) {
            $table->foreign('pemohon_id')->references('id_user')->on('users');
            $table->foreign('rt_id')->references('id_rt')->on('rt');
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign suratSKTM
        Schema::table('suratSKTM', function (Blueprint $table) {
            $table->foreign('pemohon_id')->references('id_user')->on('users');
            $table->foreign('rt_id')->references('id_rt')->on('rt');
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign pemasukan RT
        Schema::table('pemasukanRT', function (Blueprint $table) {
            $table->foreign('user_id')->references('id_user')->on('users');
            $table->foreign('rt_id')->references('id_rt')->on('rt');
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign pengeluaran RT
        Schema::table('pengeluaranRT', function (Blueprint $table) {
            $table->foreign('rt_id')->references('id_rt')->on('rt');
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign pemasukan RW
        Schema::table('pemasukanRW', function (Blueprint $table) {
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign pengeluaran RW
        Schema::table('pengeluaranRW', function (Blueprint $table) {
            $table->foreign('rw_id')->references('id_rw')->on('rw');
        });
        // Add foreign administrator
        Schema::table('administrator', function (Blueprint $table) {
            $table->foreign('role_id')->references('id_role')->on('role');
        });
        // Add foreign bansos
        Schema::table('bansos', function (Blueprint $table) {
            $table->foreign('keluarga_id')->references('id_keluarga')->on('keluarga');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('rt');
        Schema::dropIfExists('rw');
        Schema::dropIfExists('keluarga');
        Schema::dropIfExists('pengaduan');
        Schema::dropIfExists('kegiatan');
        Schema::dropIfExists('suratDomisili');
        Schema::dropIfExists('suratSKTM');
        Schema::dropIfExists('pemasukanRT');
        Schema::dropIfExists('pengeluaranRT');
        Schema::dropIfExists('pemasukanRW');
        Schema::dropIfExists('pengeluaranRW');
        Schema::dropIfExists('administrator');
        Schema::dropIfExists('bansos');
    }
};
