<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Pedido>
 */
class PedidoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        return [
            'cliente_id' => Cliente::factory(),
            'empleado_id' => Empleado::factory(),
            'numero_pedido' => fake()->unique()->bothify('PED-#####'),
            'fecha_pedido' => fake()->date(),
            'fecha_entrega' => fake()->optional()->date(),
            'total' => fake()->randomFloat(2, 0, 100000),
            'estado' => fake()->randomElement([
                'Pendiente',
                'En Proceso',
                'Entregado',
                'Cancelado',
            ]),
            'observaciones' => fake()->optional()->sentence(),
        ];
    }
}
