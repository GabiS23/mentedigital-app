
@extends('principal.admin.layout_admin')
@section('content')
<!-- Orders -->
<style>
    .fas:hover{
        color: #EB5D1C !important;
    }
</style>

<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <form method="GET" id="form" name="form" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }} 
                    <div class="contenido">
                        <div class="crud"> 
                            <h4>Lista de huellas digitales</h4>
                            <a id="agregar" href="#"><i class="fa fa-plus-circle" aria-hidden="true" onclick="agregar()"></i></a>
                            <a id="editar"><i class="fa fa-pencil-square" aria-hidden="true" onclick="editar()"></i></a>
                            <a id="eliminar"><i class="fa fa-trash" aria-hidden="true"onclick="eliminar()"></i></a>
                        </div>
                        <table class="table table-bordered table-hover" id="tusuarios" name="tusuarios">
                            
                            <thead>
                                <tr> 
                                    <th scope="col" hidden="hide">Id huella</th>
                                    <th scope="col">Nro</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Descripción</th>
                                    <th scope="col">Usuario reg</th>
                                    <th scope="col">Usuario mod</th>
                                    <th scope="col">Fecha reg</th>
                                    <th scope="col">Fecha mod</th>
                                    <th scope="col">Imprimir</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $contador=0;?>
                                @foreach($lista_huella_digital as $c)
                                <?php $contador++;?>
                                <tr>
                                    <td hidden="hide">{{$c->id_huella_digital}}</td>
                                    <td><?php echo($contador); ?></td>
                                    <td>{{$c->nombre_marca}}</td>
                                    <td>{{$c->rubro}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>{{$c->fecha_reg}}</td>
                                    <td>{{$c->fecha_mod}}</td>
                                    <td><i class="fas fa-print"></i></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </form>
            </div> 
        </div>  
    </div>
</div>
@stop
<script>
    function agregar(){
        
        var url="{{route('form_nueva_huella')}}";
        location.href = url;
    }
</script>