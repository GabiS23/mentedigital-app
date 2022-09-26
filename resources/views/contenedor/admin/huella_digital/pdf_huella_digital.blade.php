<html>
    <head>
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin: 0cm 0cm;
            }

            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 2cm;
                margin-bottom: 2cm;
            }

            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0cm;
                /* height: 3cm; */
            }

            /** Definir las reglas del pie de página **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                /* height: 0cm; */
            }
        </style>
    </head>

    <body>
        <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
        <header style="text-align:center;">
            <img src="visita/imagen_empresa/huella-digital/cabecera.png" height=150/>
        </header>

        <footer style="text-align:center;">
            <img src="visita/imagen_empresa/huella-digital/pie.png" height=150 width=100% />
        </footer>
        <br>
        <!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
        <main style="margin-right: 50px; margin-left: 50px;">
            <div class="fecha" style="text-align: right;">
                <p><?php echo ($arrayParametros['huella_digital'][0]->fecha_registro);?></p> 
            </div>
            <div class="mb-6">
                <p>Estimado(s) <?php echo ($arrayParametros['lista_empresa'][0]->nombre_marca); ?></p>
                <p style="color: #000;">La huella digital de su marca es el rastro de sus publicaciones y las interacciones de sus seguidores en sus redes sociales.</p>
                <p style="color: #000;">El nivel actual de eficacia de <b style="color: #EB5D1C;"><?php echo ($arrayParametros['lista_empresa'][0]->nombre_marca); ?></b>  en sus redes sociales es: <b style="color: #EB5D1C;"><?php echo ($arrayParametros['huella_digital'][0]->respuesta_porcentaje); ?>%</b> de 100%</p> 
                <p>Para que su marca tenga una efectiva presencia en redes sociales y consolide su comunidad de seguidores se recomienda:</p>
                <div class="propuesta" style="margin-left: 20px;">
                    @foreach($arrayParametros['lista_cuestionario'] as $p)
                        @if($p->titulo=='si')
                            <p style="color:#EB5D1C;"><b>{{$p->pregunta}}</b></p>
                        @else
                        <div class="form-check" style="margin-left: 20px;">
                            @if($p->id_seccion_servicio != null)
                                <!-- <input class="form-check-input" checked type="checkbox" value='<?php echo ($p->id_nivel); ?>' id='<?php echo ('pre_'.$p->id_nivel); ?>' name='<?php echo ('pre_'.$p->id_nivel); ?>'> -->
                                <li><label class="form-check-label" for="flexCheckDefault">
                                    {{$p->pregunta}}
                                </label></li>
                            @endif
                        </div>
                        @endif
                    @endforeach
                </div>
            </div>  
            
            
        </main>
    </body>
</html>




