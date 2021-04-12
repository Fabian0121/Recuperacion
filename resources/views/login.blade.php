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
              <h5 class="card-title text-center">Inicio de Sesion</h5>
              <form class="form-signin" method="post" action="{{route('login.form')}}">
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
                  <input type="email" id="inputEmail" name="correo" class="form-control" placeholder="Email address" required autofocus>
                  <label for="inputEmail">Correo electronico</label>
                </div>
  
                <div class="form-label-group">
                  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                  <label for="inputPassword">Contreseña</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Iniciar Sesion</button>
                <hr class="my-4">
                <a class="txt2" href="{{route('registrarse')}}">
                    Crea una cuena!Registrate
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