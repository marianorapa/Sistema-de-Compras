<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Actions\Fortify\PasswordValidationRules;

class GestionUsuariosController extends Controller
{
    use PasswordValidationRules;

    public function index(){
        return view('/gestionUsuarios/menuUsuarios');
    }

    public function show(){
        $usuarios = User::paginate();
        return view('/gestionUsuarios/usuarios/consulta',compact('usuarios'));
    }

    public function registro(){
        return view('/gestionUsuarios/usuarios/registro');
    }

    public function store(Request $request){
        $usuario = new User();
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'],
            'password' => $this->passwordRules(),
        ])->validate();

        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);

        $usuario->save();
        return redirect()->route('usuario.consulta');
    }

}
