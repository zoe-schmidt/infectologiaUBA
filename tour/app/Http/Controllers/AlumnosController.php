<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AlumnosController extends Controller
{
    public function mostrarAlumnos(){
        $alumnos=User::all();

        $vac=compact("alumnos");

        return view("/listadoAlumnos",$vac);
    }
    public function borrarAlumno(request $form){ 

        $id=$form["id"];
        
         $alumno=user::find($id);

         $alumno->delete();

         
    
    return redirect("/listadoAlumnos");
        }

}
