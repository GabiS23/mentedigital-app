
@extends('principal.admin.layout_admin')
@section('content')
<script>
     var var_id_marca=0;
    
</script>
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
                                <a id="editar"><i class="fa fa-pencil-square" aria-hidden="true" onclick="editar()"></i></a>
                                <a id="eliminar"><i class="fa fa-trash" aria-hidden="true"></i></a>
                            </div>
                            <div class="tablewrapper">
                                <table class="table table-bordered" id="basic" border="1" style="width:100%;">
                                    <thead>
                                        <tr> 
                                            <th hidden="hide">Id producto</th>
                                            <th>Nro</th>
                                            <th scope="col">Nombre marca</th>
                                            <th scope="col">Usuario reg</th>
                                            <th>Fecha de registro</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyid">
                                        <?php $nro=0; ?>
                                        @foreach($lista_marca as $m)
                                        <?php $nro++; ?>
                                        <tr onclick="seleccionar_diagnostico_huella({{$m->id_empresa}})" data-node-id='<?php echo ($m->id_empresa); ?>'>
                                            <td hidden="hide">{{$m->id_empresa}}</td>
                                            <td>{{$nro}}</td>
                                            <td scope="col">{{$m->nombre_marca}}</td>
                                            <td scope="col">{{$m->name}}</td>
                                            <td scope="col">{{$m->fecha_reg}}</td>
                                            
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
    
    function editar(){
        
        var url="{{route('form_editar_marca',['id'=>'temp'])}}";
        var url = url.replace('temp',var_id_marca);
        location.href = url;
    }
    function seleccionar_diagnostico_huella(id_empresa){

        $(document).ready(function(){
            var_id_marca = id_empresa;
            
            // $("#id_label").html(nombre);
            Swal.fire({
                position: 'top-end',
                // icon: 'success',
                title: 'Marca seleccionada',
                showConfirmButton: false,
                timer: 1200
            })

        });
    }
</script>