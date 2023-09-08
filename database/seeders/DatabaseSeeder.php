<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    protected $nUsers = 10;
    protected $nPets = 30;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'nombre' => 'Cuidador',
            'apellidos' => 'Cui',
            'direccion' => 'Boo el Callejo',
            'cp' => '39120',
            'ciudad' => 'Liencres',
            'provincia' => 'Cantabria',
            'telefono' => '666777888',
            'fecha_nacimiento' => '1985-01-01',
            'fecha_baja' => NULL,
            'es_cuidador' => false,
            'usuario_activo' => true,
            'usuario_bloqueado' => false,
            'usuario_eliminado' => false,
            'usuario_admin' => false,
            'email' => 'cuidador@cuidador.com',
            'password' => Hash::make('cuidador1'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(20),
        ]);
        DB::table('users')->insert([
            'nombre' => 'Buscador',
            'apellidos' => 'Bus',
            'direccion' => 'Boo el Callejo',
            'cp' => '39120',
            'ciudad' => 'Liencres',
            'provincia' => 'Cantabria',
            'telefono' => '666111222',
            'fecha_nacimiento' => '1987-01-01',
            'fecha_baja' => NULL,
            'es_cuidador' => true,
            'usuario_activo' => true,
            'usuario_bloqueado' => false,
            'usuario_eliminado' => false,
            'usuario_admin' => false,
            'email' => 'buscador@buscador.com',
            'password' => Hash::make('buscador1'),
            'email_verified_at' => now(),
            'remember_token' => Str::random(20),
        ]);
        // Creamos usuarios y mascotas aleatoriamente
        \App\Models\User::factory($this->nUsers)->create();
        \App\Models\Mascota::factory($this->nPets)->create();
    }
}
