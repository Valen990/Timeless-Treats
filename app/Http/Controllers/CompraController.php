<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductoModel;
use App\Models\ClienteModel;
use App\Models\CompraModel;
use Illuminate\Support\Facades\Auth;//Se importa la clase Auth para poder usar el name del cliente en compras

class CompraController extends Controller
{
    // ======================================================
    // 1. Mostrar carrito
    // ======================================================
    public function index()
    {
        $compras = CompraModel::where('nombreCliente', Auth::user()->name)->get();
        return view('Compras.ComprasView', compact('compras'));
    }

    public function carrito()
    {
        $carrito = session()->get('carrito', []);
        return view('Compras.CarritoView', compact('carrito'));
    }

    // ======================================================
    // 2. Agregar producto al carrito
    // ======================================================
    public function agregarAlCarrito(Request $request)
    {
        $producto = ProductoModel::find($request->id);

        if (!$producto) {
            return back()->with('error', 'Producto no encontrado.');
        }

        $carrito = session()->get('carrito', []);

        $id = $producto->productoID; // clave primaria

        if (isset($carrito[$id])) {
            $carrito[$id]['cantidad']++; // ✅ usamos 'cantidad' en todo lado
        } else {
            $carrito[$id] = [
                'nombre'   => $producto->nombreProducto,
                'precio'   => $producto->precioProducto,
                'cantidad' => 1
            ];
        }

        session()->put('carrito', $carrito);

        return redirect()->route('carrito.index')
            ->with('success', 'Producto agregado al carrito.');
    }

    // ======================================================
    // 3. Eliminar producto del carrito
    // ======================================================
    public function eliminarDelCarrito($id)
    {
        $carrito = session()->get('carrito', []);

        if (isset($carrito[$id])) {
            unset($carrito[$id]);
            session()->put('carrito', $carrito);
        }

        return redirect()->route('carrito.index')
            ->with('success', 'Producto eliminado.');
    }

    // ======================================================
    // 4. Vaciar carrito completo
    // ======================================================
    public function vaciarCarrito()
    {
        session()->forget('carrito');

        return redirect()->route('carrito.index')
            ->with('success', 'Carrito vaciado.');
    }

    public function finalizarCompra(Request $request){

        $carrito = session()->get('carrito', []);
        $metodoPago = $request->input('metodoPago');

        if (empty($carrito)) {
            return back()->with('error', 'El carrito está vacío.');
        }

        if (!$metodoPago) {
            return back()->with('error', 'Debes seleccionar un método de pago.');
        }

        // Sumar cantidad total y total de la compra
        $cantidadTotal = collect($carrito)->sum('cantidad');
        $totalCompra = collect($carrito)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });

        // Guardar la compra
        CompraModel::create([
            'cantidadCompra' => $cantidadTotal,
            'fechaCompra'    => now()->toDateString(),
            'estadoCompra'   => 'Enviado',
            'metodoPago' => $request->metodoPago,
            'totalCompra'    => $totalCompra,
            'nombreCliente'  => Auth::user()->name,
        ]);

        // Vaciar el carrito
        session()->forget('carrito');

        return redirect()->route('compras.index')->with('success', 'Compra finalizada correctamente.');
    }
}
