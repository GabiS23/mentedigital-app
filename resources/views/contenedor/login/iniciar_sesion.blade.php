@extends('principal.login.layout_login')
@section('content')

<body class="m-0 vh-100 row justify-content-center align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-sm-3 col-md-3 col-lg-3 mx-auto">
            <div class="centrado_login">
              <img src="./visita/imagen_empresa/logos/logo2.png" height="150px;">
              <br><br>
              <h5 class="titulo-login">INICIAR SESIÓN</h5>
              <br>
              <form class="form-signin" method="POST" action="{{ route('iniciar_sesion') }}">
                <?php if($error=='si'){  ?>
                  <div class="alert alert-danger" role="alert">
                      Usuario o contraseña incorrecto!
                    </div>
                <?php } ?>
                @csrf
                <div>
                  <input style="height:45px; border-radius:10px;" placeholder="Email" type="email" id="email" name="email" class="form-control">
                </div>
                <br>
                <div>
                  <input style="height:45px; border-radius:10px;" type="password" id="password" name="password" class="form-control" placeholder="Password">
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <a class="btn btn-primary btn_login1" type="submit" href="{{route('inicioAdmin') }}">Aceptar</a>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-6 mx-auto">
                    <a class="btn btn-primary btn_login2" href="{{ route('inicio_index') }}">Cancelar</a>
                  </div>
                </div>
                <br>
              </form>
            </div>
      </div>
    </div>
  </div>
</body>
@stop
