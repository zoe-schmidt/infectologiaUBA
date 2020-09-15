<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sitiosDeInteres;

class InteresController extends Controller
{
    public function vista(){

        $sitios=sitiosDeInteres::all();

        $vac=compact("sitios");

        return view("/sitiosDeInteres",$vac);
    }

    public function cargarSitio(){
        return view("/cargarSitio");
    }

    public function nuevoSitio(request $req){

        
        $reglas=[
            "nombre"=>"string|min:3",
            "links"=>"string",
        ];

        $mensajes=[
            "string"=> "El campo :attribute no puede estar vacio",
            "min"=> "El  campo :attribute debe tener minimo :min",
        ];
       
        $this->validate($req, $reglas, $mensajes);
       
        $nuevoSitio= new sitiosDeInteres();

        
        $nuevoSitio->nombre=$req["nombre"];
        $nuevoSitio->links= $req["links"];
        
      

        $nuevoSitio->save();

        return redirect("/sitiosDeInteres");
    }

    public function listadoSitios(){

        $sitios=sitiosDeInteres::all();

        $vac=compact("sitios");

        return view("/listadoSitios",$vac);
    }

    public function editarSitios($id){

        $sitios=sitiosDeInteres::find($id);

        $vac=compact("sitios");

        return view("/editarsitio",$vac);
    }

    public function actualizarSitio(request $req,$id){

    

        $sitioViejo=request()->except('_token');
        
       
        $sitioEditado=sitiosDeInteres::where('id','=',$id)->update($sitioViejo);


        return redirect("listadoSitios");

    }

    public function borrarSitio(request $form){ 

        $id=$form["id"];
        
         $sitio=sitiosDeInteres::find($id);

         $sitio->delete();

         
    
    return redirect("/listadoSitios");
        }
}
