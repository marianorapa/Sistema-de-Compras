<?php

namespace App\Http\Controllers;

use App\Models\Detalle_Solicitud_Presupuesto;
use Illuminate\Http\Request;
use App\Models\Solicitud_Compras;
use App\Models\Solicitud_Presupuesto;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Estado_Solicitud_Compras;
use App\Models\Solicitud_Presupuesto_Proveedor;

class GestionPresupuestosController extends Controller
{
    public function index(){
      $solicitudes = Solicitud_Compras::all();
      return view('/gestionCompras/presupuestos/menu')
      ->with('solicitudes' ,$solicitudes);  
    }
    
    public function solicitudesPresupuesto($solicitud){
      $fecha = DB::table('solicitud_compras')
      ->where('SolicitudCompraID',$solicitud)->value('FechaRegistro');      

      $estado = DB::table('estados_solicitud_compras')
      ->where('SolicitudCompraID',$solicitud)->value('EstadoID');
    
      $solpresupuestos = DB::table('solicitudes_presupuestos')
      ->where('SolicitudCompraID',$solicitud)->get();

      return view('/gestionCompras/presupuestos/solicitudesPresupuesto')
      ->with('solpresupuestos' ,$solpresupuestos)
      ->with('estado', $estado)
      ->with('solicitud', $solicitud)
      ->with('fecha', $fecha);
    }

    public function solicitarPresupuesto($solicitud){
  
      $artSolicitados = DB::table('detalles_solicitud_compras')
      ->join('articulos','detalles_solicitud_compras.ArticuloID','=','articulos.ArticuloID')
      ->join('articulo_proveedor','detalles_solicitud_compras.ArticuloID','=','articulo_proveedor.ArticuloID')
      ->join('proveedores','articulo_proveedor.ProveedorID','=','proveedores.ProveedorID')
      ->where('SolicitudCompraID',$solicitud)->get();

      return view('/gestionCompras/presupuestos/solicitarPresup')
      ->with('artSolicitados' ,$artSolicitados)
      ->with('solicitud', $solicitud);
    }


    public function registrarSolicitud(Request $request, $solicitud){
     //registrar estado=Procesado para la solicitud de Compra, además de agregar el AdminID
      //recuperar Solicitud e ingresa el AdminID que lo reviso
     DB::table('estados_solicitud_compras')
            ->where('SolicitudCompraID',$solicitud)
            ->where('EstadoID','Pendiente')
            ->update(['AdminComprasID'=>Auth::id()]);

      $sol = DB::table('estados_solicitud_compras')
            ->where('SolicitudCompraID',$solicitud)
            ->where('EstadoID','Pendiente')->get();
      
      $estadoSol= new Estado_Solicitud_Compras();
      //Creo nuevo estado para la Solicitud de Compras "Procesado"
      $estadoSol->SolicitudCompraID=$solicitud;
      $estadoSol->EstadoID='Procesado';
      $estadoSol->FechaHora=date("Y-n-j");
      //Obtener ID del usuario actualmente logueado
      $estadoSol->ResponsableID=$sol[0]->ResponsableID;
      $estadoSol->AdminComprasID=$sol[0]->AdminComprasID;
     
      //creamos la solicitud de Presupuesto
      $solpresupuesto=new Solicitud_Presupuesto();
      $solpresupuesto->FechaRegistro=date("Y-n-j");
      $solpresupuesto->AdminComprasID=Auth::id();
      $solpresupuesto->SolicitudCompraID=$solicitud;
      //guardamos solicitud de Presupuesto
      $solpresupuesto->save();

      //Se recupera el ID Solicitud de Presupuesto Recien Creada
      $solP = DB::table('solicitudes_presupuestos')->max('SolicitudPresupuestoID');
      $i=0;
      foreach($request->proveedores as $p){
        //crear un registro para la tabla Solicitud_Presupuesto_Proveedor
        /*$sol_pres_prove= new Solicitud_Presupuesto_Proveedor();
        $sol_pres_prove->SolicitudPresupuestoID=$solP;
        $sol_pres_prove->ProveedorID=$p;
        $sol_pres_prove->FechaRegistro=date("Y-n-j");
        //guardar
        $sol_pres_prove->save();*/
        //crear un Detalle de Solicitud de Presupuesto
        $det_sol_pres= new Detalle_Solicitud_Presupuesto();
        $det_sol_pres->ArtiID=$request->id[$i];
        $det_sol_pres->SoliPresuID=$solP;
        $det_sol_pres->ProveID=$p;
        $det_sol_pres->Cantidad=$request->cantidades[$i];
        //guardar
        $det_sol_pres->save();
        $i++;
      }
      //guardar nuevo estado procesado
      $estadoSol->save();
      //guardar la actualizacopn del estado pendiente
      //$sol->save();

      return redirect()->route('compras.presupuestos');

    }

}
