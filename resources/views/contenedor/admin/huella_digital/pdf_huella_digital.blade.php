<html>
    <head>
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin: 0cm 0cm;
                margin-bottom: 0px;
                padding:200px;
            }

            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                margin-top: 3cm;
                margin-left: 2cm;
                margin-right: 2cm;
                /* margin-bottom: 50px; */
            }

            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                top: 0cm;
                left: 0cm;
                right: 0.5cm;
                
                /* margin-top: 50px; */
                /* height: 3cm; */
            }

            /** Definir las reglas del pie de página **/
            footer {
                position: fixed; 
                bottom: 0cm; 
                left: 0cm; 
                right: 0cm;
                height: 3cm;
            }
            .firma{
                text-align:center;
                color: #EB6225;
                padding-top: 35px;
            }
        </style>
    </head>

    <body>
        <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
        <header style="text-align:center;">
            <img src="visita/imagen_empresa/huella-digital/cabecera.png" height=150/>
        </header>
        <br><br>
        <!-- <footer style="text-align:center;">
            <img src="visita/imagen_empresa/huella-digital/pie.png" height=150 width=100% />
        </footer> -->
       
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
                <p>
                En base a este diagnóstico y los 44 servicios en publicidad digital que ofrecemos mediante nuestras 10 especialidades, le sugerimos los siguientes servicios:
                <br>
                    <ul>
                        <li>BRANDING ESTRATÉGICO.</li>
                        <li>CREACIÓN DE CONTENIDO DIGITAL.</li>
                        <li>DISEÑO GRÁFICO.</li>
                        <li>SOCIAL MEDIA MARKETING - SEM (mejorar la visibilidad de su marca en los buscadores a través de acciones de marketing pagadas).</li>
                        <li>TIK TOK PUBLICITARIO.</li>
                        <li>FOTOGRAFÍA COMERCIAL.</li>
                        <li>PRODUCCIÓN AUDIOVISUAL.</li>
                        <li>EDICIÓN DIGITAL.</li>
                        <li>RELACIONES PÚBLICAS DIGITALES.</li>
                    </ul> 
                <br>
                Le invitamos a agendar una reunión para brindarle nuestro asesoramiento 360 en
                publicidad digital, lo cual nos permitirá realizar una oferta específica y adecuada a sus
                requerimientos comerciales y económicos. Este asesoramiento no implica ningún tipo de
                costo ni compromiso comercial de nuestra agencia y se podrá realizar en su empresa
                cuando ustedes lo requieran. Esperando una respuesta positiva, nos despedimos
                deseándoles éxitos en sus metas empresariales.
                <br>
                Saludos Cordiales,
                
                <div class="firma">
                    Área de Marketing Mente Digital
                </div>
                
                </p>
            </div>  
            
            
        </main>
        
    </body>
</html>




