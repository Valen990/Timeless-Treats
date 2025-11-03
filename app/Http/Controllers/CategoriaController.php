<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CategoriaModel;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = DB::table('categoria')->get(); #select * from categoria
        return view('Categorias.CategoriasView', compact('categorias')); 
    }
}
