<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mascota>
 */
class MascotaFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $tipos = [
			'perro',
			'gato',
			'hamster',
			'cobaya',
            'conejo',
			'huron',
			'ave',
			'pez',
			'reptil',
			'tortuga',
            'otros'
		];
        return [
            'id_usuario' => User::all()->random()->id,
            'nombre' => fake()->name(),
            'sexo' => fake()->numberBetween($min = 0, $max = 2),
            'tipo' => $tipos[fake()->numberBetween(0, count($tipos) - 1)],
            'otro' => fake()->city(),
            'raza' => fake()->country(),
            'edad' => fake()->date($format = 'Y-m-d', $max = now()),
            'tamanio' => fake()->numberBetween($min = 0, $max = 2),
            'esterilizado' => (bool)random_int(0, 1),
            'descripcion' => fake()->realText($maxNbChars = 100, $indexSize = 2),
            'puede_estar_solo' => (bool)random_int(0, 1),
            'eliminada' => false
        ];
    }
}
