<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\clase;

class ClasesController extends Controller
{

    public function mostrarClases(){
        $clases=clase::paginate(1);

      

        $vac= compact("clases");


        return view("clases",$vac);

    }

    public function nuevaClase(){
        return view("/nuevaClase");
    }

    public function cargarClase(request $req){
        

        $reglas=[
            "nombre"=>"string|min:3",
            "archivo"=>"file|required",
        ];

        $mensajes=[
            "string"=> "El campo :attribute no puede estar vacio",
            "min"=> "El  campo :attribute debe tener minimo :min",
            "required"=>"Debe seleccionar un archivo",
        ];
       
        $this->validate($req, $reglas, $mensajes);
       
        $claseNueva= new clase();


        $ruta=$req->file('archivo')->store("public");
        $nombreArchivo=basename($ruta);
        
        $claseNueva->nombre= $req["nombre"];
        $claseNueva->archivo=$nombreArchivo;
      

        $claseNueva->save();

        return redirect("/clases");
    }
        
    
    public function listadoClases(){
        $clases=clase::all();

        

        $vac=compact("clases");

        return view ("listadoClases",$vac);

    }

   public function borrarClases(request $form){ 

        $id=$form["id"];
        
         $clases=clase::find($id);

         $clases->delete();

         
    
    return redirect("/listadoClases");
        }

    
        public function editarClase($id){

            $clases=clase::find($id);


            $vac=compact("clases");

            return view("/editarClase",$vac);
        }

        public function actualizarClase(request $req,$id){

            $claseActualizada=request()->except('_token');

            if($req->hasFile('archivo')){

                $clases=clase::find($id);
                
                Storage::delete("/public" . $clases->archivo);
    
                $claseActualizada["archivo"]=$req->file("archivo")->store("storage", "public");
            };
            

            $claseEditada=clase::where('id','=',$id)->update($claseActualizada);

            return redirect("listadoClases");


        }


        /*public function buscarClases(request $req){

            $nombre=$req->get("buscarNombre");

            
            $clases=clase::where('nombre','like',%"$nombre%")->get();
            

            return view('buscarClase', compact("clases"));


        }*/
    



    };



