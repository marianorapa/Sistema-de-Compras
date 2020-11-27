<?php

namespace App\Http\Controllers;
use App\Models\Solicitud_Compras;
use SolicitudCompras;

class GestionSolicitudComprasController extends Controller
{
   /* public function index(){
        return view('/gestionCompras/solicitudCompra/menu');
    }*/

    //Almacena los datos del formulario
    public function alta(){
       $solicitudCompra= new Solicitud_Compras();
       $solicitudCompra->FechaRegistro=date("Y-n-j");// asigana el año, mes y día.
       //Se guardan los datos en la BD
       $solicitudCompra->save();

      $solicitudID= Solicitud_Compras::max('SolicitudCompraID');

      //return redirect()->route('compras.solicitudCompra.alta.articulos','$solicitudID');
       return view('gestionCompras.solicitudCompras.alta');
    }
   

}
