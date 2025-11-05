<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductoModel;

class ProductoController extends Controller
{
    public function index(Request $request)
    {
        /* $productos = DB::table('producto')->get(); #select * from producto
        return view('Productos.ProductosView', compact('productos')); */

        $categorias = DB::table('categoria')->get();

        // Obtener el filtro seleccionado (si existe)
        $categoriaID = $request->input('categoria');

        // Si hay categoría seleccionada, filtrar
        if ($categoriaID) {
            $productos = DB::table('producto')
                ->where('categoriaID', $categoriaID)
                ->get();
        } else {
            $productos = DB::table('producto')->get();
        }

        return view('Productos.ProductosView', compact('productos', 'categorias', 'categoriaID'));
    }
}
