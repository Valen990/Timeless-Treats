<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias =[
            [
                'categoriaID' => 1,
                'nombreCategoria' => 'Tortas',
                'descripcionCategoria' => 'Tortas artesanales y personalizadas para toda ocasión.'
            ],

            [
                'categoriaID' => 2,
                'nombreCategoria' => 'Cupcakes',
                'descripcionCategoria' => 'Cupcakes decorados con diferentes sabores y coberturas.'
            ],

            [
                'categoriaID' => 3,
                'nombreCategoria' => 'Postres fríos',
                'descripcionCategoria' => 'Postres refrigerados como cheesecakes y flanes.'
            ],

            [
                'categoriaID' => 4,
                'nombreCategoria' => 'Galletas',
                'descripcionCategoria' => 'Galletas caseras con chips, glaseadas o rellenas.'
            ],

            [
                'categoriaID' => 5,
                'nombreCategoria' => 'Panadería',
                'descripcionCategoria' => 'Pan artesanal, croissants y productos horneados frescos.'
            ]
        ];
        DB::table('categoria')->insert($categorias);
    }
}
