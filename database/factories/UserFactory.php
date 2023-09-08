<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => fake()->name(),
            'apellidos' => fake()->lastName(),
            'direccion' => fake()->address(),
            'cp' => fake()->postcode(),//fake()->numberBetween($min = 1, $max = 99999),
            'ciudad' => fake()->city(),
            'provincia' => fake()->state(),
            'telefono' => fake()->phoneNumber(),
            'fecha_nacimiento' => fake()->date($format = 'Y-m-d', $max = '-18 years'),
            'fecha_baja' => NULL,
            'es_cuidador' => (bool)random_int(0, 1),
            'usuario_activo' => true,
            'usuario_bloqueado' => false,
            'usuario_eliminado' => false,
            'usuario_admin' => false,
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'), //'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'email_verified_at' => now(),
            'remember_token' => Str::random(20)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
