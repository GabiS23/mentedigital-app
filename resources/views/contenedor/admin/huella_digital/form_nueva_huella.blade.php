@extends('principal.admin.layout_admin')
@section('content')
<style>
    form-check-input{
        color:red !important;
    }
</style>
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                    <div class="contenido">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="crud">
                                    <a id="atras" href="{{ route('huella_digital')}}" data-toggle="tooltip" data-placement="top" title="Atras"><i class="fa fa-solid fa-arrow-left"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col md-12">
                                <div class="crud">
                                    <h4>Nuevo diagnóstico huella digital</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="POST" id="form" name="form" action="{{ route('form_guardar_huella') }}" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" type="text" class="form-control"  id="" name="" placeholder="Codigo de producto">
                                    
                                        <!-- <label for="exampleInputEmail1" class="form-label" >Nombre de la marca</label>
                                        <input type="text"  class="form-control" id="exampleInputEmail1" name="nombre" id="nombre" aria-describedby="emailHelp">
                                     -->
                                    <!-- Empresa -->
                                    <div class="mb-6">
                                        <label for="exampleInputEmail1" class="form-label" >Empresa</label>
                                        <select id="id_empresa" name="id_empresa" class="form-control">
                                            <option value="0">Elegir</option>
                                            @foreach($lista_empresa as $e)
                                                <option value="{{$e->id_empresa}}">{{$e->nombre_marca}}</option>
                                            @endforeach
                                        </select>
                                    </div>  

                                    <div class="mb-6">
                                        @foreach($lista_cuestionario as $n)
                                            @if($n->titulo=='si')
                                            <br> 
                                                <div class="crud">
                                                    <h4>{{$n->pregunta}}</h4>
                                                </div>
                                            @else
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value='<?php echo ($n->id_nivel); ?>' id='<?php echo ('pre_'.$n->id_nivel); ?>' name='<?php echo ('pre_'.$n->id_nivel); ?>'>
                                                    <label class="form-check-label" for="flexCheckDefault">
                                                    {{$n->pregunta}}
                                                    </label>
                                                </div>
                                            @endif
                                        @endforeach
                                        
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary btn_login2" style="width:100% !important;">Guardar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-primary btn_login1" href="{{ route('huella_digital') }}" style="width:100% !important;color: #fff !important;">Cancelar</a>
                                        </div>
                                    </div>
                                </form>    
                            </div>
                            <div class="">
                            </div>
                        </div>
                        
                        
                    </div>
                
            </div> 
        </div>  
    </div>
</div>
@stop