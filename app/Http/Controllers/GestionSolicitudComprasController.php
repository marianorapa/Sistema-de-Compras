<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Detalle_Solicitud_Compras;
use App\Models\Solicitud_Compras;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class GestionSolicitudComprasController extends Controller
{
 
   public function index(){
      $solicitudes = Solicitud_Compras::all();
      return view('/gestionCompras/solicitudCompras/menu')
      ->with('solicitudes' ,$solicitudes);
   }
    
   public function seleccionarArticulos(){

       $solCompra = Solicitud_Compras::max('SolicitudCompraID');
       $articulos = Articulo::all();
       return view('/gestionCompras/solicitudCompras/seleccionarArticulos')
       ->with('articulos' ,$articulos)
       ->with('soli', $solCompra);
    }
    
    public function registrarSolicitudCompra(Request $request){
      //Se crea la Nueva Solicitud de Compra
      $sol=new Solicitud_Compras();
      $sol->FechaRegistro=date("Y-n-j");
      $sol->save();
      //Se recupera la Solicitud de compra Recien Creada
      $sol = DB::table('solicitud_compras')->max('SolicitudCompraID');
      //Se recorren la cantidades y fecha estimadas de cada articulo solicitado
      //y se iran dando de alta los detalles 
      
      $i=0;
     foreach ($request->ids as $articuloID){
            $detalle=new Detalle_Solicitud_Compras(); 
            $detalle->Cantidad= $request->cantidades[$i];
            $detalle->FechaResposicionEstimada= $request->fechas[$i];
            $detalle->ArticuloID=$articuloID;
            $detalle->SolicitudCompraID=$sol;
            $detalle->save();
            $i++;
      }
      //Regresa a la vista de consultas
      return redirect()->route('compras.solicitudCompras');
   }

   public function cantidadArticulos(Request $request){
      $i=0;
      $artSolicitados=array();//Defino el array que guardara los articulos solicitados
      //recorro los ids recuperados de la vita anterior y los voy guardando en el arry
      foreach ($request->id as $articuloID){
       $artSolicitados[$i]=Articulo::find($articuloID);       
      $i++; 
      }
      return view('/gestionCompras/solicitudCompras/cantidadArticulos')
      ->with('articulos' ,$artSolicitados);
   }

}
