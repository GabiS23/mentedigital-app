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
                                    <h4>Editar servicio</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="crud">
                                    <a id="agregar" href="{{ route('servicio') }}" data-toggle="tooltip" data-placement="top" title="Atras"><i class="fa fa-solid fa-arrow-left"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" id="form" name="form" action="{{ route('editar_servicio',$id_seccion_servicio) }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" type="text" class="form-control" id="id_padre" name="id_padre" placeholder="Codigo de producto" value="<?php echo $id_padre; ?>">
                                    <!-- nivel -->
                                    <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label" >Nivel</label>
                                        <select id="id_nivel" name="id_nivel" class="form-control">
                                            <option value="0">Elegir</option>
                                            @foreach($lista_nivel as $n)
                                                @if($id_nivel == $n->id_nivel)
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
                                                        <option selected value="{{$n->id_plataforma_digital}}">{{$n->nombre_plataforma_digital}}</option>
                                                    @else
                                                        <option value="{{$n->id_plataforma_digital}}">{{$n->nombre_plataforma_digital}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div> 
                                    @else
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label" >Nombre</label>
                                            <input type="text"  class="form-control" id="exampleInputEmail1" name="nombre" id="nombre" aria-describedby="emailHelp" value="<?php echo $nombre; ?>">
                                        </div>
                                    @endif

                                    @if($codigo_nivel == 'ser')
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Descripción</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp" value="<?php echo $descripcion; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Precio</label>
                                            <input type="text" class="form-control" id="precio" name="precio" aria-describedby="emailHelp" value="<?php echo $precio; ?>">
                                        </div>
                                        @else
                                        <input type="hidden" class="form-control" id="descripcion" name="descripcion" aria-describedby="emailHelp" values="">
                                        <input type="hidden" class="form-control" id="precio" name="precio" aria-describedby="emailHelp" values="">
                                    @endif

                                    <button type="submit" class="btn btn-primary" style="width: 100%;background-color:#482359;color:#fff !important;">Guardar</button>
                                    
                                </form>    
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                        
                    </div>
                
            </div> 
        </div>  
    </div>
</div>
@stop