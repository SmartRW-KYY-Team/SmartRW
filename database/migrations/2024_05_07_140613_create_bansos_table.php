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
        Schema::create('bansos', function (Blueprint $table) {
            $table->id('id_bansos');
            $table->unsignedBigInteger('keluarga_id');
            $table->string('alternative');
            $table->double('K1');
            $table->double('K2');
            $table->double('K3');
            $table->double('K4');
            $table->double('K5');
            $table->double('K6');
            $table->double('K7');
            $table->double('K8');
            $table->double('K9');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bansos');
    }
};
