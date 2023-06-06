<?php

use App\Http\Controllers\BloquearController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\PedidosController;
Use App\Http\Controllers\PromotoresController;
Use App\Http\Controllers\ClientesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('principal');
});

Route::get('/dashboard',[PedidosController::class,'ventas'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {

Route::get('/mispedidos',[PedidosController::class,'index']);
//Route::get('/pedidos',[PedidosController::class,'index2']);
Route::get('/mispedidos/create',[PedidosController::class,'create']);
Route::get('/mispedidos/agregar',[PedidosController::class,'agregar'])->name('pedidos.agregar');
Route::post('/mispedidos', [PedidosController::class,'store'])->name('pedidos.store');
Route::post('/mipedido', [PedidosController::class,'guardar'])->name('pedidos.guardar');

Route::resource('/promotores',PromotoresController::class);

Route::get('/bloqueados',[BloquearController::class,'index']);
Route::patch('/bloqueados/{bloq}', [BloquearController::class,'update'])->name('bloquear.update');

Route::get('/bloquear',[BloquearController::class,'indexBloquear']);
Route::post('/bloquear', [BloquearController::class,'store'])->name('bloquear.store');

//Route::get('/ventas',[PedidosController::class,'ventas']);
Route::resource('/misclientes',ClientesController::class);
Route::get('/clientes',[ClientesController::class,'todosLosClientes'])->name('client.all');
Route::get('/clientes/create',[ClientesController::class,'create'])->name('client.create');
Route::post('/clientes/create',[ClientesController::class,'store'])->name('client.store');

Route::get('/pedidos/{pedido}/edit',[PedidosController::class,'edit'])->name('pedidos.edit');
Route::get('/pedidos/{detalle}/detalle',[PedidosController::class,'detalle'])->name('pedidos.detalle');
Route::put('/pedidos/{detalle}',[PedidosController::class,'update'])->name('pedidos.update');
Route::delete('/pedidos/detalle/{id}', [PedidosController::class,'eliminarDetalle'])->name('pedidos.eliminarDetalle');
Route::put('/pedidos/{detalle}',[PedidosController::class,'update'])->name('pedidos.update');
Route::post('/pedido/{detalle}',[PedidosController::class,'actualizar'])->name('pedidos.actualizar');
Route::get('/pedidos/{id}/eliminar', [PedidosController::class,'eliminar'])->name('pedidos.eliminar');

});

require __DIR__.'/auth.php';
