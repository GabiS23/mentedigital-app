@extends('principal.admin.layout_admin')
@section('content')
<script>
     var var_id_huella2=0;
    
</script>
<style>
    form-check-input{
        color:red !important;
    }
</style>
<div class="row">
    <div class="col-md-4">
        HOLA
    </div>
    <div class="col-md-4">
        HOLA
    </div>
    <div class="col-md-4">
        HOLA
    </div>
</div>
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
                                    <h4>DIAGNÓSTICO DE HUELLA DIGITAL</h4>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <form method="get" id="form" name="form" action="" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <input type="hidden" type="text" class="form-control"  id="id_huella_digital" name="id_huella_digital">
                                    <div class="mb-6">
                                        <h2>EMPRESA</h2>
                                        
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
                                                    @if($n->id_seccion_servicio != null)
                                                        <input class="form-check-input" checked type="checkbox" value='<?php echo ($n->id_nivel); ?>' id='<?php echo ('pre_'.$n->id_nivel); ?>' name='<?php echo ('pre_'.$n->id_nivel); ?>'>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            {{$n->pregunta}}
                                                        </label>
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
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
