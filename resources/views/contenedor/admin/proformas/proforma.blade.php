
@extends('principal.admin.layout_admin')
@section('content')
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
                        </div>
                        <table class="table table-bordered table-hover" id="tusuarios" name="tusuarios">
                            <thead>
                                <tr> 
                                    <th scope="col" hidden="hide">Id producto</th>
                                    <th scope="col">Nro</th>
                                    <th scope="col">Num. proforma</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Nombre cliente</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Usuario reg</th>
                                    <th scope="col">Usuario mod</th>
                                    <th scope="col">Fecha reg</th>
                                    <th scope="col">Fecha mod</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td hidden="hide"></td>
                                    <td>1</td>
                                    <td>P-0001</td>
                                    <td>Opticas Patrick</td>
                                    <td>Emiliano Perez</td>
                                    <td>75489654</td>
                                    <td>Gaby</td>
                                    <td></td>
                                    <td>18/07/2022</td>
                                    <td></td>
                                </tr>
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
</script>