@extends('principal.admin.layout_admin')
<style>
    input, label{
        font-size: 14px !important;
    }
    
</style>
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <div class="contenido">
                    <div class="row">
                        <div class="col md-12">
                            <div class="crud">
                                <h4>Crear nueva marca</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <form method="POST" id="form" name="form" action="{{ route('nueva_marca') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!-- <input type="hidden" type="text" class="form-control"  id="id_padre" name="id_padre" placeholder="Codigo de producto" > -->

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" >Marca</label>
                                    <input type="text"  class="form-control" id="exampleInputEmail1" name="nombre" id="nombre" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Rubro / descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="birthday">Fecha de ingreso</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday">
                                    <!-- <input type="submit"> -->
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                                </div>
                                                           
                            </form>    
                        </div>
                        <div class="col-md-3">
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nro. de sucursales</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Dirección</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="birthday">Fecha de aniversario</label>
                                <input type="date" class="form-control" id="birthday" name="birthday">
                                <!-- <input type="submit"> -->
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Pais</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                                
                        </div>
                        <div class="col-md-3">
                            
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Ciudad</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Provinicia</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Url de Linkedin</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label"> url de facebook</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Url de instagram</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Url de tiktok</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Url de youtube</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Página web</label>
                                <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="contenido">
                    <div class="crud">
                        <h4>Datos del cliente 1</h4>
                    </div>
                    <form method="POST" id="form" name="form" action="{{ route('nueva_marca') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                    <input type="hidden" type="text" class="form-control"  id="id_padre" name="id_padre" placeholder="Codigo de producto" >
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" >Nombre</label>
                                    <input type="text"  class="form-control" id="exampleInputEmail1" name="nombre" id="nombre" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Cargo</label>
                                    <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="birthday">Fecha de cumpleaños</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday">
                                    <!-- <input type="submit"> -->
                                </div>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="contenido">
                    <div class="crud">
                        <h4>Datos del cliente 2</h4>
                    </div>
                    <form method="POST" id="form" name="form" action="{{ route('nueva_marca') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-6">
                                    <input type="hidden" type="text" class="form-control"  id="id_padre" name="id_padre" placeholder="Codigo de producto" >
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" >Nombre</label>
                                    <input type="text"  class="form-control" id="exampleInputEmail1" name="nombre" id="nombre" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Cargo</label>
                                    <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                                </div>
                               
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Celular</label>
                                    <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="birthday">Fecha de cumpleaños</label>
                                    <input type="date" class="form-control" id="birthday" name="birthday">
                                    <!-- <input type="submit"> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <div class="mb-3">
                <button class="btn_login2 button btn btn-primary btn-block" type="submit" href="#"><i class="fas fa-angle-double-right"></i> Guardar</button>
            </div>
        </div>
        <div class="col-md-2">
            <div class="mb-3">
                <a class="btn_login1 button btn btn-secondary btn-block " href="#"><i class="fas fa-reply "></i> Cancelar</a>
            </div>
        </div>
    </div>
</div>
@stop
