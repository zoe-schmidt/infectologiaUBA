<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/respuesta';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

     function generarCodigo($longitud){
         $key = '';
         $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
         $max =strlen($pattern)-1;
         for($i=0; $i < $longitud; $i++) $key .=$pattern{mt_rand(0,$max)};

         return $key;
            
         
     }
    protected function validator(array $data)
    {
      $message=[
        'nombre.required'=> 'El :attribute no puede estar vacio',
        "apellido.required" => 'El :attribute no puede estar vacio',
        "email.required" => 'El :attribute no puede estar vacio',
        "email.unique" => 'El :attribute ya se encuentra registrado',
        "legajo.required" => 'El :attribute no puede estar vacio',
        "legajo.unique" => 'N° de libreta ya registrado',

    ];

    return Validator::make($data, [
        'nombre' => ['required', 'string', 'max:255'],
        'apellido' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'legajo'=> ['required','int','unique:users'],
    ],$message);

    }

     /**
    * Create a new user instance after a valid registration.
    *
    * @param  array  $data
    * @return \App\User
    */
    protected function create(array $data)
     {
         $codigo = $this->generarCodigo(6);
         
         $dates = array("nombre"=>$data["nombre"],
                        "apellido"=>$data["apellido"],
                        "email"=>$data["email"],
                        "codigo"=>$codigo);
         $this->Email($dates);
        return User::create([
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        'legajo' => $data['legajo'],
        'email' => $data['email'],
        'codigo' =>$codigo,
         ]);  
    }

    public function Email($dates){
        mail::send("emails.plantilla",$dates,function($message){
            $message->subject("Solicitúd de Acceso a la Cursada");
            $message->to("nicostecherg@gmail.com");
            $message->from("no-reply@cursada.com", "cursada");
        });
    }
 
}
