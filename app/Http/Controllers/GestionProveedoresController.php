<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;

class GestionProveedoresController extends Controller
{
    public function alta(){
        return view('/gestionProveedores/alta');
    }

    //Almacena los datos del formulario
    public function store( Request $request){
       $proveedor = new Proveedor();
       $proveedor->Nombre =$request->nombre;
       $proveedor->Razon_social =$request->razon_social;
       $proveedor->Cuit =$request->cuit;
       $proveedor->Condicion_Iva =$request->iva;
       $proveedor->Direccion =$request->direc;
       $proveedor->Telefono =$request->telefono;
       $proveedor->mail =$request->mail;
       $proveedor->Localidad =$request->prov;
       $proveedor->Provincia =$request->loc;
       
       //Se guardan los datos en la BD
       $proveedor->save();

        //Regresa a la vista de consultas
        return redirect()->route('gestionProveedores');
    }
}
