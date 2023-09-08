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
        //TODO precios para paseos?
        Schema::create('precio', function (Blueprint $table) {
            $value = 0;
            $table->id();
            $table->unsignedBigInteger('id_cuidador');
            $table->float('perro')->default($value);
            $table->float('gato')->default($value);
            $table->float('hamster')->default($value);
            $table->float('cobaya')->default($value);
            $table->float('conejo')->default($value);
            $table->float('huron')->default($value);
            $table->float('ave')->default($value);
            $table->float('pez')->default($value);
            $table->float('reptil')->default($value);
            $table->float('tortuga')->default($value);
            $table->float('otros')->default($value);
            $table->timestamps();
            $table->foreign('id_cuidador')->references('id')->on('cuidador');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precio');
    }
};
