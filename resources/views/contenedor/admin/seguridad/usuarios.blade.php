@extends('principal.admin.layout_admin')
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-xl-12">
            <div class="card"> 
                <form method="GET" id="form2" name="form2" action="{{ route('usuarios') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="contenido">
                        <div class="crud"> 
                            <h4>Lista de usuarios</h4>
                            <a href="{{ route('form_nuevo_usuario') }}" id="agregar"><i class="fa fa-plus-circle" href="#" aria-hidden="true" onclick="agregar()"></i></a>
                            
                        </div>
                        <table class="table table-hover table-bordered" id="tusuarios" name="tusuarios">
                            <thead>
                                <tr>
                                    <th hidden="hide" >Id usuario</th>
                                    <th>Nro</th>
                                    <th>Usuario</th>
                                    <th>Correo</th>
                                    <th>Rol</th>
                                    <th>Acciones</th>
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
                                    <td>
                                            <!-- Button -->
                                            <ul>    
                                                <li>
                                                    <div class="crud" style="text-decoration:none !important;">
                                                        <a href="{{ route('form_editar_usuario',$u->id) }}" id="editar" style="text-decoration:none !important;"><i class="fa fa-pencil-square" aria-hidden="true" onclick="editar()"></i></a>
                                                        <a id="eliminar" style="text-decoration:none !important;"><i class="fa fa-trash" aria-hidden="true" onclick="eliminar_usuario({{$u->id}})"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <!-- Button -->
                                        </td>
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

<script type="text/javascript">
    function eliminar_usuario(id){ 
        var param={id_usuario:id};
        var url="{{route('eliminar_usuario')}}";
        if (confirm("Esta seguro de liminar el registro!")) {
            $.ajax({   
                type: "post",
                url:url,
                //envia parametros
                data:{dato: param },
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success: function(rcdata){ 
                    //recibe parametros
                //    console.log(rcdata);
                //    document.form2.submit();
                    if(rcdata==""){
                        window.location.href = '{{url("usuarios_index")}}';
                    }
                    else{
                        alert(rcdata);
                    }
                }
            });
            // alert("You pressed OK!");
        }
        
    }
</script>
<script>
    var table = $('#tusuarios').DataTable({
        language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
            "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
            "infoFiltered": "(Filtrado de _MAX_ total entradas)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Entradas",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
            },
        });
</script>
@stop