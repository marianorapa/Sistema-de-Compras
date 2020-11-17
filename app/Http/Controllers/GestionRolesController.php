<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class GestionRolesController extends Controller
{
    public function registro(){
        return view('/gestionUsuarios/roles/registroRoles');   
    }

    public function store(Request $request){
        $rol = new Rol();
        $rol->RolID =$request->rolID;
        //Se guardan los datos en la BD
        $rol->save();
 
     }
}
