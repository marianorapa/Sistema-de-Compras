<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table="proveedores";
    //Vinculo con la clave primaria de la tabla
    protected $primaryKey = 'ProveedorID';
    public $timestamps = false;//inhabilita los timestamps
}
