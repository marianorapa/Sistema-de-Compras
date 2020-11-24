<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Articulo_Proveedor;

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
      public function establecer(Request $request, $ArticuloID){
        
        $articulo = Articulo::find($ArticuloID);
        $articulo->Punto_pedido = $request->punto_pedido_nuevo;
        
        //Se guardan los datos en la BD
        $articulo->save();

        //Regresa a la vista de punto de pedido
        return redirect()->route('inventario.puntopedido');    
       }

    /**
       * Función que recibe información a través de un post desde un formulario de la vista de inventario,
       * recupera el articulo de la tabla articulos con el ArticuloID enviado y actualiza el campo de
       * stock disponible del articulo con el valor recicibo de ajuste.
       */
      public function ajustar(Request $request, $ArticuloID){
        
         $articulo = Articulo::find($ArticuloID);      
         $articulo->Stock_disponible += $request->ajuste;
         
         //Se guardan los datos en la BD
         $articulo->save();

         /**
          * Regresa a la vista de ajuste de inventario si se encontraba en ella, de lo contrario regresa
          * a la vista de recepción de articulos 
          *
          */
         if ($request->ajuste < 0) {
            return redirect()->route('inventario.ajusteinventario'); 
         } else {
            return redirect()->route('inventario.recepcionarticulo'); 
         }
              
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
   /**
    * Funcion que se encarga de Vincular un Proveedor a un Articulo
    */
   
   
   
    public function asignar_proveedor(Request $request){
      $articuloProveedor = new Articulo_Proveedor();
      $articuloProveedor->ProveedorID =$request->prov_id;
      $articuloProveedor->ArticuloID =$request->art_id;
      $articuloProveedor->FechaDesde= date("Y-n-j");// asigana el año, mes y día.
      //Se guardan los datos en la BD
      $articuloProveedor->save();
      return redirect()->route('articulo.vincularProveedor');  
   }
   public function vincularProveedorIndex(){
      return view('/gestionArticulos/articulos/vincularProveedor');
  }

}

