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
        Schema::create('estancias_mascota', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('id_mascota');
            $table->unsignedBigInteger('id_estancia');

            $table->foreign('id_mascota')
                ->references('id')
                ->on('mascota');
            $table->foreign('id_estancia')
                ->references('id')
                ->on('estancia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estancias_mascota');
    }
};
