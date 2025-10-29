<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Cliente_compra_Producto', function (Blueprint $table) {
            $table->id('compraID');
            $table->string('descripcionCompra');
            $table->date('fechaCompra');
            $table->string('estadoCompra', 15);
            $table->string('metodoPago', 15);
            $table->float('totalCompra', 10, 8);

            $table->string('cedulaCliente', 10);
            $table->foreign('cedulaCliente')->references('cedulaCliente')->on('cliente');
            $table->string('productoID', 10);
            $table->foreign('productoID')->references('productoID')->on('producto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Cliente_compra_Producto');
    }
};