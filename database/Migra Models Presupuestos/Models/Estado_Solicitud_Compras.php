<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado_Solicitud_Compras extends Model
{
    use HasFactory;
    protected $table="estados_solicitud_compras";
    protected $primaryKey= array('EstadoID','FechaHora','SolicitudCompraID');
    public $timestamps = false;//inhabilita los timestamps
}
