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
        Schema::create('producto', function (Blueprint $table) {
            $table->string('productoID', 10)->primary();
            $table->string('nombreProducto', 20);
            $table->string('descripcionProducto', 50);
            $table->float('precioProducto');
            $table->string('fotoProducto', 150);
            $table->integer('stockProducto');
            $table->string('cedulaCliente', 10);
            $table->foreign('cedulaCliente')->references('cedulaCliente')->on('cliente');
            $table->string('categoriaID', 10);
            $table->foreign('categoriaID')->references('categoriaID')->on('categoria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto');
    }
};