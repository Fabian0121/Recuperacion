<?php

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
Route::get('/login',[UsuarioController::class,'verificarLogin'])->name('login.form');
//Registrarse
Route::get('/registrarse',[UsuarioController::class,'registrarse'])->name('registrarse');
Route::get('/registrarse',[UsuarioController::class,'verificarRegistro'])->name('registrarse.form');

//Rutas para usuario
Route::prefix('/-')->middleware("VerificarUsuario")->group(function (){
    Route::get('/inicio',[UsuarioController::class,'login'])->name('inicio');

});