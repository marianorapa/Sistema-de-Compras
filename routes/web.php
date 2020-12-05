<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GestionUsuariosController;
use App\Http\Controllers\GestionPersonasController;
use App\Http\Controllers\GestionPermisosController;
use App\Http\Controllers\GestionSectoresController;
use App\Http\Controllers\GestionRolesController;
use App\Http\Controllers\GestionArticulosController;
use App\Http\Controllers\GestionProveedoresController;
use App\Http\Controllers\GestionSolicitudComprasController;
use App\Http\Livewire\UsuarioComponent;
use App\Http\Livewire\ArticuloComponent;
use App\Http\Livewire\ProveedorComponent;
use App\Http\Livewire\SolicitudComprasComponent;

Route::get('/', function () {
    return view('/auth/login');
});

Route::middleware(['auth:sanctum', 'verified'])->get('inicio', function () {
    return view('inicio');
})->name('dashboard');


//Menu de CARDS----------------------------------------------------------------------------------------------
Route::get('/gestionCompras', [PageController::class, 'gestionCompras'])->name('gestionCompras');

Route::get('/gestionInventario', [PageController::class, 'gestionInventario'])->name('gestionInventario');

Route::get('/gestionUsuarios', [PageController::class, 'gestionUsuarios'])->name('gestionUsuarios');

Route::get('/informes', [PageController::class, 'construction'])->name('informes');

Route::get('/configuracion', [PageController::class, 'construction'])->name('configuracion');

//Usuarios--------------------------------------------------------------------------------------------------------------
Route::get('/usuarios/alta', [GestionUsuariosController::class, 'alta'])->name('usuario.alta');

Route::post('/usuarios', [GestionUsuariosController::class, 'store'])->name('usuario.store');

Route::delete('/usuarios/{usuario}', [GestionUsuariosController::class, 'destroy'])->name('usuario.baja');

Route::put('/usuarios/{usuario}', [GestionUsuariosController::class, 'update'])->name('usuario.modificacion');

Route::get('/usuarios/consulta', UsuarioComponent::class)->name('usuario.consulta'); 

//Personas--------------------------------------------------------------------------------------------------------------
Route::get('/personas/alta', [GestionPersonasController::class, 'registro'])->name('persona.registro');

Route::post('/personas',[GestionPersonasController::class,'store'])->name('persona.store');

//Permisos--------------------------------------------------------------------------------------------------------------
Route::get('/permisos/alta',[GestionPermisosController::class,'registro'])->name('permiso.registro');

Route::post('/permisos',[GestionPermisosController::class,'store'])->name('permiso.store');

//Roles--------------------------------------------------------------------------------------------------------------
Route::get('/roles/alta',[GestionRolesController::class,'registro'])->name('rol.registro');

Route::post('/roles',[GestionRolesController::class,'store'])->name('rol.store');

//Sectores----------------------------------------------------------------------------------------------------------
Route::get('/sectores/alta',[GestionSectoresController::class,'registro'])->name('sector.registro');

Route::post('/sectores',[GestionSectoresController::class,'store'])->name('sector.store');



//Gestión de Articulos-----------------------------------------------------------------------------------------------
Route::get('/gestionArticulos/menu', [GestionArticulosController::class, 'menu'])->name('gestionArticulos.menu');
Route::get('/articulos/alta', [GestionArticulosController::class, 'alta'])->name('articulo.alta');
Route::get('/articulos/gestion', [ArticuloComponent::class,'render'])->name('articulos.gestion'); 
Route::get('gestionArticulos/{ArticuloID}/vincular', [GestionArticulosController::class,'vincularProveedor'])->name('articulo.vincular');
Route::get('gestionArticulos/{ArticuloID}/desvincular', [GestionArticulosController::class,'desvincularProveedor'])->name('articulo.desvincular');
Route::put('/articulos/{ArticuloID}/establecer', [GestionArticulosController::class, 'establecer'])->name('articulo.establecer');
Route::put('/articulos/{ArticuloID}/ajustar', [GestionArticulosController::class, 'ajustar'])->name('articulo.ajustar');
Route::put('/articulos/{ArticuloID}/desasignarProveedor',[GestionArticulosController::class,'desasignarProveedor'])->name('articulo.desasignarProveedor');
Route::post('/articulos/{ArticuloID}/editar',[GestionArticulosController::class, 'editar'])->name('articulo.editar');
Route::post('/articulos/{ArticuloID}/asignarProveedor',[GestionArticulosController::class,'asignarProveedor'])->name('articulo.asignarProveedor');
Route::post('/articulos',[GestionArticulosController::class,'store'])->name('articulo.store'); 


//Gestión de Proveedores--------------------------------------------------------------------------------------
Route::get('/gestionProveedores/{path}', ProveedorComponent::class)->name('gestionProveedores');
Route::get('/proveedores/alta', [GestionProveedoresController::class, 'alta'])->name('proveedor.alta');
Route::get('/proveedores/consulta', ProveedorComponent::class)->name('proveedor.consulta'); 
Route::post('/proveedores',[GestionProveedoresController::class,'store'])->name('proveedor.store');



//Gestión de Inventario---------------------------------------------------------------------------------------
Route::get('/gestionInventario/1-{path}', ArticuloComponent::class)->name('inventario.puntoPedido');
Route::get('/gestionInventario/2-{path}', ArticuloComponent::class)->name('inventario.ajustarInventario');
Route::get('/gestionInventario/3-{path}', ArticuloComponent::class)->name('inventario.registrarArticulo');
Route::get('/gestionInventario/4-{path}', ArticuloComponent::class)->name('inventario.verificarInventario');



//Gestion de Compras-----------------------------------------------------------------------------------------
Route::get('/gestionCompras/solicitudesCompras',[GestionSolicitudComprasController::class,'index'] )->name('compras.solicitudCompras');
Route::get('/gestionCompras/solicitudesCompras/alta_sel_art', [GestionSolicitudComprasController::class,'seleccionarArticulos'])->name('compras.solicitudCompra.selecArticulos');
Route::post('/gestionCompras/solicitudesCompras/alta_cant_art', [GestionSolicitudComprasController::class,'cantidadArticulos'])->name('compras.solicitudCompra.cantArticulos');
Route::post('/gestionCompras/solicitudesCompras/registrarSolicitud', [GestionSolicitudComprasController::class,'registrarSolicitudCompra'])->name('compras.solicitudCompra.registrarSolicitudCompra');