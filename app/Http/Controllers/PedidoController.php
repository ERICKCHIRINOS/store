<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Empleado;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedido::with(['cliente', 'empleado'])->get();
        // dd($pedidos);
        $clientes = Cliente::all();
        $empleados = Empleado::all();
        return view('pedidos.index', compact('pedidos', 'clientes', 'empleados'));
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
            'cliente_id' => 'required|exists:clientes,id',
            'empleado_id' => 'required|exists:empleados,id',
            'numero_pedido' => 'required|string|max:20|unique:pedidos,numero_pedido',
            'fecha_pedido' => 'required|date',
            'fecha_entrega' => 'nullable|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:Pendiente,En Proceso,Entregado,Cancelado',
            'observaciones' => 'nullable|string|max:255'
        ],[
            'cliente_id.required' => 'El cliente es requerido',
            'cliente_id.exists' => 'El cliente seleccionado no existe',
            'empleado_id.required' => 'El empleado es requerido',
            'empleado_id.exists' => 'El empleado seleccionado no existe',
            'numero_pedido.required' => 'El número de pedido es requerido',
            'numero_pedido.max' => 'El número de pedido debe tener 20 caracteres como máximo',
            'fecha_pedido.required' => 'La fecha del pedido es requerida',
            'fecha_pedido.date' => 'La fecha del pedido debe ser una fecha válida',
            'fecha_entrega.date' => 'La fecha de entrega debe ser una fecha válida',
            'total.required' => 'El total es requerido',
            'total.numeric' => 'El total debe ser un número válido',
            'total.min' => 'El total debe ser un número positivo',
            'estado.required' => 'El estado es requerido',
            'estado.in' => 'El estado debe ser uno de los valores válidos',
            'observaciones.max' => 'Las observaciones deben tener 255 caracteres como máximo',
            'numero_pedido.unique' => 'El número de pedido ya existe en la base de datos'
        ]);

        Pedido::create($validate);

        return redirect()->route('pedidos.index')->with('status', 'Pedido creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedido $pedido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedido $pedido)
    {
        $validate = $request->validate([
            'numero_pedido' => 'required|string|max:20|unique:pedidos,numero_pedido,' . $pedido->id,
            'fecha_pedido' => 'required|date',
            'fecha_entrega' => 'nullable|date',
            'total' => 'required|numeric|min:0',
            'estado' => 'required|in:Pendiente,En Proceso,Entregado,Cancelado',
            'observaciones' => 'nullable|string|max:255'
        ],[
            'numero_pedido.required' => 'El número de pedido es requerido',
            'numero_pedido.max' => 'El número de pedido debe tener 20 caracteres como máximo',
            'numero_pedido.unique' => 'El número de pedido ya existe en la base de datos',
            'fecha_pedido.required' => 'La fecha del pedido es requerida',
            'fecha_pedido.date' => 'La fecha del pedido debe ser una fecha válida',
            'fecha_entrega.date' => 'La fecha de entrega debe ser una fecha válida',
            'total.required' => 'El total es requerido',
            'total.numeric' => 'El total debe ser un número válido',
            'total.min' => 'El total debe ser un número positivo',
            'estado.required' => 'El estado es requerido',
            'estado.in' => 'El estado debe ser uno de los valores válidos',
            'observaciones.max' => 'Las observaciones deben tener 255 caracteres como máximo'
        ]);

        $pedido->update($validate);

        return redirect()->route('pedidos.index')->with('status', 'Pedido actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pedido = Pedido::findOrFail($id);

        $pedido->delete();

        return redirect()->route('pedidos.index')->with('status', 'Pedido eliminado correctamente');
    }
}
