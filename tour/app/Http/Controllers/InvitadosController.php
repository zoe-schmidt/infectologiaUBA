<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Requests\InvitadosRequest;
use App\User;

class InvitadosController extends Controller
{
    public function Activar($codigo){
        $usuarios=User::where("codigo",$codigo);
        $exist = $usuarios->count();
        $usuario = $usuarios->first();
        
        if($exist == 1 && $usuario->active == 0 ){
            $id = $usuario->id;
            return view("/auth/completarDatos", compact("id"));
        
        }else{
            return redirect('/');
    };
}



public function complete(InvitadosRequest $request, $id){
    $usuario = user::find($id);
    $usuario->contrasena = Hash::make($request['contrasena']);
    $usuario->activo = 1;
    
    $usuario->save();

    return redirect("/index");
}
}
