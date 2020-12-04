<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Solicitud_Compras;
use Illuminate\Http\Request;
use SolicitudCompras;

class GestionSolicitudComprasController extends Controller
{
 
   public function index(){
      $solicitudes = Solicitud_Compras::all();
      return view('/gestionCompras/solicitudCompras/menu')
      ->with('solicitudes' ,$solicitudes);
   }
    
   public function seleccionarArticulos(){
       $solCompra = Solicitud_Compras::find(1);
       $articulos = Articulo::all();
       return view('/gestionCompras/solicitudCompras/seleccionarArticulos')
       ->with('articulos' ,$articulos)
       ->with('soli', $solCompra);
    }
    
    public function cantidadArticulos(Request $request){
      return $request;
   }

}
