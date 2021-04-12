<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio sesion</title>
    <!------------------------------>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/formulario.css" ">
    <!------------------------------>
</head>
<body>
    <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <h5 class="card-title text-center">Registrarse</h5>
              <form class="form-signin" enctype="multipart/form-data" method="post" action="{{route('registrarse.form')}}">
                <label class="login100-form-title">
                    @if(isset($estatus))
                            @if($estatus == "success")
                                <h3 class="text-success">{{$mensaje}}</h3>
                            @elseif($estatus == "error")
                                <h3 class="text-danger">{{$mensaje}}</h3>
                            @endif
                     @endif
                </label>
                {{csrf_field()}}
                <div class="form-label-group">
                  <input type="text" id="input1" class="form-control" placeholder="Nombre Usuario" name="nombreUsuario" required>
                  <label for="input1">Nombre Usuario</label>
                </div>

                <div class="form-label-group">
                  <input type="text" id="input2" class="form-control" placeholder="Nombre" name="nombre" required>
                  <label for="input2">Nombre</label>
                </div>

                <div class="form-label-group">
                  <input type="text" id="input3" class="form-control" placeholder="Apellido Paterno" name="apellidoPaterno" required>
                  <label for="input3">Apellido Paterno </label>
                </div>

                <div class="form-label-group">
                    <input type="text" id="input4" class="form-control" placeholder="Apellido Materno" name="apellidoMaterno" required>
                    <label for="input4">Apellido Materno</label>
                </div>

                <div class="form-label-group">
                    <input type="number" id="input5" class="form-control" placeholder="Edad" name="edad" required>
                    <label for="input5">Edad</label>
                </div>

                <div class="form-label-group">
                    <input type="date" id="input6" class="form-control" placeholder="Fecha Nacimiento" name="fechaNacimiento" required>
                    <label for="input6">Fecha Nacimiento</label>
                </div>

                <div class="radio">
                    <label>Sexo</label>
                    <div class="radio">
                    <label><input type="radio" name="sexo" value="Masculino" requiered>Masculino</label>
                    </div>
                    <div class="radio">
                    <label><input type="radio" name="sexo" value="Femenino" requiered>Femenino</label>
                    </div>
                </div>

                
                    <label class="text-dark">Sube una foto de perfil</label>
                    <input type="file" class="form-control" name="imagen" accept="image/*" required autofocus>
                    <br>
                


                <div class="form-label-group">
                  <input type="email" id="inputEmail" class="form-control" placeholder="Correo electronico" name="correo" required>
                  <label for="inputEmail">Correo electronico</label>
                </div>

                <div class="form-label-group">
                  <input type="password" id="inputPassword1" class="form-control" placeholder="Contreseña" name="password" required>
                  <label for="inputPassword1">Contreseña</label>
                </div>
  
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Confirma tu contraseña" name="password2" required>
                  <label for="inputPassword">Confirma tu contraseña</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Registrarse</button>
                <hr class="my-4">
                <a class="txt2" href="{{route('login')}}">
                    Tienes una cuenta!Inicia Sesion
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>