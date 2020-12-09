<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitud_Compras;

class GestionPresupuestosController extends Controller
{
    public function index(){
      $solicitudes = Solicitud_Compras::all();
      return view('/gestionCompras/presupuestos/menu')
      ->with('solicitudes' ,$solicitudes);  
    }
    
    public function solicitarPresupuesto($solicitud){
      return $solicitud;
    }

}
