<?php

namespace App\Http\Controllers;
use App\Models\Articulo;
use App\Models\Detalle_Solicitud_Compras;
use App\Models\Solicitud_Compras;
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
      //obtengo los datos que necesito año-mes-dia
      //$sol->FechaRegistro= $tiempo['year'].'-'. $tiempo['mon'].'-'.$tiempo['mday'];
      $sol->FechaRegistro=date("Y-n-j");
      $sol->save();
      //Se recupera el ID Solicitud de compra Recien Creada
      $sol = DB::table('solicitud_compras')->max('SolicitudCompraID');
      //guardar datos de estado
      $estadoSol->SolicitudCompraID=$sol;
      $estadoSol->EstadoID='Pendiente';
       //obtengo los datos que necesito año-mes-dia hora(-3 por la zona horaria):minutos:segundos
      //$estadoSol->FechaHora= $tiempo['year'].'-'. $tiempo['mon'].'-'.$tiempo['mday'].' '.($tiempo['hours']-3).':'.$tiempo['minutes'].':'.$tiempo['seconds'];
      $estadoSol->FechaHora=date("Y-n-j");
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

   /**
    * Función que recupera el detalle de una solicitud de compra particular y retorna la información
    * a la vista correspondiente para su visualización.
    */
   public function detalle(Request $request){      
      $solicitud = $request->id;
      
      $fecha = DB::table('solicitud_compras')
      ->where('SolicitudCompraID',$request->id)->value('FechaRegistro');      

      $estado = DB::table('estados_solicitud_compras')
      ->where('SolicitudCompraID',$request->id)->value('EstadoID');
      
      $usuarioID = DB::table('estados_solicitud_compras')
      ->where('SolicitudCompraID',$request->id)->value('ResponsableID');
      
      $usuario = DB::table('users')
      ->where('id',$usuarioID)->value('name');

      $detalle = DB::table('detalles_solicitud_compras')
      ->join('articulos','detalles_solicitud_compras.ArticuloID','=','articulos.ArticuloID')
      ->where('SolicitudCompraID',$request->id)->get();

      return view('/gestionCompras/solicitudCompras/detalle')
      ->with('detalle' ,$detalle)
      ->with('estado', $estado)
      ->with('solicitud', $solicitud)
      ->with('fecha', $fecha)
      ->with('usuario', $usuario);
   }

   /**
    * Función que elimina físicamente una solicitud de compra siempre que la misma se encuentre en estado PENDIENTE
    */
   public function eliminar(Request $request){
      $estado = DB::table('estados_solicitud_compras')
      ->where('SolicitudCompraID',$request->id)->value('EstadoID');
      if($estado=='Pendiente')
         $mensaje= 'Solicitud de Compra eliminada exitosamente.';

      $solicitudes = Solicitud_Compras::all();      
      /*return view('/gestionCompras/solicitudCompras/menu')
      ->with('solicitudes' ,$solicitudes) 
      ->with('success','Solicitud de Compra eliminada exitosamente.');*/
      //Regresa a la vista de consultas
      return redirect()->route('compras.solicitudCompras')->with('success','Solicitud de Compra eliminada exitosamente.');
   }

   public function editarSolicitudCompra($solicitud){
      
      $fecha = DB::table('solicitud_compras')
      ->where('SolicitudCompraID',$solicitud)->value('FechaRegistro');      

      $estado = DB::table('estados_solicitud_compras')
      ->where('SolicitudCompraID',$solicitud)->value('EstadoID');
      
      $usuarioID = DB::table('estados_solicitud_compras')
      ->where('SolicitudCompraID',$solicitud)->value('ResponsableID');

      $detalle = DB::table('detalles_solicitud_compras')
      ->join('articulos','detalles_solicitud_compras.ArticuloID','=','articulos.ArticuloID')
      ->where('SolicitudCompraID',$solicitud)->get();

      return view('/gestionCompras/solicitudCompras/editSolicitudCompra')
      ->with('detalle' ,$detalle)
      ->with('estado', $estado)
      ->with('solicitud', $solicitud)
      ->with('fecha', $fecha);
   }

   public function actualizar(Request $request, $solicitud){
      $i=0;
      foreach ($request->ids as $artID){
            DB::table('detalles_solicitud_compras')
            ->where('SolicitudCompraID',$solicitud)
            ->where('ArticuloID',$artID)
            ->update(['Cantidad'=>$request->cantidades[$i],'FechaResposicionEstimada'=>$request->fechas[$i]]);
      }
       return $this->index();
    
   }
}

