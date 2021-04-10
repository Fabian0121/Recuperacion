<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsuarioController extends Controller
{
    //Funciones login
    public function login()
    {
        return view('login');
    }
    //---//
    public function verificarLogin(Request $datos)
    {

        if(!$datos->correo || !$datos->password)
            return view("login",["estatus"=> "error", "mensaje"=> "¡Completa los campos!"]);

        $usuario = Usuarios::where("correo",$datos->correo)->first();
        if(!$usuario)
            return view("login",["estatus"=> "error", "mensaje"=> "¡El correo no esta registrado!"]);

        if(!Hash::check($datos->password,$usuario->password))
            return view("login",["estatus"=> "error", "mensaje"=> "¡Datos incorrectos!"]);

        Session::put('usuario',$usuario);

        if(isset($datos->url)){
            $url = decrypt($datos->url);
            return redirect($url);
        }else{
            return redirect()->route('inicio');
        }


    }
    //Funciones registrarse
    public function registrarse()
    {
        return view('login');
    }
    public function verificarRegistro(Request $datos)
    {

        if(!$datos->correo || !$datos->password1 || !$datos->password2)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡Falta información!"]);

        $usuario = Usuarios::where('correo',$datos->correo)->first();
        if($usuario)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡El correo ya se encuentra registrado!"]);

        $correo = $datos->correo;
        $password2 = $datos->password2;
        $password1 = $datos->password1;

        if($password1 != $password2){
            return view("registro",["estatus" => "¡Las contraseñas son diferentes!"]);
        }

        $usuario = new Usuarios();
        $usuario->correo =  $correo;
        $usuario->password = bcrypt($password1);
        $usuario->save();
            return view("login",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);

    }
    //Funcion cerrar sesion
    public function logout( )
    {
        if(Session::has('usuario'))
            Session::forget('usuario');

        return redirect()->route('bienvenida');
    }
}
