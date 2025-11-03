<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ProductoModel;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = DB::table('producto')->get(); #select * from producto
        return view('Productos.ProductosView', compact('productos')); 
    }
}
