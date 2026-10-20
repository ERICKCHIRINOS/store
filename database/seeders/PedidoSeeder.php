<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Empleado;
use App\Models\Pedido;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PedidoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $clientes = Cliente::all();
        $empleados = Empleado::all();

        Pedido::factory()
            ->count(15)
            ->create([
                'cliente_id' => fn () => $clientes->random()->id,
                'empleado_id' => fn () => $empleados->random()->id,
            ]);
    }
}
