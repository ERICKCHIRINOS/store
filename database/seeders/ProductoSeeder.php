<?php

namespace Database\Seeders;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        $categorias = Categoria::all();

        Producto::factory()
            ->count(15)
            ->create([
                'categoria_id' => fn () => $categorias->random()->id,
            ]);
    }
}
