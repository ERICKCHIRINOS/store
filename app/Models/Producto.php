<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categoria;

class Producto extends Model
{
    /** @use HasFactory<\Database\Factories\ProductoFactory> */
    use HasFactory;

    protected $fillable = [
        'categoria_id',
        'codigo',
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'estado'
    ];

    public function categoria (){
        return $this->belongsTo(Categoria::class);
    }
}
