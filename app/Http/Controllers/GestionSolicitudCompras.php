<?php

namespace App\Http\Controllers;
use App\Models\Solicitud_Compras;

class GestionSolicitudCompras extends Controller
{
   /* public function index(){
        return view('/gestionCompras/solicitudCompra/menu');
    }*/

    //Almacena los datos del formulario
    public function store(){
       $solicitudCompra= new Solicitud_Compras();
       $solicitudCompra->FechaRegistro=date("Y-n-j");// asigana el año, mes y día.
       //Se guardan los datos en la BD
       $solicitudCompra->save();
    }
}
