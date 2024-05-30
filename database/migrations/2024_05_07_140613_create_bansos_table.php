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
            $table->float('K1');
            $table->float('K2');
            $table->float('K3');
            $table->float('K4');
            $table->float('K5');
            $table->float('K6');
            $table->float('K7');
            $table->float('K8');
            $table->float('K9');
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
