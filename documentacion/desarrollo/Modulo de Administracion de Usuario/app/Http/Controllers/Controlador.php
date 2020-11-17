<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Controlador extends Controller
{   /*Llamada a la Pagina Principal */
    public function inicio(){
        return view('welcome');
    }
    /*Llamada al Modulo de Administracion de Usuarios */
    public function ModAdmUser(){
        return view('ModAdminUsers');
    }

    /*Llamada al ABM de Permisos */
    public function AdmPermisos(){
        return view('AdmPermisos');
    }

     /*Llamada al ABM de Personas */
    public function AdmPerson(){
        return view('AdmPerson');
    }
    
     /*Llamada al ABM de Sectores */
    public function AdmSector(){
        return view('AdmSector');
    }
    
     /*Llamada al ABM de Roles */
    public function AdmRoles(){
        return view('AdmRoles');
    }
    
     /*Llamada al ABM de Usuarios */
    public function AdmUsuarios(){
        return view('AdmUsuarios');
    }
}
