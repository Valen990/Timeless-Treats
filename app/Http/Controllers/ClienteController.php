<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ClienteModel;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = DB::table('cliente')->get(); #select * from cliente
        return view('Clientes.ClientesView', compact('clientes')); 
    }

    public function form_registro()
    {
        $clientes = ClienteModel::all();
        return view('Clientes.form_registro', compact('clientes'));
    }

    public function registrar(Request $r)
    {
        $r->validate([
            'cedula_cliente' => 'required|string',
            'nombre_cliente' => 'required|string',
            'telefono_cliente' => 'required|string',
            'direccion_cliente' => 'required|string',
        ]);

        $clientes = new ClienteModel();
        $clientes->cedulaCliente = $r->input('cedula_cliente');
        $clientes->nombreCliente = $r->input('nombre_cliente');
        $clientes->telefonoCliente = $r->input('telefono_cliente');
        $clientes->direccionCliente = $r->input('direccion_cliente');

        $clientes->save(); 

        return redirect()->route('clientes')->with('success', '✅ Cliente registrado correctamente.');
    }

    public function form_edicion($cedulaCliente)
    {
        $clientes = ClienteModel::findOrFail($cedulaCliente);

        return view('Clientes.form_edicion', compact('clientes'));
    }

    public function actualizar(Request $r, $cedulaCliente)
    {
    $r->validate([
        'nombre_cliente' => 'required|string',
        'telefono_cliente' => 'required|string',
        'direccion_cliente' => 'required|string',
    ]);

    $clientes = ClienteModel::where('cedulaCliente', $cedulaCliente)->first();

    if (!$clientes) {
        return redirect()->route('clientes')->with('error', 'Cliente no encontrado.');
    }

    $clientes->nombreCliente = $r->input('nombre_cliente');
    $clientes->telefonoCliente = $r->input('telefono_cliente');
    $clientes->direccionCliente = $r->input('direccion_cliente');

    $clientes->save();

    return redirect()->route('clientes')->with('success', '✅ Cliente actualizado correctamente.');
    }

    public function eliminar($cedulaCliente)
    { 
    $tieneCompras = DB::table('cliente_compra_producto')
        ->where('cedulaCliente', $cedulaCliente)
        ->exists();

    if ($tieneCompras) {
        return redirect()->route('clientes')->with('error', 
            'No se puede eliminar el cliente porque tiene historial de compras.');
    }

    $cliente = ClienteModel::where('cedulaCliente', $cedulaCliente)->first();
    
    if ($cliente) {
        $cliente->delete();
        return redirect()->route('clientes')->with('success', 'Cliente eliminado correctamente.');
    }

    return redirect()->route('clientes')->with('error', 'Cliente no encontrado.');
}
}