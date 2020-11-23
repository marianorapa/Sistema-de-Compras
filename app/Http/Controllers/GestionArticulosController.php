<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class GestionArticulosController extends Controller
{
    public function alta(){
        return view('/gestionArticulos/articulos/alta');
    }

    //Almacena los datos del formulario
    public function store(Request $request){
       $articulo = new Articulo();
    
       
       $articulo->Descripcion =$request->descripcion;
       $articulo->Tipo_embalaje =$request->tipo_embalaje;
       $articulo->Unidad_medida =$request->unidad_medida;
       $articulo->Unidad_bulto =$request->unidad_bulto+0;
       $articulo->Punto_pedido =$request->punto_pedido+0;
       $articulo->Stock_disponible =$request->stock_disponible+0;
      
       //Se guardan los datos en la BD
       $articulo->save();
       //Regresa a la vista de consultas
       return redirect()->route('articulo.consulta');
       
    }

      /**
       * Función que recibe información a través de un post desde un formulario de la vista de inventario,
       * recupera el articulo de la tabla articulos con el ArticuloID enviado y actualiza el campo de
       * punto de pedido del articulo con el valor del nuevo punto de pedido.
       */
      public function update(Request $request, $ArticuloID){
        
        $articulo = Articulo::find($ArticuloID);
        $articulo->Punto_pedido = $request->punto_pedido_nuevo;
        
        //Se guardan los datos en la BD
        $articulo->save();

        //Regresa a la vista de punto de pedido
        return redirect()->route('inventario.puntopedido');    
       }

     public function edit($ArticuloID){
        //$articulo = new Articulo();
        //$articulo = Articulo::find($id);

        $articulos=Articulo::all();
        $articulo = $articulos[$ArticuloID - 1];

        return $articulo;

        //Regresa a la vista de punto de pedidro
        //return redirect()->route('inventario.puntopedido');
     }

     /**
      * Función que recibe el id del articulo, lo busca en la tabla de articulos y lo recupera devolviendo
      * la información para su visualización.
      */
     public function show($ArticuloID){
        $articulos = Articulo::all();
        $articulo = $articulos[$ArticuloID - 1];
        return $articulo;
   }

}

