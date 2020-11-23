<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;
    protected $table="articulos";
    //Vinculo con la clave primaria de la tabla
    protected $primaryKey = 'ArticuloID';
    public $timestamps = false;//inhabilita los timestamps

}
