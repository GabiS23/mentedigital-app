@extends('principal.visita.layout_visita')

@section('content')
<br><br>
<style>
  
    .img-cliente{
        border-radius: 55%;
        height: 200px;
        padding-top: 8%;
        box-shadow: rgb(0 0 0 / 35%) 0px 5px 15px;
        width: 100%;
        margin: 10px;
    }
    .img-cliente img{
        width: 80%;
        margin:5px;
        padding:5px;
    }
    .btn-cliente:hover{
        color: #fff !important;
        background-color: #EB5D1C !important;
    }
    .contenedor2 img{
        height: 70px;
        
    }
    .contenedor2 {
        box-shadow: 0px 1px 10px rgba(0,0,0,0.3);
    }
</style>

<section class="section fondo_componente" style="padding:0;
  margin:0;
  background-image: url(./visita/imagen_empresa/fondos/fondoprincipal.png);
  background-repeat: no-repeat;
  width:100%;">
    <div class="container">
        <!-- background-image: url(./visita/imagen_empresa/fondos/fondo-min.png);
  background-repeat: no-repeat;  <img loading="lazy" src="./visita/imagen_empresa/equipo/1Fgrupal.jpg" class="imagen-servicios-inicio" alt="mente digital" style="imagen-servicios-inicio"> -->
        <br><br>
        <div class="row" style="padding:0;margin:0;">
            <div class="col-sm-12 col-md-7 col-lg-7"style="padding:0;margin:0;">
                <div class="izquierda animate__animated animate__slideInLeft">
                    <div class="contenido-iz" style="text-align:left;">
                        <br><br>
                        <p>¿List@ para potenciar tu marca?</p>
                        <br>
                        <h1>AGENCIA DE MARKETING 
                            <br>
                        E INGENIERÍA DE NEGOCIOS
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
                <p style="color:#000">Destácate de la competencia y escala al éxito de tu negocio</p>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/1Branding.png" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br>
                        <!-- <h3 style="color:#fff !important;"></h3>
                        <br> -->
                        <a href="{{route('brandingEstrategico_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/2Diseno.png" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br>
                        <!-- <h3 style="color:#fff !important;"></h3>
                        <br> -->
                        <a href="{{route('grafico_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/3Social.png" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br>
                        <!-- <h3 style="color:#fff !important;">Social media marketing</h3>
                        <br> -->
                        <a href="{{route('socialMedia_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/4TikTok.png" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br>
                        <!-- <h3 style="color:#fff !important;">Tik tok publicitario</h3>
                        <br> -->
                        <a href="{{route('tiktok_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/5Fotografia.png" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br>
                        <!-- <h3 style="color:#fff !important;">Producción fotográfica comercial</h3>
                        <br> -->
                        <a href="{{route('fotografia_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio" style="imagen-servicios-inicio">Ver más</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/6Produccion.png" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br>
                        <!-- <h3 style="color:#fff !important;">Producción audiovisual para redes sociales</h3>
                        <br> -->
                        <a href="{{route('audiovisual_index')}}" type="submit" value="Ver más"  class="imgzoom boton-servicio">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            
            <div class="col-sm-12 col-md-4 col-lg-4">
                <div class="contenedor">
                    <img loading="lazy" src="./visita/imagen_empresa/servicios/7Programacion.png" height=310 class="imagen-servicios-inicio" alt="creacion-de-marca-cochabamba">
                    <div class="centrado">
                        <br>
                        <!-- <h3 style="color:#fff !important;">Edición digital</h3>
                        <br> -->
                        <a href="{{route('web_index')}}" type="submit" value="Ver más" class="imgzoom boton-servicio">Ver más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <br><br><br>
    <div class="section3" style="background-color: #482359;">
        <div class="container">
            <div class="row" style="padding:0;margin:0;">
                <div class="col-sm-12 col-md-7 col-lg-7"style="padding:0;margin:0;">
                    <div class="izquierda animate__animated animate__slideInLeft">
                        <div class="contenido-iz" style="text-align:left;">
                            
                        
                            <h2 style="color:#fff !important;">Solicita tu primera asesoría gratuita</h2>
                            
                            <p>Los mejores tips para escalar al éxito de tu marca</p>
                            
                            <a href="https://www.instagram.com/mentedigitalbolivia/?hl=es" target="_blank"><button type="button" class="btn btn-default boton_personalizado" style="imagen-servicios-inicio" >&nbsp;&nbsp;Whatsapp&nbsp;&nbsp;</button></a>

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-5 col-lg-5"style="padding:0;margin:0;">
                    <div class="derecha animate__animated animate__fadeInRight">
                        <div class="contenido-dr"style="text-align:left;">
                        <br><br>
                            <img loading="lazy" class="img-principal" src="./visita/imagen_empresa/otros/asistente.png" alt="mente digital" height 50 style="height:280px;widht:800px;">
                        <br><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <br><br><br>
    <div class="section3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <br>
                    <h2><b style="color:#EB5D1C;">NUESTROS </b>CLIENTES</h2>
                    
                    <br>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/opticity3.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/ankora.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente" style="background-color: #000;">
                        <img src="./visita/imagen_empresa/clientes/caliza.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/opticity2.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/opticity2.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/opticity2.png" height="150" alt="">
                    </div>
                </div>
                <br>
            </div>
            <br>
            <!-- <div class="row">
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/opticity3.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/ankora.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente" style="background-color: #000;">
                        <img src="./visita/imagen_empresa/clientes/caliza.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/opticity2.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente" style="background-color: #000;">
                        <img src="./visita/imagen_empresa/clientes/caliza.png" height="150" alt="">
                    </div>
                </div>
                <div class="col-md-2 col-lg-2">
                    <div class="img-cliente">
                        <img src="./visita/imagen_empresa/clientes/opticity2.png" height="150" alt="">
                    </div>
                </div>
            </div> -->
           <br><br><br>
        </div>
    </div>
</section>
@stop