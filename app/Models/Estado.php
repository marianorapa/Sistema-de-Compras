<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;
    protected $table="estados";
    //Vinculo con la clave primaria de la tabla
    protected $primaryKey= array('EstadoID','FechaHora');
    public $timestamps = false;//inhabilita los timestamps
}
