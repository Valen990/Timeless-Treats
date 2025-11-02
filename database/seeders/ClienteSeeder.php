<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clientes =[
        [
            'cedulaCliente' => '1001234567',
            'nombreCliente' => 'Carlos Pérez',
            'telefonoCliente' => '3004567890',
            'direccionCliente' => 'Calle 10 #23-45'
        ],

        [
            'cedulaCliente' => '1012345678',
            'nombreCliente' => 'María Gómez',
            'telefonoCliente' => '3019876543',
            'direccionCliente' => 'Carrera 50 #12-34'
        ],

        [
            'cedulaCliente' => '1023456789',
            'nombreCliente' => 'Andrés López',
            'telefonoCliente' => '3123456789',
            'direccionCliente' => 'Av. Oriental #45-23'
        ],

        [
            'cedulaCliente' => '1034567890',
            'nombreCliente' => 'Laura Torres',
            'telefonoCliente' => '3156789012',
            'direccionCliente' => 'Calle 80 #25-14'
        ],

        [
            'cedulaCliente' => '1045678901',
            'nombreCliente' => 'Juan Rodríguez',
            'telefonoCliente' => '3167890123',
            'direccionCliente' => 'Carrera 70 #14-56'
        ],

        [
            'cedulaCliente' => '1056789012',
            'nombreCliente' => 'Ana Martínez',
            'telefonoCliente' => '3178901234',
            'direccionCliente' => 'Calle 50 #10-20'
        ],

        [
            'cedulaCliente' => '1067890123',
            'nombreCliente' => 'Luis Fernández',
            'telefonoCliente' => '3189012345',
            'direccionCliente' => 'Carrera 100 #30-25'
        ],

        [
            'cedulaCliente' => '1078901234',
            'nombreCliente' => 'Diana Castillo',
            'telefonoCliente' => '3190123456',
            'direccionCliente' => 'Calle 60 #22-33'
        ]
        ];
        DB::table('cliente')->insert($clientes);
    }
}
