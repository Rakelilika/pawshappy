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
        Schema::create('foto', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_mascota');
            $table->unsignedBigInteger('id_cuidador');
            $table->unsignedBigInteger('id_estancia');
            $table->tinyInteger('tipo');
            $table->string('ruta')->charset('utf8mb4');
            $table->string('fotografia')->charset('utf8mb4');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
            $table->foreign('id_mascota')->references('id')->on('mascota');
            $table->foreign('id_cuidador')->references('id')->on('cuidador');
            $table->foreign('id_estancia')->references('id')->on('estancia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('foto');
    }
};
