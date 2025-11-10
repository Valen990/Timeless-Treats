<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaModel;
use App\Models\ProductoModel;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = CategoriaModel::all(); // select * from (categoria)
        $totalCategorias = CategoriaModel::count();
        $totalProductos = ProductoModel::count();
        return view('Categorias.CategoriasView', compact('categorias', 'totalCategorias', 'totalProductos')); 
    }

    public function form_registro()
    {
        //Al dar click en añadir categoría, retorna a la vista del formulario
        return view('Categorias.form_registro');
    }

    public function registrar(Request $r){
        $r->validate([
            'categoria_id' => 'required|string',
            'nombre_categoria' => 'required|string',
            'descripcion_categoria' => 'required|string',
        ]);

        $categorias= new CategoriaModel();
        $categorias->categoriaID = $r->input('categoria_id');
        $categorias->nombreCategoria = $r->input('nombre_categoria');
        $categorias->descripcionCategoria = $r->input('descripcion_categoria');
        $categorias->save();
        return redirect()->route('categorias')->with('success', '✅Categoría creada correctamente.');
    }

    public function form_edicion($categoriaID){
        /*
        Esta función sera invocada cuando el usuario le de clic en Editar
        Retorna la vista de categorias
        */
        $categorias = CategoriaModel::findOrFail($categoriaID); // Retorna el registro cuyo id corresponda
        return view('Categorias.form_edicion', compact('categorias'));
    }

    public function actualizar(Request $request, $categoriaID)
    {
        $request->validate([
            //'categoria_id' => 'required|string',
            'descripcion_categoria' => 'required|string',
            'nombre_categoria' => 'required|string',
        ]);

        $categorias = CategoriaModel::findOrFail($categoriaID);
        //$categoria->categoriaID = $request->categoria_id;
        $categorias->nombreCategoria = $request->nombre_categoria;
        $categorias->descripcionCategoria = $request->descripcion_categoria;
        $categorias->save();

        return redirect()->route('categorias')->with('success', '✅ Categoria actualizada correctamente.');
    }

    public function eliminar($categoriaID)
    {
        $categorias = CategoriaModel::findOrFail($categoriaID);
        $categorias->delete();

        return redirect()->route('categorias')->with('success', '🗑️ Categoria eliminada correctamente.');
    }
}
