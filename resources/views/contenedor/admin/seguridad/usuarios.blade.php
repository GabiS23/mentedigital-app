@extends('principal.admin.layout_admin')
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card"> 
                <form method="GET" id="form2" name="form2" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="contenido">
                        <div class="crud"> 
                            <h4>Lista de usuarios</h4>
                            <a id="agregar"><i class="fa fa-plus-circle" href="#" aria-hidden="true" onclick="agregar()"></i></a>
                            <a id="editar"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            <a id="eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                        <table class="table table-hover table-bordered" id="tusuarios" name="tusuarios">
                            <thead>
                                <tr>
                                    <th hidden="hide" >Id usuario</th>
                                    <th>Nro</th>
                                    <th>Usuario</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyid">
                                <?php $nro=0; ?>
                                @foreach($lista_usuarios as $u)
                                <?php $nro++; ?>
                                <tr>
                                    <td hidden="hide">{{$u->id}}</td>
                                    <td>{{$nro}}</td>
                                    <td>{{$u->name}}</td>
                                    <td>{{$u->email}}</td>
                                    <td>{{$u->nombre_rol}}</td>
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