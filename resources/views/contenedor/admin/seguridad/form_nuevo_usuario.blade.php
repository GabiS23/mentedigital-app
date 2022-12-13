@extends('principal.admin.layout_admin')
@section('content')
<style>
.form-group input:required~input::before {
        content: "* ";
        color: red;
        font-weight: bold;
    }
</style>
<div class="container-fluid">
    <div class="sectionAdmin">
        <div class="Container">
            <div class="contenidoAdmin">
            <form method="POST" id="nuevo_usuario" name="nuevo_usuario" action="{{ route('guardar_usuario') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-2"></div>
                    <!-- inicio formulario -->
                        <div class="col-md-8">
                        <h3>Nuevo usuario</h3> 
                        <p>Los elementos marcados con un * son obligatorios.</p>
                                    
                            <?php for($i = 0; $i < count($lista_errores); $i++){ ?>
                                <div class="alert alert-danger" role="alert" >
                                <?php echo($lista_errores[$i]); ?>
                                </div>
                            <?php } ?>
                            <?php if($validacion_correcta==1){ ?>
                                <div class="alert alert-success" role="alert" >
                                Registrado correctamente
                                </div>
                            <?php } ?>

                        <br>
                        <form>
                            <div class="row">
                                <!-- Usuario -->
                                <div class="form-group col-md-4">
                                    <label>Usuario</label>
                                    <input type="text" class="form-control"  id="name" name="name" placeholder="Nombre de usuario" value="{{$name}}" required >
                                </div>
                            </div>
                            <div class="row">
                                <!-- contraseña -->
                                <div class="form-group col-md-4">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="contraseña" value="{{$password}}" required>
                                </div>
                            </div>
                            <div class="row">
                                <!-- contraseña -->
                                <div class="form-group col-md-4">
                                    <label>Repetir contraseña</label>
                                    <input type="password" class="form-control" id="password_repeat" name="password_repeat" placeholder="contraseña" value="{{$password_repeat}}">
                                </div>
                            </div>
                            <div class="row">
                                <!-- email -->
                                <div class="form-group col-md-4">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$email}}">
                                </div>
                            </div>
                            <div class="row">
                                <!-- rol -->
                                <div class="form-group col-md-4">
                                    <label for="inputState">Rol</label>
                                    <select id="id_rol" name="id_rol" class="form-control">
                                        <option value="0">Elegir</option>
                                        @foreach($lista_rol as $s)
                                            @if($id_rol >= $s->id_rol)
                                                <option value="{{$s->id_rol}}" selected>{{$s->nombre_rol}}</option>
                                            @else
                                            <option value="{{$s->id_rol}}">{{$s->nombre_rol}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>   
                            </div>
                            
                            <br>
                        
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;&nbsp;Guardar</button>
                                    <a href="{{ route('usuarios') }}" class="d-none btn btn-sm btn-danger"><i class="fa fa-ban" aria-hidden="true"></i>&nbsp;&nbsp;Cancelar</a>
                                    <a class="d-done btn btn-sm btn-warning " href="{{ url('usuarios') }}"><i class="fa fa-reply "></i>&nbsp;&nbsp;Atras</a>                
                                </div>
                            </div>
                        </form>
                    </div> 
                        </div>
                    <!-- fin formulario -->
                    <div class="col-md-2"></div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(".js-example-basic-multiple").select2();
</script>
<!-- <script>
    var elements = document.getElementsByTagName("input")
    for (var i = 0; i < elements.length; i++) {
        if (elements[i].required == true) {
            document.getElementById("asterisco").style.display = "inline";
        }
    }
</script> -->
@stop