<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Auth;

Route::get('/',function(){
    return view('auth/login');
});

Route::resource('almacen/categoria', CategoriaController::class);
Route::resource('almacen/articulo', ArticuloController::class);
Route::resource('ventas/cliente', ClienteController::class);
Route::resource('compras/proveedor', ProveedorController::class);
Route::resource('compras/ingreso', IngresoController::class);
Route::resource('ventas/venta', VentaController::class);
Route::resource('seguridad/usuario', UsuarioController::class);


Route::resource('/home-blogsi', VisitController::class);

//Route::get('/home-blogsi',[App\Http\Controllers\VisitController::class,'getDataArt']);

//Auth::routes();
Route::auth();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/{slug?}',[App\Http\Controllers\HomeController::class, 'index']);