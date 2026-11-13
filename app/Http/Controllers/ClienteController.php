<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $codigo = $request->input('codigo');

        if ($codigo) {
            $clientes = Cliente::where('codigo', $codigo)->get();
        } else {
            $clientes = Cliente::all();
        }

        // $clientes = Cliente::all();
        // dd($clientes);
        return view('clientes.index', compact('clientes'));
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
            'codigo' => 'required|string|max:20|unique:clientes,codigo',
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:clientes,email',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|in:Activo,Inactivo',
        ],[
            'codigo.required' => 'El codigo es requerido.',
            'codigo.string' => 'El codigo debe ser de tipo string.',
            'codigo.max' => 'El codigo debe tener 20 caracteres como maximo',
            'codigo.unique' => 'El codigo ingresado ya existe en la base de datos',
            'nombre.required' => 'El nombre es requerido.',
            'email.required' => 'El email es requerido.',
            'estado.required' => 'El estado es requerido.'
        ]
        );

        Cliente::create($validate);

        return redirect()->route('clientes.index')->with('status', 'Cliente creado exitosamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cliente $cliente)
    {
        $validate = $request->validate([
            'codigo' => 'required|string|max:20|unique:clientes,codigo,' . $cliente->id,
            'nombre' => 'required|string|max:100',
            'email' => 'required|email|max:100|unique:clientes,email,' . $cliente->id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string|max:255',
            'estado' => 'required|in:Activo,Inactivo',
        ],[
            'codigo.required' => 'El codigo es requerido.',
            'nombre.required' => 'El nombre es requerido.',
            'email.required' => 'El email es requerido.',
            'estado.required' => 'El estado es requerido.'
        ]);

        $cliente->update($validate);

        return redirect()->route('clientes.index')->with('status', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cliente = Cliente::findOrFail($id);

        $cliente->delete();

        return redirect()->route('clientes.index')->with('status', 'Cliente eliminando correctamente.');
    }

}
