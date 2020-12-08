<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Solicitud_Presupuesto extends Model
{
    use HasFactory;
    protected $table="deta_soli_presu";
    protected $primaryKey= array('ArticuloID','SolicitudCompraID', 'ProveedorID');
    public $timestamps = false;//inhabilita los timestamps
}
