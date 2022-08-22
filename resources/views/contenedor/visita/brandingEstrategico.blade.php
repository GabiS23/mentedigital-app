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
                        <br><br>
                        <h2 style="color:#fff !important;">BRANDING ESTRATÉGICO</h2>
                        <br>
                        <p><b>"Quien piense que el precio barato es lo más importante para vender, no conoce el valor simbólico de las cosas"</b><br>
                        <br>
                        Jurgen Klaric</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5"style="padding:0;margin:0;">
                <div class="derecha">
                    <div class="contenido-dr"style="text-align:left;">
                        <br><br>
                        <img loading="lazy" class="img-principal" src="./visita/imagen_empresa/serviciosPrincipal2/branding.jpg" alt="mente digital">
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
                <h2 class="titulo-seccion">¿QUÉ ES BRANDING Y POR QUÉ USARLO?</h2>
                <p class="titulo-seccion">Aquí te lo explicamos</p>
               <br>
            </div>
            <!--gabriela seccion servicio contenido-->
            <div class="container-servicio-descripcion">
                <div class="cuadrado item-servicio">
                    <div class="item-text-servicio">
                        <h3>QUÉ ES</h3>
                        <p>
                        Proceso de creación, diseño y la construcción de tu marca, para que el consumidor perciba, piense, sienta y diga el valor simbólico de tu marca.
                        </p>
                    </div>
                </div>
                <div class="cuadrado item-servicio">
                    <div class="item-text-servicio">
                        <h3>POR QUÉ USARLO</h3>
                        <p>
                        Para generar una comunicación confiable y coherente en redes sociales que refleje el valor simbólico, la promesa de valor y ventaja competitiva de tu marca, proporcionando una experiencia satisfactoria y significativa a tu cliente. 
                        </p>
                    </div>
                </div>
            </div>
            <!--fin seccion-->
        </div>
    </div>
    <br><br>
</section>
<section class="container servicio-contenido" id="services">
    <div class="row">
        <div class="col-md-12">
            <div class="titulo-seccion">
            <br>
            <h2 class="titulo-seccion">SI REQUIERES ESTE SERVICIO</h2>
            <p style="color: #482359;">Estos son los pasos que seguimos</p>
            <br>
            </div>
        </div>
    </div>
      <div class="row ">
            <!--gabriela seccion extra inicio-->
            <div class="container-servicio-descripcion">
                <div class="mision item-servicio">
                    <div class="service-item">
                        <div class="service-icon"><i class="fa fa-stethoscope"></i></div>
                        
                        <h4 class="service-title"><a href="" ><b>Paso 1</b></a></h4>
                        <p class="service-description">Diagnóstico de tu marca</p>
                    </div>
                    <div class="service-item">
                        <div class="service-icon"><i class="fa fa-book" style="padding-left:3px;padding-right:3px"></i></div>
                        <h4 class="service-title"><a href=""><b>Paso 2</b></a></h4>
                        <p class="service-description">Estructuramos tu plan de branding:  guía  de la personalidad de marca, - ADN de la marca</p>
                    </div>
                    <div class="service-item">
                        <div class="service-icon"><i class="fa fa-marker"></i></div>
                        <h4 class="service-title"><a href=""><b>Paso 3</b></a></h4>
                        <p class="service-description">Diseñamos tu manual de marca: guía de la identidad visual y línea gráfica de la marca.</p>
                    </div>
                </div>
                <div class="mision item-servicio">
                    <div class="formulario-contacto">
                        <!-- <br>
                        <h2><b style="color:#EB5D1C;">CONTACTO</B></h2> -->
                        <p style="color:#000">Nos encantaría escucharte y saber lo que necesitas</p>
                        <br>
                        <img loading="lazy" src="./visita/imagen_empresa/logos/perfilFace.png" class="" alt="logo mente digital">
                        <br><br>
                        <div class="form-contenido thumbnail">
                            <form action="" method="post" enctype="text/plain">
                                <p style="color:#000;">BRANDING ESTRATÉGICO</p>
                                <a href="https://wa.link/ks4a5y" target="_blank" type="submit" value="Solicitar servicio"  class="boton-servicio" style="">Solicitar servicio</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin seccion-->
      </div>
    </div>
</section>
@stop