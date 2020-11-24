<?php

use App\Http\Controllers\GestionUsuariosController;
use App\Http\Controllers\GestionPersonasController;
use App\Http\Controllers\GestionPermisosController;
use App\Http\Controllers\GestionSectoresController;
use App\Http\Controllers\GestionRolesController;
use App\Http\Controllers\GestionArticulosController;
use App\Http\Controllers\GestionProveedoresController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Livewire\UsuarioComponent;
use App\Http\Livewire\ArticuloComponent;
use App\Http\Livewire\ProveedorComponent;
use App\Http\Livewire\PuntoPedidoComponent;
use App\Http\Livewire\AjustarInventarioComponent;
use App\Http\Livewire\RecepcionArticuloComponent;
use App\Http\Livewire\VerificarInventarioComponent;


Route::get('/', function () {
    return view('/auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('inicio', function () {
    return view('inicio');
})->name('dashboard');

//Controlador Principal

Route::get('/compras', [PageController::class, 'gestionCompras'])->name('compras');

Route::get('/inventario', [PageController::class, 'gestionInventario'])->name('inventario');

Route::get('/articulos', [PageController::class, 'gestionArticulos'])->name('articulos');

Route::get('/proveedores', [PageController::class, 'gestionProveedores'])->name('proveedores');

Route::get('/informes', [PageController::class, 'construction'])->name('informes');

Route::get('/usuarios', [PageController::class, 'gestionUsuarios'])->name('usuarios');

Route::get('/configuracion', [PageController::class, 'construction'])->name('configuracion');

//--------Usuarios-------------
Route::get('/usuarios/alta', [GestionUsuariosController::class, 'alta'])->name('usuario.alta');

//posts
Route::post('/usuarios', [GestionUsuariosController::class, 'store'])->name('usuario.store');

//delete
Route::delete('/usuarios/{usuario}', [GestionUsuariosController::class, 'destroy'])->name('usuario.baja');

//put
Route::put('/usuarios/{usuario}', [GestionUsuariosController::class, 'update'])->name('usuario.modificacion');

//Components Livewire
Route::get('/usuarios/consulta', UsuarioComponent::class)->name('usuario.consulta'); 

//--------Personas-------------
Route::get('/personas/alta', [GestionPersonasController::class, 'registro'])->name('persona.registro');

//Route::get('/personas/consulta',[GestionPersonasController::class,'show'])->name('consultaPersona');

//posts
Route::post('/personas',[GestionPersonasController::class,'store'])->name('persona.store');

//--------Permisos-------------
Route::get('/permisos/alta',[GestionPermisosController::class,'registro'])->name('permiso.registro');

//posts
Route::post('/permisos',[GestionPermisosController::class,'store'])->name('permiso.store');

//--------Roles-------------
Route::get('/roles/alta',[GestionRolesController::class,'registro'])->name('rol.registro');

//posts
Route::post('/roles',[GestionRolesController::class,'store'])->name('rol.store');

//--------Sectores-------------
Route::get('/sectores/alta',[GestionSectoresController::class,'registro'])->name('sector.registro');

//posts
Route::post('/sectores',[GestionSectoresController::class,'store'])->name('sector.store');

//--------Articulos-------------
Route::put('/articulos/{ArticuloID}/establecer', [GestionArticulosController::class, 'establecer'])->name('articulo.establecer');

Route::put('/articulos/{ArticuloID}/ajustar', [GestionArticulosController::class, 'ajustar'])->name('articulo.ajustar');

Route::get('/articulos/alta', [GestionArticulosController::class, 'alta'])->name('articulo.alta');

//Components Livewire
Route::get('/articulos/consulta', ArticuloComponent::class)->name('articulo.consulta'); 

//posts
Route::post('/articulos',[GestionArticulosController::class,'store'])->name('articulo.store');

//--------Proveedores-------------
Route::get('/proveedores/alta', [GestionProveedoresController::class, 'registro'])->name('proveedor.registro');

//Components Livewire
Route::get('/proveedores/consulta', ProveedorComponent::class)->name('proveedor.consulta'); 

//posts
Route::post('/proveedores',[GestionProveedoresController::class,'store'])->name('proveedor.store');

//--------Inventario-------------

//Components Livewire
Route::get('/inventario/punto_pedido', PuntoPedidoComponent::class)->name('inventario.puntopedido');

//Components Livewire
Route::get('/inventario/ajuste_inventario', AjustarInventarioComponent::class)->name('inventario.ajusteinventario');

//Components Livewire
Route::get('/inventario/recepcion_articulo', RecepcionArticuloComponent::class)->name('inventario.recepcionarticulo');

//Components Livewire
Route::get('/inventario/verificar', VerificarInventarioComponent::class)->name('inventario.verificar');
