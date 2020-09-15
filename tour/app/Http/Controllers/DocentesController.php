<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\docentes;

class DocentesController extends Controller
{
    public function vista(){
        $docentes=docentes::all();

        $vac=compact("docentes");

        return view("cuerpoDocente",$vac);
    }

    public function nuevoDocente(){
        return view("/cargarDocente");
    }

    public function cargarDocente(request $req){

        
        $reglas=[
            "nombre"=>"string|min:3",
            "foto"=>"file|required",
            "descripcion"=>"string",
        ];

        $mensajes=[
            "string"=> "El campo :attribute no puede estar vacio",
            "min"=> "El  campo :attribute debe tener minimo :min",
            "required"=>"Debe seleccionar un archivo",
        ];
       
        $this->validate($req, $reglas, $mensajes);
       
        $nuevoDocente= new docentes();


        $ruta=$req->file('foto')->store("public");
        $nombreArchivo=basename($ruta);
        
        $nuevoDocente->nombre=$req["nombre"];
        $nuevoDocente->descripcion= $req["descripcion"];
        $nuevoDocente->foto=$nombreArchivo;
      

        $nuevoDocente->save();

        return redirect("/cuerpoDocente");
    }
        

    public function listadoDocentes(){
        $docentes=docentes::all();

        $vac=compact("docentes");

        return view("/listadoDocentes",$vac);
    }

    
    public function editarDocente($id){

        $docentes=docentes::find($id);


        $vac=compact("docentes");

        return view("/editarDocente",$vac);
    }


    public function actualizarDocente(request $req,$id){

        $docenteActualizado=request()->except('_token');

        if($req->hasFile('foto')){

            $clases=clase::find($id);
            
            Storage::delete("/public" . $docente->foto);

            $claseActualizada["foto"]=$req->file("foto")->store("storage", "public");
        };
        

        $DocenteEditado=docentes::where('id','=',$id)->update($docenteActualizado);


        return redirect("listadoDocentes");


    }

    public function borrarDocente(request $form){ 

        $id=$form["id"];
        
         $docentes=docentes::find($id);

         $docentes->delete();
    
        return redirect("/listadoDocentes");
        }

    

    
}
