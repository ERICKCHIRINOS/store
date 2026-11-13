<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Producto::with('categoria')->get();
        // dd($productos);
        $categorias = Categoria::all();
        return view('productos.index', compact('productos', 'categorias'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'codigo' => 'required|string|max:20|unique:productos,codigo',
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'estado' => 'required|in:Activo,Inactivo'
        ],[
            'categoria_id.required' => 'La categoria es requerida.',
            'categoria_id.exists' => 'La categoria seleccionada no es valida.',
            'codigo.required' => 'El codigo es requerido.',
            'codigo.string' => 'El codigo debe ser de tipo string.',
            'codigo.max' => 'El codigo debe tener 20 caracteres como maximo',
            'codigo.unique' => 'El codigo ingresado ya existe en la base de datos',
            'nombre.required' => 'El nombre es requerido.',
            'precio.required' => 'El precio es requerido.',
            'precio.numeric' => 'El precio debe ser un numero.',
            'precio.min' => 'El precio debe ser mayor o igual a 0.',
            'stock.required' => 'El stock es requerido.',
            'stock.integer' => 'El stock debe ser un numero entero.',
            'stock.min' => 'El stock debe ser mayor o igual a 0.',
            'estado.required' => 'El estado es requerido.'
        ]);

        Producto::create($validate);

        return redirect()->route('productos.index')->with('status', 'Producto creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        $validate = $request->validate([
            'codigo' => 'required|string|max:20|unique:productos,codigo,' . $producto->id,
            'nombre' => 'required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'estado' => 'required|in:Activo,Inactivo'
        ],[
            'codigo.required' => 'El codigo es requerido.',
            'codigo.string' => 'El codigo debe ser de tipo string.',
            'codigo.max' => 'El codigo debe tener 20 caracteres como maximo',
            'codigo.unique' => 'El codigo ingresado ya existe en la base de datos',
            'nombre.required' => 'El nombre es requerido.',
            'precio.required' => 'El precio es requerido.',
            'precio.numeric' => 'El precio debe ser un numero.',
            'precio.min' => 'El precio debe ser mayor o igual a 0.',
            'stock.required' => 'El stock es requerido.',
            'stock.integer' => 'El stock debe ser un numero entero.',
            'stock.min' => 'El stock debe ser mayor o igual a 0.',
            'estado.required' => 'El estado es requerido.'
        ]);

        $producto->update($validate);

        return redirect()->route('productos.index')->with('status', 'Producto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $producto = Producto::findOrFail($id);

        $producto->delete();

        return redirect()->route('productos.index')->with('status', 'Producto eliminado correctamente');
    }
}
