<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comisiones;

class comisionesController extends Controller
{
    public function vista(){

        $comisiones=comisiones::paginate(1);
        
        $vac=compact("comisiones");
        return view("/comisiones", $vac);
        
    }


    public function nuevaComision(){
        return view("/cargarComision");
    }

    
    public function cargarComision( request $req){

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

        $comisionNueva= new comisiones();

        $ruta=$req->file("archivo")->store("public");
        $nombreArchivo=basename($ruta);

        $comisionNueva->nombre=$req["nombre"];
        $comisionNueva->archivo=$nombreArchivo;

        $comisionNueva->save();

        return redirect("/comisiones");
    }


    public function listadoComisiones(){
        $comisiones=comisiones::all();

        $vac=compact("comisiones");


        return view ("listadoComisiones",$vac);

    }

    public function editarComisiones($id){

        $comisiones=comisiones::find($id);

        $vac=compact("comisiones");

        return view("/editarComisiones",$vac);
    }



    public function actualizarComision(request $req,$id){

    

        $comisionVieja=request()->except('_token');
        
        if($req->hasFile('archivo')){

            $comisiones=comisiones::find($id);
            
            Storage::delete("/public" . $comisiones->archivo);

            $comisionVieja["archivo"]=$req->file("archivo")->store("storage", "public");
        }
        
       
        $cronogramaEditado=comisiones::where('id','=',$id)->update($comisionVieja);

        
        


        return redirect("listadoComisiones");

    }

    public function borrarComision(request $form){ 

        $id=$form["id"];
        
         $comision=comisiones::find($id);

         $comision->delete();

         
    
    return redirect("/listadoComisiones");
        }

}
