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
        Schema::create('cuidador', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_usuario');
            $table->string('descripcion', 255)->charset('utf8mb4');
            $table->boolean('perro')->default(false);
            $table->boolean('gato')->default(false);
            $table->boolean('hamster')->default(false);
            $table->boolean('cobaya')->default(false);
            $table->boolean('conejo')->default(false);
            $table->boolean('huron')->default(false);
            $table->boolean('ave')->default(false);
            $table->boolean('pez')->default(false);
            $table->boolean('reptil')->default(false);
            $table->boolean('tortuga')->default(false);
            $table->boolean('otros')->default(false);
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cuidador');
    }
};
