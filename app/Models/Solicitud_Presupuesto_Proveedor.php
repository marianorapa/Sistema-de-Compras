<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud_Presupuesto_Proveedor extends Model
{
    use HasFactory;
    protected $table="soli_presu_prove";
    //Vinculo con la clave primaria de la tabla
    protected $primaryKey=('ProveedorID'.'SolicitudPresupuestoID');
    public $timestamps = false;//inhabilita los timestamps
}
