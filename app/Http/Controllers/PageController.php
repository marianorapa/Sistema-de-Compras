<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        
    }

    public function create(){

    }

    public function construction(){
        return view('construction');
    }

    public function gestionUsuarios(){
        return view('/gestionUsuarios/menuUsuarios');
    }

    public function gestionArticulos(){
        return view('/gestionArticulos/menuArticulos');
    }

    public function gestionProveedores(){
        return view('/gestionProveedores/menuProveedores');
    }

    public function gestionInventario(){
        return view('/gestionInventario/menuInventario');
    }

    public function gestionCompras(){
        return view('/gestionCompras/menuCompras');
    }

}
