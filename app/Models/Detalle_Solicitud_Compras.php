<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle_Solicitud_Compras extends Model
{
    use HasFactory;
    protected $table="detalles_solicitud_compras";
    //Vinculo con la clave primaria de la tabla
    protected $primaryKey=('ItemID');
    public $timestamps = false;//inhabilita los timestamps
}
