<?php
/*
namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Auth\RegisterController;

class Register extends Model
{
  public $table="users";
  public $guarded=[];

  public function getEmail(){
    return $this->email;
  }
  public function setEmail(){
    return $this->email;
  }
  public function getPassword(){
    return $this->password;
  }
  public function setPassword(){
    return $this->password;
  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setNombre(){
    return $this->password;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function setApellido(){
    return $this->apellido;
  }


}
