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
            <div class="col-sm-12 col-md-7 col-lg-7" style="padding:0;margin:0;">
                <div class="izquierda">
                    <div class="contenido-iz" style="text-align:left;">
                        <br><br><br>
                        <h2 style="color:#fff !important;">SOCIAL MEDIA MERKETING</h2>
                        <br><br>
                        <p><b>"El contenido es fuego... y el Social Media es la gasolina"</b><br>
                        <br>
                        Max Fackeldey</p>
                        
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5"style="padding:0;margin:0;">
                <div class="derecha">
                    <div class="contenido-dr"style="text-align:left;">
                    <br><br>
                        <img loading="lazy" class="img-principal" src="./visita/imagen_empresa/serviciosPrincipal2/socialmedia.jpg" alt="mente digital">
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
                <h2 class="titulo-seccion">¿QUÉ ES EL SOCIAL MEDIA MARKETING Y POR QUÉ DEBERIAS USARLO?</h2>
                <p class="titulo-seccion">Aquí te lo explicamos</p>
               <br>
            </div>
            <!--gabriela seccion servicio contenido-->
            <div class="container-servicio-descripcion">
                <div class="cuadrado item-servicio">
                    <div class="item-text-servicio">
                        <h3>QUÉ ES</h3>
                        <p>
                        Estrategias comunicacionales persuasivas para una audiencia digital, mediante herramientas y plataformas virtuales, con el fin de dar exposición a la marca y ejecutar distintos procesos de compra.
                        </p>
                    </div>
                </div>
                <div class="cuadrado item-servicio">
                    <div class="item-text-servicio">
                        <h3>POR QUÉ USARLO</h3>
                        <p>
                        Para promover de forma digital tu producto para generar ventas y para fomentar la participación de tu audiencia para establecer una comunidad fidelizada y sólida.
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
        <h2>SI REQUIERES ESTE SERVICIO</h2>
        <p style="color: #482359;">Estos son los pasos que seguimos</p>
        <br>
    </div>
    <div class="row ">
        <!--gabriela seccion servicio contenido-->
        <div class="container-servicio-descripcion">
            <div class="mision item-servicio">
                <div class="item-text-servicio">
                    
                    <div class="service-item">
                        <div class="service-icon"><i class="fab fa-sketch"></i></div>
                        <h4 class="service-title"><a href=""><b>Paso 1</b></a></h4>
                        <p class="service-description">
                        Creamos el plan de posteo: modelo de las publicaciones con diseño gráfico, copy y estrategia de anuncios pagados
                        </p>
                    </div>
                    <div class="service-item">
                        <div class="service-icon"><i class="fa fa-briefcase"></i></div>
                        <h4 class="service-title"><a href=""><b>Paso 2</b></a></h4>
                        <p class="service-description">
                            Publicamos las artes gráficas en redes sociales, según  el plan de posteo
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
                        <br>
                        <div class="form-contenido thumbnail">
                            <form action="mailto:mentedigitalbolivia@gmail.com" method="post" enctype="text/plain">
                                <p style="color:#000;">SOCIAL MEDIA MARKETING</p>
                                <a href="https://wa.link/qt0ced" target="_blank" type="submit" value="Solicitar servicio"  class="boton-servicio" style="">Solicitar servicio</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--fin seccion-->
    </div>
</section>

<br>
@stop