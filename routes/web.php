<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CarritoController;

// pagina incial
Route::get('/', [ProductoController::class, 'index'])->name('home');

// Página individual de producto
Route::get('/producto/{id}', [ProductoController::class, 'mostrar'])->name('producto.mostrar');

// Idiomas
Route::get('/idioma/japones', [ProductoController::class, 'idiomaJapones'])->name('idioma.japones');
Route::get('/idioma/chino', [ProductoController::class, 'idiomaChino'])->name('idioma.chino');
Route::get('/idioma/coreano', [ProductoController::class, 'idiomaCoreano'])->name('idioma.coreano');

// Categorías
Route::get('/categoria/{slug}', [ProductoController::class, 'filtrarCategorias'])->name('filtrar.categorias');

// Para iniciar sesion, editar el perfil, borrar cuenta....
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Para el carrito
Route::get('/carrito', [CarritoController::class, 'ver'])->name('carrito.ver');
Route::post('/carrito/anadir', [CarritoController::class, 'anadir'])->name('carrito.anadir');
Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');


require __DIR__.'/auth.php';
