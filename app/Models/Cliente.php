<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Cliente extends Model
{
    /** @use HasFactory<\Database\Factories\ClienteFactory> */
    use HasFactory;

    protected $fillable = [
        'codigo',
        'nombre',
        'email',
        'telefono',
        'direccion',
        'estado'
    ];

    public function pedidos(){
        return $this->hasMany(Pedido::class);
    }
}
