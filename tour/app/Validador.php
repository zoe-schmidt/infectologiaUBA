<?php
/*
namespace App;

use Illuminate\Database\Eloquent\Model;

class Validador extends Model
{
    private $bd;

    public function __construct(){
      $this->bd = New BaseDeDatos;
    };
    public function validarLogin(string $email, string $contrasena) : array{
      $array=[];

      $email=trim($email);
      if($this->validarEmail($email)){
        $array['email']='El email es invalido';
      }
      if ($this->validarVacio($contrasena)) {
        $array['contrasena']='Ingresa la contrasena';
      }
      if (empty($array)) {
        $usuario=$bd->buscarUsuarioEmail($email);
      }
      return $array;
    }
}
