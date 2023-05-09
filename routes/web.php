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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
Route::resource('/pedidos',PedidosController::class);
Route::resource('/promotores',PromotoresController::class);
Route::resource('/bloqueados',ClientesController::class);
Route::resource('/bloquear',BloquearController::class);
Route::get('/ventas',[PedidosController::class,'ventas']);
});

require __DIR__.'/auth.php';
