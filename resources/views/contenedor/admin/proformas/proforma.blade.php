
@extends('principal.admin.layout_admin')
@section('content')
<script>
     var var_proforma=0;
    
</script>
<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <form method="GET" id="form" name="form" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="contenido">
                        <div class="crud"> 
                            <h4>Lista de proformas</h4>
                            <a id="agregar" href="#"><i class="fa fa-plus-circle" aria-hidden="true" onclick="agregar()"></i></a>
                            <a id="editar"><i class="fa fa-pencil-square" aria-hidden="true" onclick="editar()"></i></a>
                            <a id="eliminar"><i class="fa fa-trash" aria-hidden="true"onclick="eliminar()"></i></a>
                            <a target="_blank" id="pdf" name="pdf"><i class="fas fa-print" aria-hidden="true" onclick="pdf()"></i></a>
                        </div>
                        <table class="table table-bordered table-hover" id="tusuarios" name="tusuarios">
                            <thead>
                                <tr> 
                                    <th scope="col" hidden="hide">Id proforma</th>
                                    <th scope="col">Nro</th>
                                    <th scope="col">Num. proforma</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Fecha reg</th>
                                    <th scope="col">Usuario reg</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $contador=0;?>
                                @foreach($lista_proformas as $p)
                                <?php $contador++;?>
                                <tr onclick="seleccionar_proforma({{$p->id_proforma}})" data-node-id='<?php echo ($p->id_proforma); ?>'>
                                    <td hidden="hide">{{$p->id_proforma}}</td>
                                    <td><?php echo($contador); ?></td>
                                    <td>{{$p->nro_proforma}}</td>
                                    <td>{{$p->nombre_marca}}</td>
                                    <td>{{$p->estado}}</td>
                                    <td>{{$p->fecha_reg}}</td>
                                    <td>{{$p->name}}</td>
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
        console.log('Servicio seleccionado en agregar');
        var url="{{route('form_nueva_proforma')}}";
        // var url = url.replace('temp',var_id_servicio);
        location.href = url;
    }
    function seleccionar_proforma(id_proforma){
        $(document).ready(function(){
            var_proforma = id_proforma;
            console.log('id_proforma seleccionado',var_proforma);
            // $("#id_label").html(nombre);
            Swal.fire({
                position: 'top-end',
                // icon: 'success',
                title: 'Proforma seleccionada',
                showConfirmButton: false,
                timer: 1200
            })

        });
    }
    function editar(){
        
        var url="{{route('form_editar_proforma',['id'=>'temp'])}}";
        var url = url.replace('temp',var_proforma);
        location.href = url;
    }
    function pdf(){
        
        var url="{{route('pdf_proforma',['id'=>'temp'])}}";
        var url = url.replace('temp',var_id_huella);
        location.href = url;
        
    }
</script>