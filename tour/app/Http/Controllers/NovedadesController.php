<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\novedades;

class NovedadesController extends Controller
{

    public function mostrarNovedades(){
        $novedades=novedades::orderBy('id', 'DESC')->get();

        $vac=compact("novedades");

       

        return view("index",$vac);
    }


    public function nuevaNoticia(){
        return view("/cargarNovedades");

    }

    public function cargarNoticia(request $req){

        $reglas=[
            "titulo"=>"string|min:3|required",
            "descripcion"=>"string|_min:3|required",

        ];

        $mensajes=[
            "string"=>"El campo :attribute no puede estar vacio",
            "min"=>"El campo :attribute debe tener un minimo de :min",
            "required"=>" el campo no puede estar vacio",
        ];

        $this->validate($req,$reglas,$mensajes);

        $nuevaNoticia= new novedades();

        $nuevaNoticia->titulo=$req["titulo"];
        $nuevaNoticia->descripcion=$req["descripcion"];

        $nuevaNoticia->save();

        return redirect("/index");
    }

    
    public function listadoNovedades(){
        $novedades=novedades::all();

        $vac=compact("novedades");


        return view ("listadoNovedades",$vac);

    }

    public function editarNovedades($id){

        $novedades=novedades::find($id);

        $vac=compact("novedades");

        return view("/editarNovedades",$vac);
    }

    public function ActualizarNovedades(request $req, $id){
        
        $NovedadVieja=request()->except('_token');
        
       
        $NovedadVieja=novedades::where('id','=',$id)->update($NovedadVieja);

        return redirect ("listadoNovedades");

    }

    public function borrarNovedad(request $form){ 

        $id=$form["id"];
        
         $novedades=novedades::find($id);

         $novedades->delete();

         
    
    return redirect("/listadoNovedades");
        }



}
