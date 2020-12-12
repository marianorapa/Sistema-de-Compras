<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;


class PDFController extends Controller
{
    
    public function PDFSolPresu($idSol){
        
        $sol = DB::table('solicitudes_presupuestos')
        ->join('users','solicitudes_presupuestos.AdminComprasID','=','users.id')
        ->where('SolicitudPresupuestoID',$idSol)->get();
  
        $detalle = DB::table('deta_soli_presu')
        ->join('articulos','deta_soli_presu.ArtiID','=','articulos.ArticuloID')
        ->where('SoliPresuID',1)->get();
      
        $pdf = PDF::loadView('/gestionCompras/presupuestos/descargarDetalle',compact('detalle'));
        return $pdf->stream('detallePresupuesto.pdf');
    }

}
