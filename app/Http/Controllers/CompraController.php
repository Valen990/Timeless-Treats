<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function index()
    {
        $compras = DB::table('cliente_compra_producto')->get(); #select * from cliente_compra_producto
        return view('Compras.ComprasView', compact('compras')); 
    }
}
