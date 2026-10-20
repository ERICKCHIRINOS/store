<?php

namespace Database\Factories;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo' => fake()->unique()->bothify('EMP-#####'),
            'nombre' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'cargo' => fake()->jobTitle(),
            'fecha_contratacion' => fake()->date(),
            'estado' => $this->faker->randomElement([
                'Activo',
                'Inactivo',
            ]),
        ];
    }
}
