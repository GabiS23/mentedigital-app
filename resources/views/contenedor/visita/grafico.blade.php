@extends('principal.visita.layout_visita')

@section('content')
<br><br>
<section class="section fondo_componente" style="padding:0;
  margin:0;
  background-image: url(./visita/imagen_empresa/fondos/fondo-min.jpg);
  background-color:#482359;
  width:100%;">
    <div class="container">
    <!-- <img loading="lazy" src="./visita/imagen_empresa/equipo/1Fgrupal.jpg" class=" card-img-top" alt="mente digital" style=""> -->
    <br><br>
        <div class="row" style="padding:0;margin:0;">
            <div class="col-sm-12 col-md-7 col-lg-7"style="padding:0;margin:0;">
                <div class="izquierda">
                    <div class="contenido-iz" style="text-align:left;">
                        <br><br><br>
                        <h2 style="color:#fff !important;">PRODUCCIÓN GRÁFICA PARA REDES SOCIALES</h2>
                        <br>
                        <p><b>"El diseño es el embajador silencioso de tu marca"</b><br>
                        <br>
                        Paul Brand</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5"style="padding:0;margin:0;">
                <div class="derecha">
                    <div class="contenido-dr"style="text-align:left;">
                    <br><br>
                        <img loading="lazy" class="img-principal" src="./visita/imagen_empresa/services/sdiseno-min.jpg" alt="mente digital">
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</section>
<section class="servicio-contenido">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="titulo-seccion">¿QUÉ ES EL DISEÑO GRÁFICO Y POR QUÉ ES IMPORTANTE?</h3>
                <p class="titulo-seccion">Aquí te lo explicamos</p>
               <br>
            </div>
            
            <!--gabriela seccion servicio contenido-->
            <div class="container-servicio-descripcion">
                <div class="cuadrado item-servicio">
                    <div class="item-text-servicio">
                        <h3>QUÉ ES</h3>
                        <p>
                        Proceso de creación y diseño de artes gráficas que utiliza la composición visual con la tipografía, imágenes, color, forma y texto, para comunicar el deseo del consumidor. Los recursos gráficos como post, álbum o carrusel son una vía de comunicación gráfica efectiva, al momento de ser implementada en medios y soportes digitales.
                        </p>
                    </div>
                </div>
                <div class="cuadrado item-servicio">
                    <div class="item-text-servicio">
                        <h3>POR QUÉ USARLO</h3>
                        <p>
                        Es vital para comunicar los mensajes y valores de tu marca de una forma persuasiva, y es mediante tu imagen visual: colores, tipografía, logotipo que impactan en la mente del consumidor,  generando un vínculo  sentimental y de confianza.
                        </p>
                    </div>
                </div>
            </div>
            <!--fin seccion-->
        </div>
    </div>
    <br><br>
</section>
<section class="container " id="services">
        <div class="titulo-seccion">
            <br>
            <h2 class="titulo-seccion">SI REQUIERES ESTE SERVICIO</h2>
            <p style="color: #482359;">Estos son los pasos que seguimos</p>
            <br>
        </div>
      <div class="row">
            <!--gabriela seccion servicio contenido-->
            <div class="container-servicio-descripcion">
                <div class="mision item-servicio">
                    <div class="item-text-servicio">
                        <div class="service-item">
                            <div class="service-icon"><i class="fa fa-stethoscope"></i></div>
                            
                            <h4 class="service-title"><a href="" ><b>Paso 1</b></a></h4>
                            <p class="service-description">
                            Creamos la escaleta de contenido: modelo de las artes gráficas, que expresan contenido comercial, posicionamiento de marca o contenido de valor
                            </p>
                        </div>
                        <div class="service-item">
                            <div class="service-icon"><i class="fa fa-book" style="padding-left:3px;padding-right:3px"></i></div>
                            <h4 class="service-title"><a href=""><b>Paso 2</b></a></h4>
                            <p class="service-description">
                            Diseñamos el contenido de las artes gráficas, mediante diferentes recursos gráficos como: post, carrusel o álbum y en base de  la escaleta de contenido
                            </p>
                        </div>
                    </div>
                </div>
                <div class="mision item-servicio">
                    <div class="item-text-servicio">
                        <div class="formulario-contacto">
                            <!-- <br>
                            <h2><b style="color:#EB5D1C;">CONTACTO</B></h2> -->
                            <p style="color:#000">Nos encantaría escucharte y saber lo que necesitas</p>
                            <br>
                            <img loading="lazy" src="./visita/imagen_empresa/logos/perfilFace.png" class="" alt="logo mente digital">
                            <br><br>
                            <div class="form-contenido thumbnail">
                                <form action="mailto:mentedigitalbolivia@gmail.com" method="post" enctype="text/plain">
                                    <p style="color:#000;">PRODUCCIÓN GRÁFICA PARA REDES SOCIALES</p>
                                    <a href="https://wa.link/zivtz4" target="_blank" type="submit" value="Solicitar servicio"  class="boton-servicio">Solicitar servicio</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin seccion-->
      </div>
    </div>
</section>

@stop