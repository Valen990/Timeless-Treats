<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = DB::table('cliente')->get(); #select * from cliente
        return view('Clientes.ClientesView', compact('clientes')); 
    }
}
