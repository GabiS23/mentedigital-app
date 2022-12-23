<html>
    <head>
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin: 20px 20px;
                font-family: 'Roboto', sans-serif;
            }
            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                margin: 0cm 1cm 1cm 1cm;

            }

            /** Definir las reglas del encabezado **/
            /*  */
            .firma{
                text-align:center;
                color: #EB6225;
                padding-top: 90px;
            }
            .fecha{
                text-align:right;
            }
            .cabecera{
                text-align:center;
            }
            .cabecera h1{
                color: #FF6D01 !important;
            }
            .cabecera h4{
                color: #482359 !important;
            }
            .cabecera b{
                color: #f26727 !important;
            }
            /* table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 5px;
                text-align: center;
            } */

            table {
                border-collapse: collapse;
                width: 100%;
                }

                th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #DDD;
            }
            thead{
                background-color: #20124D;
                color: #fff;
            }
            .titulo_seccion{
                padding:10px;
                color: #fff;
                background-color: #FF6D01;
                text-align:center;
            }

        </style>
    </head>
        
    <body>
        <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
        <!-- <header>
            <br><br>
            <img src="visita/imagen_empresa/logos/logo2.png" height= 100>
        </header> -->
        <!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
        <main>
            
            <div class="cabecera">
                <img src="visita/imagen_empresa/logos/logo2.png" height= 100>
                <h1>PRO - FORMA</h1>
                <h4>SERVICIOS DE MARKETING DIGITAL</h4>
                <p> <b>Fecha:</b> <?php echo ($arrayParametros['lista_proformas'][0]->fecha_reg);?>
                    <br>
                    <b>Nombre:</b> <?php echo ($arrayParametros['lista_proformas'][0]->nombre_marca);?>
                    <br>
                    <b>Estado:</b>
                    <!-- $estado_seleccionado=='aprobado' -->
                    <?php if($arrayParametros['lista_proformas'][0]->estado =='aprobado'){  ?>
                        <option value="aprobado" selected>Aprobado</option>
                        
                    <?php  } else{?>
                        
                        <option value="propuesta" selected>Propuesta</option>
                    <?php  }?>
                </p> 
            </div>
                
            <div class="contenido">
                <table  class="table border=1">
                    <thead>
                        <tr> 
                            
                            <th scope="col">Servicio</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Cant</th>
                            <th scope="col">Precio Unit.</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- foreach -->
                        @foreach($arrayParametros['lista_servicios'] as $s)
                            <tr>
                                @if($s->codigo_nivel=='pla')
                                <td colspan="5" class="titulo_seccion">{{$s->nombre}}</td>
                                
                                @else
                                <td scope="col">{{$s->nombre}}</td>
                                <td scope="col">{{$s->descripcion}}</td>
                                <td scope="col">
                                    <?php echo ($arrayParametros['lista_proforma_detalle'][0]->cantidad_servicio);?>
                                    <!-- <input id="{{'pre_'.$s->id_seccion_servicio}}" name="{{'pre_'.$s->id_seccion_servicio}}" value="{{$s->precio}}"  type="text" class="form-control" id="inputGroupFile01"> -->
                                </td>
                                <td scope="col">
                                    <?php echo ($arrayParametros['lista_proforma_detalle'][0]->precio_unitario);?>
                                </td>
                                <td align="center">
                                    <div style="text-align:center;">
                                        <?php echo ($arrayParametros['lista_proforma_detalle'][0]->sub_total);?>
                                        
                                    </div>
                                </td>
                                @endif
                            </tr>
                        @endforeach
                        <!-- end foreach -->
                    </tbody>
                </table>
            </div>
            
            
        </main>
        
    </body>
</html>




