
@extends('principal.admin.layout_admin')
@section('content')
<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <form method="GET" id="form" name="form" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="contenido">
                            <h4>Lista de marcas</h4>
                            <div class="crud"> 
                                <a id="agregar" href="#"><i class="fa fa-plus-circle" aria-hidden="true" onclick="agregar()"></i></a>
                                <a id="editar"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                                <a id="eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                            <div class="tablewrapper">
                                <table class="table table-bordered" id="basic" border="1" style="width:100%;">
                                    <thead>
                                        <tr> 
                                            <th hidden="hide">Id producto</th>
                                            <th>Nro</th>
                                            <th scope="col">Código</th>
                                            <th scope="col">Nombre marca</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyid">
                                        <?php $nro=0; ?>
                                        @foreach($lista_marca as $m)
                                        <?php $nro++; ?>
                                        <tr>
                                            <td hidden="hide">{{$m->id_empresa}}</td>
                                            <td>{{$nro}}</td>
                                            <td scope="col">{{$m->codigo}}</td>
                                            <td scope="col">{{$m->nombre_marca}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>    
                                </table>
                            </div>
                        </div>
                    </div> 
                </form>
            </div> 
        </div>  
    </div>
</div>
@stop
<script>
    function agregar(){
        console.log('Servicio seleccionado en agregar');
        var url="{{route('form_nueva_marca')}}";
        location.href = url;
    }
</script>