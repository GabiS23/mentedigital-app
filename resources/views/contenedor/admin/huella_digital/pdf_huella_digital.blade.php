<html>
    <head>
        <style>
            /** 
                Establezca los márgenes de la página en 0, por lo que el pie de página y el encabezado
                puede ser de altura y anchura completas.
             **/
            @page {
                margin: 170px 50px;
            }
            /** Defina ahora los márgenes reales de cada página en el PDF **/
            body {
                margin: 0cm 1cm 1cm 1cm;

            }

            /** Definir las reglas del encabezado **/
            header {
                position: fixed;
                left: 0px;
                top: -160px;
                right: 0px;
                height: 100px;
                /* background-color: #ddd; */
                text-align: center;
            } 

            /** Definir las reglas del pie de página **/
            footer {
                position: fixed;
                left: 0px;
                bottom: -110px;
                right: 0px;
                height: 40px;
                /* border-bottom: 2px solid #ddd; */
            }
            .firma{
                text-align:center;
                color: #EB6225;
                padding-top: 90px;
            }
            .fecha{
                text-align:right;
            }
        </style>
    </head>
        
    <body>
        <!-- Defina bloques de encabezado y pie de página antes de su contenido -->
        <header>
            <img src="visita/imagen_empresa/huella-digital/cabecera.png" width=700>
        </header>
        <footer>
            <img src="visita/imagen_empresa/huella-digital/pie.png" width=700>
        </footer>
        
        
       
        <!-- Envuelva el contenido de su PDF dentro de una etiqueta principal -->
        <main>
            
            <div class="fecha">
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
                <br><br>
                Saludos Cordiales,
                
                <div class="firma">
                    Área de Marketing Mente Digital
                </div>
                
                </p>
            </div>  
            
            
        </main>
        
    </body>
</html>




