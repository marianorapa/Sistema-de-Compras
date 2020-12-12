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
      $art=array();
      //Obtengo los articulos que tienen proveedores vinculados
      $artSolicitados = DB::table('detalles_solicitud_compras')
      ->join('articulos','detalles_solicitud_compras.ArticuloID','=','articulos.ArticuloID')
      ->join('articulo_proveedor','detalles_solicitud_compras.ArticuloID','=','articulo_proveedor.ArticuloID')
      ->join('proveedores','articulo_proveedor.ProveedorID','=','proveedores.ProveedorID')
      ->where('SolicitudCompraID',$solicitud)->get();
      
      //Obtengo los articulos de ls detalles de solciitudes de Presupuestos
      $art_exist= DB::table('deta_soli_presu')
      ->join('articulos','deta_soli_presu.ArtiID','=','articulos.ArticuloID')
      ->join('solicitudes_presupuestos','solicitudes_presupuestos.SolicitudPresupuestoID','=','deta_soli_presu.SoliPresuID')
      ->where('SolicitudCompraID',$solicitud)->get();
      
      //recorro para los articulos vinculados a proveedores y quito los que ya esten solicitados 
      $i=0;
      foreach($artSolicitados as $t){
        $j=0;
        $b=true;
        while($b and ($j<count($art_exist))){
          if(($t->ArticuloID == $art_exist[$j]->ArtiID)and($t->ProveedorID == $art_exist[$j]->ProveID)){
            $b=false;
          }
          $j++;
        }
        if($b){
          $art[$i]=$t;
          $i++;
        }
      }
      
      return view('/gestionCompras/presupuestos/solicitarPresup')
      ->with('artSolicitados' ,$art)
      ->with('solicitud', $solicitud);
    }


    public function registrarSolicitud(Request $request, $solicitud){
    //redirige a la vista de solicitudes de Presupuesto, si no existen arituclos a solicitar
     if($request->id==null){
      //aca va la alerta que indicara que no hay mas articulos a asolicitar
      return redirect()->route('compras.presupuestos');
    }
//ordenamiento de los detalles por ID proveedore, guardandos sus correspondientes datos
     $proveedores=array();
     $id=array();
     $cantidades=array();
     $fps=array();

     $proveedores=$request->proveedores;
     $id=$request->id;
     $cantidades=$request->cantidades;
     $fps=$request->fps;
     
     $n=count($proveedores);
     for ($i=0; $i< $n-1; $i++)
     {
           $min=$i;
           for($j=$i+1; $j<$n; $j++)
                 if($proveedores[$min] > $proveedores[$j])
                    $min=$j;
           $aux=$proveedores[$min];
           $auxa=$id[$min];
           $auxc=$cantidades[$min];
           $auxf=$fps[$min];
           
           $id[$min]=$id[$i];
           $cantidades[$min]=$cantidades[$i];
           $fps[$min]=$fps[$i];
           $proveedores[$min]=$proveedores[$i];

           $proveedores[$i]=$aux;
           $id[$i]=$auxa;
           $cantidades[$i]=$auxc;
           $fps[$i]=$auxf;
     }
 //Fin Ordenamineto de proveedores
     
     
     
  //registrar estado=Procesado para la solicitud de Compra, además de agregar el AdminID
  //recuperar Solicitud e ingresa el AdminID que lo reviso
     DB::table('estados_solicitud_compras')
            ->where('SolicitudCompraID',$solicitud)
            ->where('EstadoID','Pendiente')
            ->update(['AdminComprasID'=>Auth::id()]);

      $sol = DB::table('estados_solicitud_compras')
            ->where('SolicitudCompraID',$solicitud)
            ->where('EstadoID','Pendiente')->get();
      
      $sol_p_exist=DB::table('estados_solicitud_compras')
      ->where('SolicitudCompraID',$solicitud)
      ->where('EstadoID','Procesado')->get();
      
      if($sol_p_exist== null){
        $estadoSol= new Estado_Solicitud_Compras();
        //Creo nuevo estado para la Solicitud de Compras "Procesado"
        $estadoSol->SolicitudCompraID=$solicitud;
        $estadoSol->EstadoID='Procesado';
        $estadoSol->FechaHora=date("Y-n-j");
        //Obtener ID del usuario actualmente logueado
        $estadoSol->ResponsableID=$sol[0]->ResponsableID;
        $estadoSol->AdminComprasID=$sol[0]->AdminComprasID;
        //guardar nuevo estado procesado
        $estadoSol->save();
      }
     
     
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
      $prov_a=$proveedores[0];
      foreach($proveedores as $p){
        if($prov_a!=$p){//Condicional que crea otra Solicitud de Presupuesto para agrupar los que tengan el mismo proveedor
          //creamos la solicitud de Presupuesto
          $solpresupuesto=new Solicitud_Presupuesto();
          $solpresupuesto->FechaRegistro=date("Y-n-j");
          $solpresupuesto->AdminComprasID=Auth::id();
          $solpresupuesto->SolicitudCompraID=$solicitud;
          //guardamos solicitud de Presupuesto
          $solpresupuesto->save();

          //Se recupera el ID Solicitud de Presupuesto Recien Creada
          $solP = DB::table('solicitudes_presupuestos')->max('SolicitudPresupuestoID');
          $prov_a=$p;
        }

        //crear un Detalle de Solicitud de Presupuesto
        $det_sol_pres= new Detalle_Solicitud_Presupuesto();
        $det_sol_pres->ArtiID=$id[$i];
        $det_sol_pres->SoliPresuID=$solP;
        $det_sol_pres->ProveID=$p;
        $det_sol_pres->FechaReposicion=$fps[$i];
        $det_sol_pres->Cantidad=$cantidades[$i];
        //guardar
        $det_sol_pres->save();
        $i++;
      }
      

      return redirect()->route('compras.presupuestos');
    
    }

    public function verDetalle($idSol){
      $sol = DB::table('solicitudes_presupuestos')
      ->join('users','solicitudes_presupuestos.AdminComprasID','=','users.id')
      ->where('SolicitudPresupuestoID',$idSol)->get();

      $detalle = DB::table('deta_soli_presu')
      ->join('articulos','deta_soli_presu.ArtiID','=','articulos.ArticuloID')
      ->where('SoliPresuID',$idSol)->get();
    
      return view('/gestionCompras/presupuestos/detalle')
      ->with('sol',$idSol)
      ->with('solicitud',$sol[0])
      ->with('detalle',$detalle);
    }
}
