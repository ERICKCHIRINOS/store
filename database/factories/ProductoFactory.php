<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id' => Categoria::factory(),
            'codigo' => fake()->unique()->bothify('PRO-#####'),
            'nombre' => fake()->words(2, true),
            'descripcion' => fake()->optional()->sentence(),
            'precio' => fake()->randomFloat(2, 1, 50000),
            'stock' => fake()->numberBetween(0, 500),
            'estado' => fake()->randomElement([
                'Activo',
                'Inactivo',
            ]),
        ];
    }
}
