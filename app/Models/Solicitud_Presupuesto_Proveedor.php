<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud_Presupuesto_Proveedor extends Model
{
    use HasFactory;
    protected $table="solicitudes_presupuestos_proveedores";
    //Vinculo con la clave primaria de la tabla
    protected $primaryKey=('SolicitudPresupuestoID'.'ProveedorID');
    public $timestamps = false;//inhabilita los timestamps
}
