@extends('principal.admin.layout_admin')
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <form method="GET" id="form2" name="form2" action="" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="contenido">
                        <div class="crud">
                            <h4>Lista de clientes</h4>
                            <a id="agregar"><i class="fa fa-plus-circle" href="#" aria-hidden="true" onclick="agregar()"></i></a>
                            <a id="editar"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                            <a id="eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        </div>
                        <table class="table table-hover table-bordered" id="tusuarios" name="tusuarios">
                            <thead>
                                <tr>
                                    <th hidden="hide" >Id cliente</th>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>CI</th>
                                    <th>Exp</th>
                                    <th>Fecha nac.</th>
                                    <th>Género</th>
                                    <th>Dirección</th>
                                    <th>Celular</th>
                                    <th>Fecha reg</th>
                                    <th>Fecha mod</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyid">
                                <?php $nro=0; ?>
                                @foreach($lista_clientes as $u)
                                <?php $nro++; ?>
                                <tr>
                                    <td hidden="hide">{{$u->id_cliente}}</td>
                                    <td>{{$nro}}</td>
                                    <td>{{$u->nombre}}</td>
                                    <td>{{$u->apellido}}</td>
                                    <td>{{$u->ci}}</td>
                                    <td>{{$u->expedido}}</td>
                                    <td>{{$u->fecha_nacimiento}}</td>
                                    <td>{{$u->genero}}</td>
                                    <td>{{$u->direccion}}</td>
                                    <td>{{$u->celular}}</td>
                                    <td>{{$u->fecha_reg}}</td>
                                    <td>{{$u->fecha_mod}}</td>
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