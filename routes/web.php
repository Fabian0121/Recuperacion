<?php

use App\Http\Controllers\PublicacionesController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('bienvenida');
});

//Rutas login-Registrarse
//Login
Route::get('/login',[UsuarioController::class,'login'])->name('login');
Route::post('/loginForm',[UsuarioController::class,'verificarLogin'])->name('login.form');
//Registrarse
Route::get('/registrarse',[UsuarioController::class,'registrarse'])->name('registrarse');
Route::post('/registrarseForm',[UsuarioController::class,'verificarRegistro'])->name('registrarse.form');

//Rutas para usuario
Route::prefix('/-')->middleware("VerificarSesion")->group(function (){
    Route::get('/inicio',[UsuarioController::class,'inicio'])->name('inicio');
    //Publicaciones
    Route::post('/registroPublicacion',[PublicacionesController::class,'crearPublicacion'])->name('registrarP.form');
    //Enviar correo
    Route::get('/email',[UsuarioController::class,'enviar'])->name('email');

});