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
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('direccion');
            $table->integer('cp');
            $table->string('ciudad');
            $table->string('provincia');
            $table->string('telefono');
            $table->date('fecha_nacimiento');
            $table->date('fecha_baja')->nullable();
            $table->boolean('es_cuidador')->default(false);
            $table->boolean('usuario_activo')->default(true);
            $table->boolean('usuario_bloqueado')->default(false);
            $table->boolean('usuario_eliminado')->default(false);
            $table->boolean('usuario_admin')->default(false);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
