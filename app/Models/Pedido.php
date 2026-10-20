<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Empleado;
use App\Models\Cliente;

class Pedido extends Model
{
    /** @use HasFactory<\Database\Factories\PedidoFactory> */
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'empleado_id',
        'numero_pedido',
        'fecha_pedido',
        'fecha_entrega',
        'total',
        'estado',
        'observaciones'
    ];

    public function empleado(){
        return $this->belongsTo(Empleado::class);
    }

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
