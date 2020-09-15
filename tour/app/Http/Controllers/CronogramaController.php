<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\cronograma;

class CronogramaController extends Controller
{
    public function vista(){
        return view("/cronograma");
    }

    
    public function mostrarCronograma(){
        $cronogramas=cronograma::paginate(1);

        $vac=compact("cronogramas");

        return view("cronograma",$vac);

    }

    public function nuevoCronograma(){
        return view("/cargarCronograma");
    }


    public function cargarCronograma( request $req){

        $reglas=[
            "nombre" =>"string|min:3|required",
            "archivo"=>"file|required"
    ];

        $mensajes=[
            "string"=>"El campo :attribute no puede estar vacio",
            "min"=>"El campo :attribute debe tener un minimo de :min",
            "required"=>" el campo no puede estar vacio",

        ];

        $this->validate($req,$reglas,$mensajes);

        $cronogramaNuevo= new cronograma();

        $ruta=$req->file("archivo")->store("public");
        $nombreArchivo=basename($ruta);

        $cronogramaNuevo->nombre=$req["nombre"];
        $cronogramaNuevo->archivo=$nombreArchivo;

        $cronogramaNuevo->save();

        return redirect("/cronograma");
    }

    public function listadoCronogramas(){
        $cronogramas=Cronograma::all();

        $vac=compact("cronogramas");


        return view ("listadoCronogramas",$vac);

    }

    public function editarCronograma($id){

        $cronogramas=cronograma::find($id);

        $vac=compact("cronogramas");

        return view("/editarCronograma",$vac);
    }



    public function actualizarCronograma(request $req,$id){

    

        $cronogramaViejo=request()->except('_token');
        
        if($req->hasFile('archivo')){

            $cronograma=cronograma::find($id);
            
            Storage::delete("/public" . $cronograma->archivo);

            $cronogramaViejo["archivo"]=$req->file("archivo")->store("storage", "public");
        }
        
       
        $cronogramaEditado=cronograma::where('id','=',$id)->update($cronogramaViejo);

        
        


        return redirect("listadoCronogramas");

    }

    public function borrarCronograma(request $form){ 

        $id=$form["id"];
        
         $cronogramas=cronograma::find($id);

         $cronogramas->delete();

         
    
    return redirect("/listadoCronogramas");
        }
}
