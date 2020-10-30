<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controlador;


Route::get('/',[Controlador::class, 'inicio']);

Route::get('AdminUser', [Controlador::class, 'ModAdmUser'])->name('Principal');
 
Route::get('AdmPermisos', [Controlador::class, 'AdmPermisos'])->name('ABMPermisos');

Route::get('AdmPerson', [Controlador::class, 'AdmPerson'])->name('ABMPersonas');

Route::get('AdmSector', [Controlador::class, 'AdmSector'])->name('ABMSectores');

Route::get('AdmRoles', [Controlador::class, 'AdmRoles'])->name('ABMRoles');

Route::get('AdmUsuarios', [Controlador::class, 'AdmUsuarios'])->name('ABMUsuarios');