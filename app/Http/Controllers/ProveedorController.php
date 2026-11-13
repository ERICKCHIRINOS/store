<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proveedores = Proveedor::all();

        return view('proveedores.index', compact('proveedores'));
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
            'codigo' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_enrolamiento' => 'required',
            'estado' => 'required'
        ]);

        Proveedor::create($validate);

        return redirect()->route('proveedor.index')->with('status', 'Proveedor creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Proveedor $proveedor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
    {
        $validate = $request->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'fecha_enrolamiento' => 'required',
            'estado' => 'required'
        ]);

        Proveedor::update($validate);

        return redirect()->route('proveedor.index')->with('status', 'Proveedor creado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $proveedor = Proveedor::findOrFail($id);

        $proveedor->delete();

        return redirect()->route('proveedor.index')->with('succes', 'Proveedor eliminado correctamente');
    }
}
