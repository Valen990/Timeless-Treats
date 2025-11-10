<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;

class ProductoController extends Controller
{
    public function index(Request $r)
    {
        $categorias = DB::table('categoria')->get();

        // Filtro opcional por categoría
        $categoriaID = $r->input('categoria');
        if ($categoriaID) {
            $productos = DB::table('producto')
                ->where('categoriaID', $categoriaID)
                ->get();
        } else {
            $productos = DB::table('producto')->get();
        }

        return view('Productos.ProductosView', compact('productos', 'categorias', 'categoriaID'));
    }

    public function form_registro()
    {
        $categorias = CategoriaModel::all();
        return view('Productos.form_registro', compact('categorias'));
    }

    public function registrar(Request $r)
    {
        $r->validate([
            'producto_id' => 'required|string',
            'nombre_producto' => 'required|string',
            'descripcion_producto' => 'required|string',
            'stock_producto' => 'required|integer|min:1',
            'precio_producto' => 'required|numeric|min:0',
            'foto_producto' => 'nullable|image|max:2048',
            'categoria' => 'required|integer',
        ]);

        $productos = new ProductoModel();
        $productos->productoID = $r->input('producto_id');
        $productos->nombreProducto = $r->input('nombre_producto');
        $productos->descripcionProducto = $r->input('descripcion_producto');
        $productos->stockProducto = $r->input('stock_producto');
        $productos->precioProducto = $r->input('precio_producto');

        if ($r->hasFile('foto_producto')) {
            $file = $r->file('foto_producto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imagenes/productos'), $filename);
            $productos->fotoProducto = $filename;
        } else {
            $productos->fotoProducto = 'default.png';
        }

        $productos->categoriaID = $r->input('categoria');
        $productos->save();

        return redirect()->route('productos')->with('success', '✅ Producto registrado correctamente.');
    }

    public function form_edicion($productoID)
    {
        $categorias = CategoriaModel::all();
        $productos = ProductoModel::findOrFail($productoID);

        return view('Productos.form_edicion', compact('productos', 'categorias'));
    }

    public function actualizar(Request $r, $productoID)
    {
        $r->validate([
            'producto_id' => 'required|string',
            'nombre_producto' => 'required|string',
            'descripcion_producto' => 'required|string',
            'stock_producto' => 'required|integer|min:1',
            'precio_producto' => 'required|numeric|min:0',
            'foto_producto' => 'nullable|image|max:2048',
            'categoria' => 'required|integer',
        ]);

        $productos = ProductoModel::findOrFail($productoID);
        $productos->productoID = $r->input('producto_id');
        $productos->nombreProducto = $r->input('nombre_producto');
        $productos->descripcionProducto = $r->input('descripcion_producto');
        $productos->stockProducto = $r->input('stock_producto');
        $productos->precioProducto = $r->input('precio_producto');

        if ($r->hasFile('foto_producto')) {
            $file = $r->file('foto_producto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('imagenes/productos'), $filename);
            $productos->fotoProducto = $filename;
        }

        $productos->categoriaID = $r->input('categoria');
        $productos->save();

        return redirect()->route('productos')->with('success', '✅ Producto actualizado correctamente.');
    }

    public function eliminar($productoID)
    {
        $productos = ProductoModel::findOrFail($productoID);
        $productos->delete();

        return redirect()->route('productos')->with('success', '🗑️ Producto eliminado correctamente.');
    }
}
