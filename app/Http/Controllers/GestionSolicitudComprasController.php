<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Detalle_Solicitud_Compras;
use App\Models\Solicitud_Compras;
use App\Models\Estado;
use App\Models\Estado_Solicitud_Compras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
      $estadoSol= new Estado_Solicitud_Compras();
      //obtengo fecha del sistema
      $tiempo=getdate();
      if($tiempo['hours']>2){
        $fechahoy=$tiempo['year'].'-'. $tiempo['mon'].'-'.$tiempo['mday'];
      }else{
        $fechahoy=$tiempo['year'].'-'. $tiempo['mon'].'-'.($tiempo['mday']-1);
      }
      $sol->FechaRegistro= $fechahoy;
      $sol->FechaRegistro=date("Y-n-j");
      $sol->save();
      
      //obtengo los datos que necesito año-mes-dia hora(-3 por la zona horaria):minutos:segundos
      switch($tiempo['hours']){
         case 0:
            $fechahoy=$fechahoy.' 21'.':'.$tiempo['minutes'].':'.$tiempo['seconds'];
         break;
         case 1:
            $fechahoy=$fechahoy.' 22'.':'.$tiempo['minutes'].':'.$tiempo['seconds'];
         break;
         case 2:
            $fechahoy=$fechahoy.' 23'.':'.$tiempo['minutes'].':'.$tiempo['seconds'];
         break;
         case 3:
            $fechahoy=$fechahoy.' 00'.':'.$tiempo['minutes'].':'.$tiempo['seconds'];
         break;
         
         default:$fechahoy=$fechahoy.' '.($tiempo['hours']-3).':'.$tiempo['minutes'].':'.$tiempo['seconds'];
      }
     
      //Se recupera el ID Solicitud de compra Recien Creada
      $sol = DB::table('solicitud_compras')->max('SolicitudCompraID');
      //guardar datos de estado
      $estadoSol->SolicitudCompraID=$sol;
      $estadoSol->EstadoID='Pendiente';
      $estadoSol->FechaHora=$fechahoy; 
      //Obtener ID del usuario actualmente logueado
      $estadoSol->ResponsableID=Auth::id();

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
      $estadoSol->save();
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


   public function editarSolicitudCompra(Request $request){
      return $request;
   }


}
