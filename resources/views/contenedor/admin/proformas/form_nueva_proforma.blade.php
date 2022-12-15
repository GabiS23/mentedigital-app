@extends('principal.admin.layout_admin')
<style>
    .seccion-proforma{
        background-color: #fff;
        color: #000;
        padding: 0px;
        text-align: center; 
    }
    .carrito_proforma{
        /* padding: 20px; */
        text-align: left;
    }
    .carrito_proforma h4{
        color: #482359;
    }
    select{
        background-color:#fff;
        padding:10px;
        border-radius:5px;
        margin:5px 0px 5px 0px !important;
    }
    .total{
        text-align:center;
    }
</style>
@section('content')
<form method="GET" id="form" name="form" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}

    <div class="orders">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card">
                    
                        <div class="contenido">
                            <div class="crud">
                                <h3>NUEVA PROFORMA</h3>
                                <a id="atras" href="{{route('proforma')}}" data-toggle="tooltip" data-placement="top" title="Atras"><i class="fa fa-solid fa-arrow-left"></i></a>
                                <br>
                                <h4>Datos del cliente</h4>
                            </div>
                            
                            <div class="row">
                                <!-- Empresa -->
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1" class="form-label" >Marca</label>
                                    <select id="id_empresa" name="id_empresa" class="form-control">
                                        <option value="0">Elegir</option>
                                        @foreach($lista_empresa as $e)
                                            <option value="{{$e->id_empresa}}">{{$e->nombre_marca}}</option>
                                        @endforeach
                                    </select>
                                </div> 
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1" class="form-label">Fecha</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" aria-describedby="emailHelp">
                                </div>
                                
                                <div class="col-md-4">
                                    <label for="exampleInputEmail1" class="form-label" >Estado</label>
                                    <select id="estado" name="estado" class="form-control">
                                        <option value="0">Elegir</option>
                                        <option value="1">Aprobado</option>
                                        <option value="2">Propuesta</option>
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                    
                </div> 
            </div>  
        </div>
    </div>
    <div class="orders">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-xl-12">
                <div class="card">
                    
                        <div class="contenido">
                            <div class="crud">
                                <h4>Servicios</h4>
                                <table class="table table-bordered table-hover" id="tusuarios" name="tusuarios">
                                    <thead>
                                        <tr> 
                                            
                                            <th scope="col">Servicio</th>
                                            <th scope="col">Descripción</th>
                                            <th scope="col">Precio Unit.</th>
                                            <th scope="col">Cantidad</th>
                                            <th scope="col">Seleccionar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <!-- foreach -->
                                            @foreach($lista_servicios as $s)
                                            <tr>
                                                @if($s->codigo_nivel=='pla')
                                                    
                                                <td scope="col" style="color:red;">{{$s->nombre}}</td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                <td scope="col"></td>
                                                @else
                                                <td scope="col">{{$s->nombre}}</td>
                                                <td scope="col">{{$s->descripcion}}</td>
                                                <td scope="col">
                                                    <input id="{{'pre_'.$s->id_seccion_servicio}}" name="{{'pre_'.$s->id_seccion_servicio}}" value="{{$s->precio}}"  type="text" class="form-control" id="inputGroupFile01">
                                                </td>
                                                <td scope="col">
                                                    <input id="{{'cant_'.$s->id_seccion_servicio}}" name="{{'cant_'.$s->id_seccion_servicio}}"  type="text" class="form-control" id="inputGroupFile01">
                                                </td>
                                                <td align="center">
                                                    <div style="text-align:center;">
                                                        <input onclick='   chekar( "{{$s->id_seccion_servicio}}");' type="checkbox" value="" id="flexCheckChecked" id="{{'check_'.$s->id_seccion_servicio}}" name="{{'check_'.$s->id_seccion_servicio}}" style="margin:0px;padding:0px;zoom: 2.5;" >
                                                    </div>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            <!-- end foreach -->
                                            
                                    </tbody>
                                </table>
                            </div>
                            <div class="row" style="text-align:center !important;  ">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn_login2" style="width:100% !important;">Guardar</button>
                                </div>
                                <div class="col-md-2">
                                    <a class="btn btn-primary btn_login1" href="{{ route('proforma') }}" style="width:100% !important;color: #fff !important;">Cancelar</a>
                                </div>
                            </div>  
                        </div>
                
                </div> 
            </div>  
        </div>
    </div>
</form>

@stop

<script type="text/javascript">
    
    var lista_temporal = [];

    function chekar(id){
        // alert(id);
        let indice = lista_temporal.findIndex(servicio => servicio.id_seccion_servicio == id);
        if (indice !=-1) {
            // alert('El producto ya esta seleccionado');
            lista_temporal.splice(indice, 1);
            // Swal.fire('Alerta!',
            // 'El producto ya esta seleccionado',
            // 'error');
        }
        else{
            var cantidad=document.getElementById('cant_'+id).value;
            var precio=document.getElementById('pre_'+id).value;

            if(cantidad=='' || precio==''){
                // document.getElementById('check_'+id).checked = false;
                // document.getElementById('check_'+id).setAttribute('checked', 'checked');
                $('.check_'+id).prop("checked", false) ;


                Swal.fire('Alerta!',
                'El campo cantidad y precio es requerido',
                'error');
            }
            else{
                lista_temporal.push({
                    id_seccion_servicio:id,
                    cantidad:cantidad,
                    precio:precio,
                    
                });
            }
            
        }
        console.log(lista_temporal);
    }
    
    function guardar(){
        if(document.getElementById('id_empresa').value.trim()=='' ){
            swal("Alerta!",
                "Seleccione una marca",
                "error");
        }
        else{
            if(document.getElementById('fecha').value.trim()=='' ){
               swal("Alerta!",
                "Ingrese una fecha",
                "error");
            }
            else{
                if(document.getElementById('estado').value.trim()=='' ){
                   swal("Alerta!",
                    "Ingrese el estado de la proforma",
                    "error");
                }
                else{
                   document.getElementById('form').submit();    
                }
            }
        }
    }
</script>