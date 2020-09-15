<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/index";
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*
        
         protected function validator(array $data)
         {
             $message=[
                 "email.required" => 'El :attribute no puede estar vacio',
                 "contrasena.required" => 'El :attribute no puede esta vacio',
                 "email.unique" => 'El :attribute no puede esta vacio'
             ];
    
             return Validator::make($data, [
                 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                 'password' => ['required', 'string', 'min:8', 'confirmed'],
             ],$message);
         }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    
    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        return redirect("/index");
    }


}
