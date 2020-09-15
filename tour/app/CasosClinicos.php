<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CasosClinicos extends Model
{
    public $table="casos_clinicos" ;
    //public $primaryKey="id";//
    /* TIMESTAMPS SOLO ACLARAR SI EXISTE EN LA TABLA*/
    public $guarded=[];
}

