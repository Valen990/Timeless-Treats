<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Considerar quitar cedulaCliente de aquí.
        $productos =[
            [
                'productoID' => 1,
                'nombreProducto' => 'Torta de chocolate',
                'descripcionProducto' => 'Torta húmeda de chocolate con cobertura de ganache.',
                'precioProducto' => 45000,
                'fotoProducto' => 'torta_chocolate.jpg',
                'stockProducto' => 10,
                'cedulaCliente' => '1001234567',
                'categoriaID' => 1
            ],

            [
                'productoID' => 2,
                'nombreProducto' => 'Torta de tres leches',
                'descripcionProducto' => 'Bizcocho bañado en mezcla de tres leches y cubierta con merengue.',
                'precioProducto' => 48000,
                'fotoProducto' => 'torta_tresleches.jpg',
                'stockProducto' => 8,
                'cedulaCliente' => '1012345678',
                'categoriaID' => 1
            ],

            [
                'productoID' => 3,
                'nombreProducto' => 'Cupcake de vainilla',
                'descripcionProducto' => 'Cupcake suave de vainilla con crema de mantequilla.',
                'precioProducto' => 6000,
                'fotoProducto' => 'cupcake_vainilla.jpg',
                'stockProducto' => 40,
                'cedulaCliente' => '1023456789',
                'categoriaID' => 2
            ],

            [
                'productoID' => 4,
                'nombreProducto' => 'Cupcake de red velvet',
                'descripcionProducto' => 'Cupcake rojo con cobertura de queso crema.',
                'precioProducto' => 6500,
                'fotoProducto' => 'cupcake_redvelvet.jpg',
                'stockProducto' => 35,
                'cedulaCliente' => '1034567890',
                'categoriaID' => 2
            ],

            [
                'productoID' => 5,
                'nombreProducto' => 'Cheesecake de maracuyá',
                'descripcionProducto' => 'Postre frío con base de galleta y cubierta de maracuyá.',
                'precioProducto' => 11000,
                'fotoProducto' => 'cheesecake_maracuya.jpg',
                'stockProducto' => 12,
                'cedulaCliente' => '1045678901',
                'categoriaID' => 3
            ],

            [
                'productoID' => 6,
                'nombreProducto' => 'Flan napolitano',
                'descripcionProducto' => 'Postre frío de caramelo con textura cremosa.',
                'precioProducto' => 9500,
                'fotoProducto' => 'flan_napolitano.jpg',
                'stockProducto' => 14,
                'cedulaCliente' => '1056789012',
                'categoriaID' => 3
            ],

            [
                'productoID' => 7,
                'nombreProducto' => 'Galletas con chispas de chocolate',
                'descripcionProducto' => 'Galletas crocantes con chispas de chocolate semi amargo.',
                'precioProducto' => 4000,
                'fotoProducto' => 'galletas_chispas.jpg',
                'stockProducto' => 50,
                'cedulaCliente' => '1067890123',
                'categoriaID' => 4
            ],

            [
                'productoID' => 8,
                'nombreProducto' => 'Croissant de mantequilla',
                'descripcionProducto' => 'Croissant artesanal con masa de hojaldre y mantequilla.',
                'precioProducto' => 5500,
                'fotoProducto' => 'croissant.jpg',
                'stockProducto' => 30,
                'cedulaCliente' => '1078901234',
                'categoriaID' => 5
            ]
        ];
        DB::table('producto')->insert($productos);
    }
}
