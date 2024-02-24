<?php

use App\Http\Controllers\VentaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/ventas',[VentaController::class,'index'])->name('ventas');
Route::post('/ventas/create',[VentaController::class,'create'])->name('ventas.create');
Route::patch('/ventas/update/{id}',[VentaController::class,'patch'])->name('ventas.patch');
Route::delete('/ventas/delete/{id}',[VentaController::class,'delete'])->name('ventas.delete');