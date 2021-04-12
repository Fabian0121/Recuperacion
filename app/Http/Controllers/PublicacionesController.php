<?php

namespace App\Http\Controllers;

use App\Models\Publicaciones;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    //Registrar publicacion
    public function crearPublicacion(Request $datos)
    {
        $descripcion = $datos->textarea;
        //Metodos para la imagen
        if ($datos->hasFile('imagen')) {
            $file = $datos->file("imagen");
            $nombrearchivo  = $this->nombreRandom().'.'.$file->getClientOriginalName();
            $file->move(public_path("img/publicaciones/"),$nombrearchivo);
        }
        //
        $publicacion = new Publicaciones();
        $publicacion->id_usuario = session('usuario')->id;
        $publicacion->descripcion = $descripcion;
        $publicacion->imagen = $nombrearchivo;
        $publicacion->save();
        /*$publicaciones= Publicaciones::get();
            return view("inicio",["estatus"=> "success", "mensaje"=> "¡Cuenta Creada!"]);
*/
    }
    /*
    //Editar publicacion
    public function editarPublicacion(Type $var = null)
    {
        
    }
    //Eliminar publicacion
    public function eliminarPublicacion(Type $var = null)
    {
        
    }
    //Mostrar mis publicaciones en perfil
    public function miPerfil(Type $var = null)
    {
         
    }
    //Mostrar las publicaciones de mis amigos
    public function publicacionesInicio(Type $var = null)
    {
         
    }
    */
    
}