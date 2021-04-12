<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    @if(!isset($publicaciones))
        <p>No hay</p>
    @else
        <p>Todo bien</p>
    @endif
    <a class="txt2" href="{{route('email')}}">
      Prueba
      <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
    </a>
</body>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Nueva publicacion</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva Publicacion</h4>
      </div>
      <div class="container">
      <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
          <div class="card card-signin my-5">
            <div class="card-body">
              <form class="form-signin" id="form-publicaciones" method="post">
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
                  <label class="text-dark">Contenido Publicacion</label>
                  <textarea name="textarea" id="inputEmail" rows="10" class="form-control" placeholder="Publicacion texto" cols="50" required ></textarea>
                </div>
  
                <label class="text-dark">Sube una foto para la publicacion</label>
                <input type="file" class="form-control" name="imagen" accept="image/*" required autofocus>
                <br>
                <button id="btn-guardar" class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Crear publicacion</button>
                <hr class="my-4">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        $('#btn-guardar').click(function(){
            var datos=$('form-publicaciones').serialize();
            $.ajax({
                type="POST",
                headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                url="{{route('registrarP.form')}}",
                data=datos,
                success:function(){
                    if(r==1){
                        alert("Publicacion creada con exito");
                    }else{
                        alert("Error, intentalo mas tarde");
                    }
                }
                
            })
        });
    });
</script>