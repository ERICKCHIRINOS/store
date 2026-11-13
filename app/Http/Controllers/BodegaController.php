<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodegas = Bodega::all();
        return view('bodegas.index', compact('bodegas'));
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
            'nombre'=> 'required|string|max:100',
            'descripcion'=>'required|string|max:255',
            'codigo' =>'required|string',
        ],
        [
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre debe tener 100 caracteres como máximo',
            'descripcion.required' => 'La descripcion es requerida',
            'descripcion.max' => 'La descripcion debe tener 255 caracteres como máximo',
            'codigo.required' => 'El codigo es requerido'
        ]);

        Bodega::create($validate);

        return redirect()->route('bodegas.index')->with('status','Bodega registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bodega $bodega)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodega $bodega)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bodega $bodega)
    {
        $validate = $request->validate([
            'nombre'=> 'required|string|max:80',
            'descripcion'=>'required|string|max:255',
            'codigo' =>'required|string',
        ],[
            'nombre.required' => 'El nombre es requerido',
            'nombre.max' => 'El nombre debe tener 80 caracteres como máximo',
            'descripcion.required' => 'La descripcion es requerida',
            'descripcion.max' => 'La descripcion debe tener 255 caracteres como máximo',
            'codigo.required' => 'El codigo es requerido'
        ]);

        $bodega->update($validate);

        return redirect()->route('bodegas.index')->with('status','Registro de Bodega actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $bodega = Bodega::findOrFail($id);

        $bodega->delete();

        return redirect()->route('bodegas.index')->with('status', 'Bodega eliminada exitosamente');
    }
}
