<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class GestionArticulosController extends Controller
{
    public function registro(){
        return view('/gestionArticulos/articulos/registroArticulo');
    }

    //Almacena los datos del formulario
    public function store( Request $request){
       $articulo = new Articulo();
       $articulo->Descripcion =$request->descripcion;
       $articulo->Tipo_embalaje =$request->tipo_embalaje;
       $articulo->Unidad_medida =$request->unidad_medida;
       $articulo->Unidad_bulto =$request->unidad_bulto+0;
       $articulo->Punto_pedido =$request->punto_pedido+0;
       $articulo->Stock_disponible =$request->stock_disponible+0;
       //Se guardan los datos en la BD
       $articulo->save();
    }
}

