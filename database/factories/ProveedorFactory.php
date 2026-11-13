<?php

namespace Database\Factories;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Proveedor>
 */
class ProveedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->bothify('PROV-#####'),
            'nombre' => fake()->words(2, true),
            'email' => fake()->unique()->safeEmail(),
            'telefono' => fake()->numerify('+504 ########'),
            'fecha_enrolamiento' => fake()->date(),
            'estado' => $this->faker->randomElement([
                'Activo',
                'Inactivo',
            ]),
        ];
    }
}
