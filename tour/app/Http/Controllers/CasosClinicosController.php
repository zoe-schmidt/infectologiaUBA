<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\casosClinicos;


class CasosClinicosController extends Controller
{
    public function mostrarCasosClinicos(){
        $casos=casosClinicos::all();

        $vac=compact("casos");

        return view("/casosClinicos",$vac);
    }

    public function nuevoCasoClinico(){
        return view ("/nuevoCasoClinico");

    }

    
    public function cargarCasoClinico(request $req){
        

        $reglas=[
            "nombre"=>"string|min:3",
            "archivo"=>"file|required",
        ];

        $mensajes=[
            "string"=> "El campo :attribute no puede estar vacio",
            "min"=> "El campo :attribute debe tener minimo :min",
            "required"=>"Debe seleccionar un archivo",
        ];
       
        $this->validate($req, $reglas, $mensajes);
       
        $nuevoCaso= new casosClinicos();


        $ruta=$req->file('archivo')->store("public");
        $nombreArchivo=basename($ruta);
        
        $nuevoCaso->nombre= $req["nombre"];
        $nuevoCaso->archivo=$nombreArchivo;
      

        $nuevoCaso->save();

        return redirect("/CasosClinicos");
    }

    public function listadoCasosClinicos(){
        $casos=casosClinicos::all();

        $vac=compact("casos");

        return view ("listadoCasosClinicos",$vac);

    }

    public function editarcasoClinico($id){

        $casos=casosClinicos::find($id);

        $vac=compact("casos");

        return view("editarCasoClinico",$vac);
    }

    public function actualizarCasoClinico(request $req,$id){

        $casoActualizado=request()->except('_token');

        if($req->hasFile('archivo')){

            $casos=casosClinicos::find($id);
            
            Storage::delete("/public" . $casos->archivo);

            $casoActualizado["archivo"]=$req->file("archivo")->store("storage", "public");
        };
        

        $casoEditado=casosClinicos::where('id','=',$id)->update($casoActualizado);

        return redirect("listadoCasosClinicos");


    }

    public function BorrarCasoClinico(request $form){

        $id=$form["id"];

        $casos=casosClinicos::find($id);

        $casos->delete();

        return redirect("/listadoCasosClinicos");

    }




}
