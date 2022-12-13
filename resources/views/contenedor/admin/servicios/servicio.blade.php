
@extends('principal.admin.layout_admin')
<style>.crud_label{text-align:right;} .tree { border:0px solid black; padding:10px; width:300px; margin:20px; float:left; min-height:200px; }</style>
<script>
     var var_id_servicio=0;
</script>
@section('content')
<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <div class="contenido">
                
                    <?php for ($i = 0; $i < count($mensaje); $i++){ ?>
                        <div class="alert alert-danger"> <?php echo $mensaje[$i] ?> </div>
                    <?php } ?>
                    <div class="row">
                        <h4>Servicios</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="crud">
                                <a id="agregar" href="#"data-toggle="tooltip" data-placement="top" title="Agregar"><i class="fa fa-plus-circle" aria-hidden="true" onclick="agregar()"></i></a>
                                <span class="d-inline-block" tabindex="0" data-toggle="tooltip" title="Editar">
                                    <a id="editar"><i class="fa fa-pencil-square" aria-hidden="true" onclick="editar()"></i></a>
                                </span>
                                <a id="eliminar"><i class="fa fa-trash" aria-hidden="true" onclick="eliminar()" ></i></a>
                                <a id="expander"><i class="fa fa-expand" aria-hidden="true"></i></a>
                                <a id="collapser"><i class="fa fa-compress" aria-hidden="true"></i></a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="crud_label">
                                <div name="id_label" id="id_label"></div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover table-bordered" id="basic" border="1" style="width:100%;">
                            <?php $contador=0;?>
                            @foreach($lista_servicios as $c)
                                <?php $contador++;?>
                                @if ($c->nivel==0)  
                                    <thead>
                                        <tr>
                                            <th scope="col" style="font-size: 13px !important; width: 500px !important;">SECCION</th>
                                            <th scope="col" style="font-size: 13px !important">NIVEL</th>
                                            <th scope="col" style="font-size: 13px !important">DESCRIPCION</th>
                                            <th scope="col" style="font-size: 13px !important">CANTIDAD</th>
                                            <th scope="col" style="font-size: 13px !important">PRECIO UNIT. Bs</th>
                                            <th scope="col" style="font-size: 13px !important">SUB TOTAL</th>
                                        </tr>
                                    </thead>
                                @else
                                    <tbody>
                                        <tr onclick="seleccionar_servicio('{{$c->id_seccion_servicio}}','{{$c->nombre}}')" data-node-id='<?php echo ($c->id_seccion_servicio); ?>' data-node-pid='<?php echo ($c->id_padre); ?>'>
                                            <td scope="col">{{$c->nombre}}</td>
                                            <td scope="col">{{$c->descripcion_nivel}}</td>
                                            <td scope="col">{{$c->descripcion}}</td>
                                            <td scope="col">{{$c->cantidad_servicio}}</td>
                                            <td scope="col">{{$c->precio}}</td>
                                            <td scope="col"></td>
                                        </tr> 
                                    </tbody>   
                                @endif
                            @endforeach
                    </table>
                </div>
            </div> 
        </div>  
    </div>
</div>
<!-- jquery para select y tree -->
<script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<!-- <script src="{{asset('visita/dist/jstree.min.js')}}"></script> -->
<script src="{{asset('visita/js/jquery-simple-tree-table.js')}}"></script>

<script>
    $('#basic').simpleTreeTable({
        expander: $('#expander'),
        collapser: $('#collapser'),
        store: 'session',
        storeKey: 'simple-tree-table-basic'
    });
    $('#open1').on('click', function() {
        $('#basic').data('simple-tree-table').openByID("1");
    });
    $('#close1').on('click', function() {
        $('#basic').data('simple-tree-table').closeByID("1");
    });
</script>
   
<script>
    // seleccionar_servicio(1);
    function seleccionar_servicio(id_seccion_servicio,nombre){

        $(document).ready(function(){
            var_id_servicio = id_seccion_servicio;
            console.log('Servicio seleccionado',var_id_servicio,nombre);
            
            $("#id_label").html(nombre);
        });
    }

    function agregar(){
        console.log('Servicio seleccionado en agregar',var_id_servicio);
        var url="{{route('form_nuevo',['id'=>'temp'])}}";
        var url = url.replace('temp',var_id_servicio);
        location.href = url;
    } 
    function eliminar(){
        console.log('Servicio seleccionado para eliminar',var_id_servicio);
        var url="{{route('eliminar_servicio',['id'=>'temp'])}}";
        var url = url.replace('temp',var_id_servicio);
        location.href = url;
    } 
    function editar(){
        // console.log('Servicio seleccionado en agregar',var_id_servicio);
        var url="{{route('form_editar',['id'=>'temp'])}}";
        var url = url.replace('temp',var_id_servicio);
        location.href = url;
    } 

    // $(document).on('ready',function(){
    //         $.ajax({
    //         type: "GET",
    //         url: "{{ route('tabla_tree')}}",
    //         data:{_token: "{{ csrf_token() }}",pupu:'gabi'},
    //         // datatype: 'JSON',
    //         success: function(data)
    //         {
    //             var tabla_string ="";
    //             var tree=data["lista_servicios"];
    //             for (let index = 0; index < tree.length; index++) {
    //                 tabla_string+=tree[index].gabi;
    //                 // $("<tr><td>Test Row Append</td></tr>").append("#basic");
    //             }
    //             // $('#basic').append(tabla_string);
    //             // $( "<table>" ).append(tabla_string);
    //             console.log('Tabla strint',tabla_string);
    //         }
    //         });
    //     });

    
</script>
@stop