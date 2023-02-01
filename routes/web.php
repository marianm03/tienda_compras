<?php

use App\Http\Controllers\ComprasController;
use App\Http\Controllers\FacturasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [WelcomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/welcome', [WelcomeController::class, 'index'])->middleware(['auth', 'verified'])->name('welcome');
//Compra
Route::post('/add_compra', [ComprasController::class, 'add_compra'])->middleware(['auth', 'verified'])->name('add_compra');

//Facturas
Route::get('/geneerar-facturas', [FacturasController::class, 'store'])->middleware(['auth', 'verified'])->name('geneerar-facturas');
Route::get('/ver-factura/{id}', [FacturasController::class, 'ver_factura'])->middleware(['auth', 'verified'])->name('geneerar-facturas');

//Productos
Route::get('/crear-producto', [ProductosController::class, 'create'])->middleware(['auth', 'verified'])->name('productos');
Route::get('/productos', [ProductosController::class, 'index'])->middleware(['auth', 'verified'])->name('productos');
Route::get('/editar-producto/{id}', [ProductosController::class, 'update'])->middleware(['auth', 'verified'])->name('geneerar-facturas');

Route::get('/eliminar-producto/{id}', [ProductosController::class, 'delete'])->middleware(['auth', 'verified'])->name('geneerar-facturas');
Route::post('/save_producto', [ProductosController::class, 'save_producto'])->middleware(['auth', 'verified'])->name('save_producto');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
