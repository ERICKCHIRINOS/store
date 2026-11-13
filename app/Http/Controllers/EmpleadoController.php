<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();
        // dd($empleados);
        return view('empleados.index', compact('empleados'));

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
            'codigo' => 'required|string|unique:empleados,codigo|max:20',
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|unique:empleados,email|max:100',
            'cargo' => 'required|string|max:60',
            'fecha_contratacion' => 'required',
            'estado' => 'required'
        ],
        [
            'codigo.required' => 'El codigo es requerido',
            'codigo.unique' => 'El codigo ingresado ya existe en la base de datos',
            'nombre.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ingresado ya existe en la base de datos',
            'cargo.required' => 'El cargo es requerido',
            'fecha_contratacion.required' => 'La fecha de contratacion es requerida',
            'estado.required' => 'El estado es requerido'
        ]
        );

        Empleado::create($validate);

        return redirect()->route('empleados.index')->with('status', 'Empleado creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        $validate = $request->validate([
            'codigo' => 'required|string|max:20|unique:empleados,codigo,' . $empleado->id,
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:empleados,email,' . $empleado->id,
            'cargo' => 'required|string|max:60',
            'fecha_contratacion' => 'required',
            'estado' => 'required'
        ],[
            'codigo.required' => 'El codigo es requerido',
            'codigo.unique' => 'El codigo ingresado ya existe en la base de datos',
            'nombre.required' => 'El nombre es requerido',
            'email.required' => 'El email es requerido',
            'email.unique' => 'El email ingresado ya existe en la base de datos',
            'cargo.required' => 'El cargo es requerido',
            'fecha_contratacion.required' => 'La fecha de contratacion es requerida',
            'estado.required' => 'El estado es requerido'
        ]);

        $empleado->update($validate);

        return redirect()->route('empleados.index')->with('status', "Empleado actualizado correctamente");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $empleado = Empleado::findOrFail($id);

        $empleado->delete();

        return redirect()->route('empleados.index')->with('status', 'Empleado eliminado correctamente');
    }
}
