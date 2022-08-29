
@extends('principal.admin.layout_admin')
@section('content')
<script>
     var var_id_huella=0;
    
</script>
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
                            <a id="eliminar"><i class="fa fa-trash" aria-hidden="true" onclick="eliminar()"></i></a>
                            <a target="_blank" id="pdf" name="pdf"><i class="fas fa-print" aria-hidden="true" onclick="pdf()"></i></a>
                        </div>
                        <table class="table table-bordered table-hover" id="tusuarios" name="tusuarios">
                            
                            <thead>
                                <tr> 
                                    <th scope="col" hidden="hide">Id huella</th>
                                    <th scope="col">Nro</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Descripción / Rubro</th>
                                    <th scope="col">Nivel de eficacia en redes sociales %</th>
                                    <th scope="col">Fecha reg</th>
                                    <th scope="col">Fecha mod</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php $contador=0;?>
                                @foreach($lista_huella_digital as $c)
                                <?php $contador++;?>
                                <tr onclick="seleccionar_diagnostico_huella({{$c->id_huella_digital}})" data-node-id='<?php echo ($c->id_huella_digital); ?>'>
                                    <td hidden="hide">{{$c->id_huella_digital}}</td>
                                    <td><?php echo($contador); ?></td>
                                    <td>{{$c->nombre_marca}}</td>
                                    <td>{{$c->rubro}}</td>
                                    <td>{{$c->respuesta_porcentaje}}</td>
                                    <td>{{$c->fecha_reg}}</td>
                                    <td>{{$c->fecha_mod}}</td>
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
    function editar(){
        
        var url="{{route('form_editar_huella',['id'=>'temp'])}}";
        var url = url.replace('temp',var_id_huella);
        location.href = url;
    }
    function seleccionar_diagnostico_huella(id_huella_digital){

        $(document).ready(function(){
            var_id_huella = id_huella_digital;
            console.log('id_huella_digital seleccionado',var_id_huella);
            // $("#id_label").html(nombre);
            Swal.fire({
                position: 'top-end',
                // icon: 'success',
                title: 'Producto seleccionado',
                showConfirmButton: false,
                timer: 1200
            })

        });
    }
    function pdf(){
        
        var url="{{route('pdf_huella_digital',['id'=>'temp'])}}";
        var url = url.replace('temp',var_id_huella);
        location.href = url;
        
    }
</script>