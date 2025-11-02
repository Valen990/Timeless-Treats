<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $compras =[
            [
                'cantidadCompra' => 2,
                'fechaCompra' => '2025-10-01',
                'estadoCompra' => 'Entregada',
                'metodoPago' => 'Tarjeta de crédito',
                'totalCompra' => 90000,
                'cedulaCliente' => '1001234567',
                'productoID' => 1 // Torta de chocolate
            ],

            [
                'cantidadCompra' => 1,
                'fechaCompra' => '2025-10-05',
                'estadoCompra' => 'Entregada',
                'metodoPago' => 'Efectivo',
                'totalCompra' => 48000,
                'cedulaCliente' => '1012345678',
                'productoID' => 2 // Torta de tres leches
            ],

            [
                'cantidadCompra' => 6,
                'fechaCompra' => '2025-10-10',
                'estadoCompra' => 'Entregada',
                'metodoPago' => 'Transferencia',
                'totalCompra' => 36000,
                'cedulaCliente' => '1023456789',
                'productoID' => 3 // Cupcake de vainilla
            ],

            [
                'cantidadCompra' => 3,
                'fechaCompra' => '2025-10-15',
                'estadoCompra' => 'Pendiente',
                'metodoPago' => 'Nequi',
                'totalCompra' => 28500,
                'cedulaCliente' => '1034567890',
                'productoID' => 4 // Cupcake red velvet
            ],
            
            [
                'cantidadCompra' => 4,
                'fechaCompra' => '2025-10-20',
                'estadoCompra' => 'Entregada',
                'metodoPago' => 'Efectivo',
                'totalCompra' => 22000,
                'cedulaCliente' => '1078901234',
                'productoID' => 8 // Croissant de mantequilla
            ]
        ];
        DB::table('cliente_compra_producto')->insert($compras);
    }
}
