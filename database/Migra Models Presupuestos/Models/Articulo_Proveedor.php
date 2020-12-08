<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo_Proveedor extends Model
{
    use HasFactory;
    protected $table="articulo_proveedor";
    //Vinculo con la clave primaria de la tabla
    protected $primaryKey=('ArticuloID'.'ProveedorID');
    public $timestamps = false;//inhabilita los timestamps
}
