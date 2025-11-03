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

Route::get('/inicio', function () {
    return view('Home.HomeView');
})->middleware(['auth', 'verified'])->name('inicio');


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
Route::get('/productos', [ProductoController::class, 'index'])->middleware(['auth', 'verified'])->name('productos');
Route::get('/compras', [CompraController::class, 'index'])->middleware(['auth', 'verified'])->name('compras');


require __DIR__.'/auth.php';
