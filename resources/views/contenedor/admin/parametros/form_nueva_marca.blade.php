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
                                <a id="atras" href="{{route('marca')}}" data-toggle="tooltip" data-placement="top" title="Atras"><i class="fa fa-solid fa-arrow-left"></i></a>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <form method="POST" id="nueva_marca" name="nueva_marca" action="{{route('nueva_marca')}}" enctype="multipart/form-data">
                            
                                {{ csrf_field() }}
                                <input type="hidden" type="text" class="form-control"  id="" name="" placeholder="Codigo de producto">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label" >Marca</label>
                                    <input type="text" class="form-control"  id="nombre_marca" name="nombre_marca" placeholder="Nombre de la marca" value="{{$nombre_marca}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <button type="submit" class="btn_login2 button btn btn-primary btn-block"  href="#"><i class="fas fa-angle-double-right"></i> Guardar</button>
                                         
                                    </div>
                                    <div class="col-md-6">
                                        <div class="">
                                            <a class="btn_login1 button btn btn-primary btn-block " href="{{route('marca')}}"><i class="fas fa-reply "></i> Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>    
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>  
    </div>
    
    
</div>
@stop
