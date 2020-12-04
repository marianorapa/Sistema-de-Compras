<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Solicitud_Compras;
use Illuminate\HTTP\Request;

class GestionSolicitudComprasController extends Controller
{
 
    public function index(){
      $solicitudes = Solicitud_Compras::all();
      return view('/gestionCompras/solicitudCompras/menu')
      ->with('solicitudes' ,$solicitudes);
   }
    public function seleccionarArticulos(){
       $articulos = Articulo::all();
       return view('/gestionCompras/solicitudCompras/seleccionarArticulos')
       ->with('articulos' ,$articulos);
    }
    public function cantidadArticulos(Request $request){
      return $request;
   }

}
