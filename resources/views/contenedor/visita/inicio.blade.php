@extends('principal.visita.layout_visita')

@section('content')
<br><br>
<section class="section fondo_componente" style="padding:0;
  margin:0;
  background-image: url(./visita/imagen_empresa/fondos/fondo-min.jpg);
  background-repeat: no-repeat;
  width:100%;">
    <div class="container">
    <!-- <img loading="lazy" src="./visita/imagen_empresa/equipo/1Fgrupal.jpg" class="imagen-servicios-inicio" alt="mente digital" style="imagen-servicios-inicio"> -->
    <br><br>
        <div class="row" style="padding:0;margin:0;">
            <div class="col-sm-12 col-md-7 col-lg-7"style="padding:0;margin:0;">
                <div class="izquierda animate__animated animate__slideInLeft">
                    <div class="contenido-iz" style="text-align:left;">
                        <br><br>
                        <p>¿List@ para potenciar tu marca?</p>
                        <br>
                        <h1>AGENCIA DE MARKETING DIGITAL 
                        Y CREACIÓN DE CONTENIDO 
                        PARA REDES SOCIALES
                        </h1>
                        <br>
                        <a href="https://drive.google.com/file/d/1Nzqp6c_DTmaUB29I4pTFuOupt1IYW8yT/view" target="_blank"><button type="button" class="btn btn-default boton_personalizado" style="imagen-servicios-inicio" >&nbsp;&nbsp;Ver catálogo de precios&nbsp;&nbsp;</button></a>

                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5"style="padding:0;margin:0;">
                <div class="derecha animate__animated animate__fadeInRight">
                    <div class="contenido-dr"style="text-align:left;">
                    <br><br>
                        <img loading="lazy" class="img-principal" src="./visita/imagen_empresa/fondos/mentedigital.png" alt="mente digital" height 50 style="height:280px;widht:800px;">
                    <br><br><br>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</section>

<section class="section3 animate__animated animate__fadeInUp">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <br>
                <h2><b style="color:#EB5D1C;">NUESTROS</b> SERVICIOS</h2>
                <p style="color:#000">Destácate de la competencia y escala al éxito de tu negocio o marca personal</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/uno-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br><br>
                        <h3 style="color:#fff !important;">Branding estratégico</h3>
                        <br>
                        <a href="{{route('brandingEstrategico_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/dos-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br><br>
                        <h3 style="color:#fff !important;">Producción gráfica para redes sociales</h3>
                        <br>
                        <a href="{{route('grafico_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/tres-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br><br>
                        <h3 style="color:#fff !important;">Social media marketing</h3>
                        <br>
                        <a href="{{route('socialMedia_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/cuatro-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br><br>
                        <h3 style="color:#fff !important;">Tik tok publicitario</h3>
                        <br>
                        <a href="{{route('tiktok_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/cinco-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br><br>
                        <h3 style="color:#fff !important;">Producción fotográfica comercial</h3>
                        <br>
                        <a href="{{route('fotografia_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/seis-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br><br>
                        <h3 style="color:#fff !important;">Producción audiovisual para redes sociales</h3>
                        <br>
                        <a href="{{route('audiovisual_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/siete-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br><br>
                        <h3 style="color:#fff !important;">Diseño y desarrollo de páginas web</h3>
                        <br>
                        <a href="{{route('web_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="section3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h2><b style="color:#EB5D1C;">NUESTROS</b> CLIENTES</h2>
                    <p style="color:#000">Marcas que confían en los servicios de nuestra agencia</p>
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="contenedor">
                        <img loading="lazy" src="./visita/imagen_empresa/servicios/uno-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                        <div class="centrado">
                            <br><br>
                            <h3 style="color:#fff !important;">Branding estratégico</h3>
                            <br>
                            <a href="{{route('brandingEstrategico_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="contenedor">
                        <img loading="lazy" src="./visita/imagen_empresa/servicios/uno-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                        <div class="centrado">
                            <br><br>
                            <h3 style="color:#fff !important;">Branding estratégico</h3>
                            <br>
                            <a href="{{route('brandingEstrategico_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="contenedor">
                        <img loading="lazy" src="./visita/imagen_empresa/servicios/uno-min.jpg" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                        <div class="centrado">
                            <br><br>
                            <h3 style="color:#fff !important;">Branding estratégico</h3>
                            <br>
                            <div class="inline">
                                <a href="https://www.facebook.com/mentedigitalboliviaa/"class="icono-socia"><i class="fab fa-facebook-f icono-social"></i></a>
                                <a href="https://www.instagram.com/mentedigitalbolivia/?hl=es" target="_blank" class="icono-socia"><i class="fab fa-instagram icono-social "></i></a>
                                <a href="https://www.tiktok.com/@mentedigitalbolivia/video/7010384718390676742?is_copy_url=1&is_from_webapp=v1" target="_blank" class="icono-socia"><i class="fab fa-tiktok icono-social "></i></a>
                                <!-- <a href="https://api.whatsapp.com/send?phone=+59176985007" target="_blank" class=""><i class="fab fa-facebook-f"></i></a> -->
                                <a href="https://www.instagram.com/mentedigitalbolivia/?hl=es" target="_blank" class="icono-socia"><i class="fab fa-whatsapp icono-social"></i></a>
                            </div>
                            <a href="{{route('brandingEstrategico_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop