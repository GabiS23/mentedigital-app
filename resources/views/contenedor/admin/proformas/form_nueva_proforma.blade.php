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
<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <form method="GET" id="form" name="form" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="contenido">
                        <div class="crud">
                            <h4>Nueva proforma</h4>
                            <a id="atras" href="{{route('proforma')}}" data-toggle="tooltip" data-placement="top" title="Atras"><i class="fa fa-solid fa-arrow-left"></i></a>

                        </div>
                        <div class="">
                            <form>
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
                                    <!-- <div class="col-md-4">
                                        <label for="exampleInputEmail1" class="form-label" >Periodo</label>
                                        <select id="id_empresa" name="id_empresa" class="form-control">
                                            <option value="0">Elegir</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                    </div> -->
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Fecha</label>
                                        <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                   
                                    <div class="col-md-4">
                                        <label for="exampleInputEmail1" class="form-label" >Estado</label>
                                        <select id="id_empresa" name="id_empresa" class="form-control">
                                            <option value="0">Elegir</option>
                                            <option value="1">Aprobado</option>
                                            <option value="2">Propuesta</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <br>
                            </form>
                        </div>
                    </div>
                </form>
            </div> 
        </div>  
    </div>
</div>

<div class="orders">
    <div class="row">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <div class="card">
                <form method="GET" id="form" name="form" action="#" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="contenido">
                        <div class="crud">
                            <h4>Nueva proforma</h4>
                            <a id="atras" href="{{route('proforma')}}" data-toggle="tooltip" data-placement="top" title="Atras"><i class="fa fa-solid fa-arrow-left"></i></a>

                        </div>
                       
                    </div>
                </form>
            </div> 
        </div>  
    </div>
</div>
@stop

<script type="text/javascript">
    
    
    
   
</script>