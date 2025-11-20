<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CompraController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('Home.HomeView');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

#Rutas iniciales funcionando :D
/*Route::get('/inicio', function () {
    return view('Home.HomeView');
})->middleware(['auth', 'verified'])->name('inicio');*/

Route::get('/clientes', [ClienteController::class, 'index'])->middleware(['auth', 'verified'])->name('clientes'); 

Route::get('/categorias', [CategoriaController::class, 'index'])->middleware(['auth', 'verified'])->name('categorias');
//Muestra el formulario
Route::get('/categorias/formulario', [CategoriaController::class, 'form_registro'])->middleware(['auth', 'verified'])->name('form_reg_categoria');
//Guarda los datos del formulario
Route::post('/categorias/guardar', [CategoriaController::class, 'registrar'])->middleware(['auth', 'verified'])->name('registro_categoria');
Route::get('/categorias/edicion/{categoriaID}', [CategoriaController::class, 'form_edicion'])->middleware(['auth', 'verified'])->name('form_edi_categoria');
Route::post('/categorias/edicion/{categoriaID}', [CategoriaController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('actualiza_categoria');
Route::delete('/categorias/eliminacion/{categoriaID}', [CategoriaController::class, 'eliminar'])->middleware(['auth', 'verified'])->name('elimina_categoria');

Route::get('/productos', [ProductoController::class, 'index'])->middleware(['auth', 'verified'])->name('productos');
Route::get('/productos/registro', [ProductoController::class, 'form_registro'])->middleware(['auth', 'verified'])->name('form_reg_producto');
Route::post('/productos/registro', [ProductoController::class, 'registrar'])->middleware(['auth', 'verified'])->name('registro_producto');
Route::get('/productos/edicion/{productoID}', [ProductoController::class, 'form_edicion'])->middleware(['auth', 'verified'])->name('form_edi_producto');
Route::post('/productos/edicion/{productoID}', [ProductoController::class, 'actualizar'])->middleware(['auth', 'verified'])->name('actualiza_producto');
Route::delete('/productos/eliminacion/{productoID}', [ProductoController::class, 'eliminar'])->middleware(['auth', 'verified'])->name('elimina_producto');


// Compras / Carrito
Route::get('/compras', [App\Http\Controllers\CompraController::class, 'index'])->name('compras.index');

Route::get('/carrito', [CompraController::class, 'carrito'])->name('carrito.index');
Route::post('/carrito/agregar', [CompraController::class, 'agregarAlCarrito'])->name('carrito.agregar');
Route::delete('/carrito/eliminar/{id}', [App\Http\Controllers\CompraController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');
Route::delete('/carrito/vaciar', [App\Http\Controllers\CompraController::class, 'vaciarCarrito'])->name('carrito.vaciar');
Route::post('/finalizar/compra', [CompraController::class, 'finalizarCompra'])->name('finalizar.compra');

// Route::get('/compras', [CompraController::class, 'index'])->middleware(['auth', 'verified'])->name('compras');
// Route::get('/carrito', [CompraController::class, 'verCarrito'])->name('carrito.ver');
// Route::get('/carrito/add/{id}', [CompraController::class, 'addToCart'])->name('carrito.agregar');
// Route::get('/carrito/remove/{id}', [CompraController::class, 'eliminarDelCarrito'])->name('carrito.eliminar');
// Route::get('/carrito/vaciar', [CompraController::class, 'vaciarCarrito'])->name('carrito.vaciar');
// Route::post('/finalizar-compra', [CompraController::class, 'finalizarCompra'])->name('finalizar.compra');


require __DIR__.'/auth.php';
