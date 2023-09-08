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
        Schema::create('mascota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre', 50)->charset('utf8mb4')->charset('utf8mb4');
            $table->tinyInteger('sexo');
            $table->tinyText('tipo');
            $table->string('otro', 50)->charset('utf8mb4')->nullable();
            $table->string('raza', 50)->charset('utf8mb4');
            $table->date('edad');
            $table->tinyInteger('tamanio');
            $table->boolean('esterilizado');
            $table->string('descripcion', 255)->charset('utf8mb4');
            $table->boolean('puede_estar_solo');
            $table->boolean('eliminada');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascota');
    }
};
