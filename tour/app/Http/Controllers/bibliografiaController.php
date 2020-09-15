<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\bibliografia;
class bibliografiaController extends Controller
{
    public function vista(){

        $bibliografias=bibliografia::all();

        $vac=compact("bibliografias");

        return view("/bibliografia",$vac);
    }

    public function nuevaBibliografia(){
        return view("/cargarBibliografia");
    }

    public function cargarBibliografia(request $req){
        
        $reglas=[
            "titulo"=>"string|min:3",
            "documento"=>"file|required",
        ];

        $mensajes=[
            "string"=> "El campo :attribute no puede estar vacio",
            "min"=> "El  campo :attribute debe tener minimo :min",
            "required"=>"Debe seleccionar un archivo",
        ];
       
        $this->validate($req, $reglas, $mensajes);
       
        $nuevaBibliografia= new bibliografia();


        $ruta=$req->file('documento')->store("public");
        $nombreArchivo=basename($ruta);
        
        $nuevaBibliografia->titulo= $req["titulo"];
        $nuevaBibliografia->documento=$nombreArchivo;
      

        $nuevaBibliografia->save();

        return redirect("/bibliografia");
    
    }
    
    public function descargarBibliografia($id) {
      
        $descarga= bibliografia::find($id);
    
         return response()->download(storage_path("app/public/{$descarga->documento}"));

      }


      public function listadobibliografia(){
          $bibliografias=bibliografia::all();

          $vac=compact("bibliografias");

          return view("/listadoBibliografias",$vac);
      }

      public function editarBibliografia($id){

        $bibliografia=bibliografia::find($id);

        $vac=compact("bibliografia");

        return view("/editarBibliografia",$vac);
    }

    public function actualizarBibliografia(request $req,$id){

    

        $bibliografiaVieja=request()->except('_token');
        
        if($req->hasFile('documento')){

            $bibliografia=bibliografia::find($id);
            
            Storage::delete("/public" . $bibliografia->documento);

            $bibliografiaVieja["documento"]=$req->file("documento")->store("storage", "public");
        }
        
       
        $bibliografiaEditada=bibliografia::where('id','=',$id)->update($bibliografiaVieja);

        


        return redirect("/listadoBibliografias");

    }
}
