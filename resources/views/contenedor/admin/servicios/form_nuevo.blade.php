@extends('principal.admin.layout_admin')
@section('content')
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                    <div class="contenido">
                        <div class="row">
                            <div class="col md-12">
                                <div class="crud">
                                    <h4>Crear nuevo</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="crud">
                                    <a id="atras" href="{{ route('servicio') }}" data-toggle="tooltip" data-placement="top" title="Atras"><i class="fa fa-solid fa-arrow-left"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <form method="POST" id="form" name="form" action="{{ route('nuevo_servicio',$id_padre) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" type="text" class="form-control"  id="id_padre" name="id_padre" placeholder="Codigo de producto" value="<?php echo $id_padre; ?>">
                                    <!-- nivel -->
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" >Nivel</label>
                                        <select id="id_nivel_siguiente" name="id_nivel_siguiente" class="form-control">
                                            <option value="0">Elegir</option>
                                            @foreach($lista_nivel as $n)
                                                @if($id_nivel_siguiente == $n->id_nivel)
                                                    <option value="{{$n->id_nivel}}" selected>{{$n->descripcion_nivel}}</option>
                                                @else
                                                    <option value="{{$n->id_nivel}}">{{$n->descripcion_nivel}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>                                       
                                    @if($codigo_nivel == 'esp')
                                        <!-- id_plataforma_digital -->
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label" >Plataforma digital</label>
                                            <select id="id_plataforma_digital" name="id_plataforma_digital" class="form-control">
                                                <option value="0">Elegir</option>
                                                @foreach($lista_plataforma_digital as $n)
                                                    @if($id_plataforma_digital == $n->id_plataforma_digital)
                                                        <option value="{{$n->id_plataforma_digital}}">{{$n->nombre_plataforma_digital}}</option>
                                                    @else
                                                        <option value="{{$n->id_plataforma_digital}}">{{$n->nombre_plataforma_digital}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div> 
                                    @else
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label" >Nombre</label>
                                            <input type="text"  class="form-control" id="exampleInputEmail1" name="nombre" id="nombre" aria-describedby="emailHelp">
                                        </div>
                                    @endif
                                    
                                    
                                    @if($codigo_nivel == 'ser')
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Descripción</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Precio</label>
                                            <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp">
                                        </div>
                                        @else
                                        <input type="hidden" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp" values="">
                                        <input type="hidden" class="form-control" id="precio" name="precio" aria-describedby="emailHelp" values="">
                                    @endif

                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn_login2" style="width:100% !important;">Guardar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary btn_login1" href="{{ route('servicio') }}" style="width:100% !important;color: #fff !important;">Cancelar</a>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                            <div class="col-md-8">
                            </div>
                        </div>
                        
                        
                    </div>
                
            </div> 
        </div>  
    </div>
</div>
@stop