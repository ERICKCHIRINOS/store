<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Empleado;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        // dd($categorias);
        return view('categorias.index', compact('categorias'));
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
            'nombre' => 'required|string|max:80|unique:categorias,nombre',
            'descripcion' => 'nullable|string|max:255',
            'estado' => 'required|in:Activo,Inactivo',
        ],[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.string' => 'El nombre debe ser de tipo string.',
            'nombre.max' => 'El nombre debe tener 80 caracteres como maximo',
            'nombre.unique' => 'El nombre ingresado ya existe en la base de datos',
            'estado.required' => 'El estado es requerido.'
        ]
        );

        Categoria::create($validate);

        return redirect()->route('categorias.index')->with('status', 'Categoria creada exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $validate = $request->validate([
            'nombre' => 'required|string|max:80|unique:categorias,nombre,' . $categoria->id,
            'descripcion' => 'nullable|string|max:255',
            'estado' => 'required|in:Activo,Inactivo',
        ],[
            'nombre.required' => 'El nombre es requerido.',
            'nombre.string' => 'El nombre debe ser de tipo string.',
            'nombre.max' => 'El nombre debe tener 80 caracteres como maximo',
            'nombre.unique' => 'El nombre ingresado ya existe en la base de datos',
            'estado.required' => 'El estado es requerido.'
        ]
        );

        $categoria->update($validate);

        return redirect()->route('categorias.index')->with('status', "Categoria actualizada correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $categoria = Categoria::findOrFail($id);

        $categoria->delete();

        return redirect()->route('categorias.index')->with('status', 'Categoria eliminada exitosamente');
    }
}
