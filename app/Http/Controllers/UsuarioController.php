<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Image;

class UsuarioController extends Controller
{
    //
    protected function nombreRandom() {
        $nombre = '';
        $keys = array_merge( range('a','z'), range(0,9) );
        for($i=0; $i<20; $i++) {
           $nombre .= $keys[array_rand($keys)];
        }
        return $nombre;
     }
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
        return view('registro');
    }
    //
    public function verificarRegistro(Request $datos)
    {
        $usuario = Usuarios::where('correo',$datos->correo)->first();
        if($usuario)
            return view("registro",["estatus"=> "error", "mensaje"=> "¡El correo ya se encuentra registrado!"]);

        $nombreUsuario = $datos->nombreUsuario;
        $nombre =  $datos->nombre;
        $apellidoPaterno =  $datos->apellidoPaterno;
        $apellidoMaterno =  $datos->apellidoMaterno;
        $edad =  $datos->edad;
        $fechaNacimiento =  $datos->fechaNacimiento;
        $sexo =  $datos->sexo;
        //Metodos para la imagen
        if ($datos->hasFile('imagen')) {
            $file = $datos->file("imagen");
            //$nombrearchivo  = str_slug($request->slug).".".$file->getClientOriginalExtension();
            $nombrearchivo  = $this->nombreRandom().'.'.$file->getClientOriginalName();
            $file->move(public_path("img/perfil/"),$nombrearchivo);
        }
        //
        $correo = $datos->correo;
        $password2 = $datos->password;
        $password1 = $datos->password2;

        if($password1 != $password2){
            return view("registro",["estatus" => "¡Las contraseñas son diferentes!"]);
        }

        $usuario = new Usuarios();
        $usuario->nombre_usuario = $nombreUsuario;
        $usuario->nombre = $nombre;
        $usuario->apellido_p= $apellidoPaterno;
        $usuario->apellido_m = $apellidoMaterno;
        $usuario->edad = $edad;
        $usuario->fecha_nacimiento = $fechaNacimiento;
        $usuario->sexo = $sexo;
        $usuario->correo =  $correo;
        $usuario->password = bcrypt($password1);
        $usuario->foto_perfil = $nombrearchivo;
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
    //Pantalla de inicio
    public function inicio()
    {
        return view('inicio');
    }
}
