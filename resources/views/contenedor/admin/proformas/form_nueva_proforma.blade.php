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
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="row">
                                    <p id="demo"></p>
                                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                                        <div class="carrito">
                                            <div class="seccion-proforma">
                                                <h4>PLAN MENSUAL MEGA</h4>
                                            </div>
                                            <div class="tablewrapper table">
                                                <table  class="responsive table" width="98%" cellpadding="4" cellspacing="1" border="0">
                                                    <thead>
                                                        <tr> 
                                                            <th hidden="hide">Id producto</th>
                                                            <th scope="col">Nro</th>
                                                            <th scope="col">Código</th>
                                                            <th scope="col">Especialidad</th>
                                                            <th scope="col">Servicio</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Precio</th>
                                                            <th scope="col">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyid">
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">1</td>
                                                            <td>01-DG</td>
                                                            <td>Creación de contenido</td>
                                                            <td>Creación de contenidos gráficos</td>
                                                            <td>comercial, posicionamiento de marca, contenido de valor.</td>
                                                            <td>300 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">2</td>
                                                            <td>02-DG</td>
                                                            <td>Diseño gráfico</td>
                                                            <td>Diseño de 4 contenidos gráficos</td>
                                                            <td>Artes gráficas, album, carrusel.</td>
                                                            <td>400 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">3</td>
                                                            <td>03-DG</td>
                                                            <td>Social media marketing</td>
                                                            <td>Publicación de 4 contenidos gráficos</td>
                                                            <td>en Facebook e Instagram Ads, según escaleta de contenido - Servicio de community manager: permanente - Cambio de portada Facebook: Trimestralmente</td>
                                                            <td>400 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h4>Sub total</h4></td>
                                                            <td><h4>1100 Bs</h4></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h4>Total facturado</h4></td>
                                                            <td><h4>1276 Bs</h4></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div> 
                                <div class="row">
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div class="carrito">
                                            <div class="seccion-proforma">
                                                <h4>PUBLICIDAD PAGADA EN REDES SOCIALES</h4>
                                            </div>
                                            <div class="tablewrapper table">
                                                <table  class="responsive table" width="98%" cellpadding="4" cellspacing="1" border="0">
                                                    <thead>
                                                        <tr> 
                                                            <th hidden="hide">Id producto</th>
                                                            <th scope="col">Nro</th>
                                                            <th scope="col">Código</th>
                                                            <th scope="col">Publilcidad pagada en redes sociales</th>
                                                            <th scope="col">Alcance / descripción</th>
                                                            <th scope="col">Precio</th>
                                                            <th scope="col">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyid">
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">1</td>
                                                            <td>01-PP</td>
                                                            <td>Facebook Ads</td>
                                                            <td>Se estima un alcance de al menos 700 personas por 1 boliviano invertido, llegando a un alcance de hasta 1 millon de personas con este presupuesto</td>
                                                            <td>210 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">2</td>
                                                            <td>02-PP</td>
                                                            <td>Instagram Ads</td>
                                                            <td>Se estima un alcance de al menos 700 personas por 1 boliviano invertido, llegando a un alcance de hasta 1 millon de personas con este presupuesto</td>
                                                            <td>210 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h4> Comprobante mensual de ADS  - TOTAL</h4></td>
                                                            <td><h4>420 Bs</h4></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div class="carrito">
                                            <div class="seccion-proforma">
                                                <h4>SERVICIO ANUAL</h4>
                                            </div>
                                            <div class="tablewrapper table">
                                                <table  class="responsive table" width="98%" cellpadding="4" cellspacing="1" border="0">
                                                    <thead>
                                                        <tr> 
                                                            <th hidden="hide">Id producto</th>
                                                            <th scope="col">Nro</th>
                                                            <th scope="col">Código</th>
                                                            <th scope="col">Especialidad</th>
                                                            <th scope="col">Servicio</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Precio</th>
                                                            <th scope="col">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyid">
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">1</td>
                                                            <td>01-SA</td>
                                                            <td>Diseño gráfico</td>
                                                            <td>Manual de marca</td>
                                                            <td>Guia del imagen visual y linea grafica </td>
                                                            <td>350 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">2</td>
                                                            <td>02-SA</td>
                                                            <td>Producción fotográfica comercial</td>
                                                            <td>Fotografía publicitaria 12 fotos</td>
                                                            <td>Imágenes fotográficas que se enfocan en el producto dentro de un contexto publicitario con 
                                                            <td>420 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">3</td>
                                                            <td>03-SA</td>
                                                            <td>Producción audiovisual</td>
                                                            <td>Video marketing</td>
                                                            <td>Vídeos cortos corporativos, eventos empresariales y activaciones publicitarias para canales digitales.</td>
                                                            <td>300 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h4>Total</h4></td>
                                                            <td><h4>1070 Bs</h4></td>
                                                            <td></td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h4>Total facturado</h4></td>
                                                            <td><h4>1271 Bs</h4></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                                        <div class="carrito">
                                            <div class="seccion-proforma">
                                                <h4>YAPA SERVICIOS</h4>
                                            </div>
                                            <div class="tablewrapper table">
                                                <table  class="responsive table" width="98%" cellpadding="4" cellspacing="1" border="0">
                                                    <thead>
                                                        <tr> 
                                                            <th hidden="hide">Id producto</th>
                                                            <th scope="col">Nro</th>
                                                            <th scope="col">Código</th>
                                                            <th scope="col">Especialidad</th>
                                                            <th scope="col">Servicio</th>
                                                            <th scope="col">Descripción</th>
                                                            <th scope="col">Precio</th>
                                                            <th scope="col">Eliminar</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbodyid">
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">1</td>
                                                            <td>01-YP</td>
                                                            <td>Branding estratégico</td>
                                                            <td>Plano de branding</td>
                                                            <td>Guía estructural, el ADN de la marca, que  determina el valor simbólico, identidad y personalidad de la marca, mediante la brújula de publicidad persuasiva. </td>
                                                            <td>300 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">1</td>
                                                            <td>02-YP</td>
                                                            <td>Whatsapp</td>
                                                            <td>Optimización de whatsapp business</td>
                                                            <td>Configuración del catálogo y respuestas automatizadas de WhatsApp Business</td>
                                                            <td>100 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row">1</td>
                                                            <td>03-YP</td>
                                                            <td>Google</td>
                                                            <td>Optimización de Google My Business</td>
                                                            <td>Gestión de datos visibles en Google cuando los usuarios buscan una empresa, producto o servicio; incluye fotografía, datos y ubicación. </td>
                                                            <td>150 Bs</td>
                                                            <td>x</td>
                                                        </tr>
                                                        <tr>
                                                            <td hidden="hide"></td>
                                                            <td scope="row"></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><h4>Servicio gratuito total</h4></td>
                                                            <td><h4>550 Bs</h4></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="datos_cliente">
                                        <div class="crud">
                                            <h4>Datos del cliente</h4>
                                            <form>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Marca</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Descripción / rubro</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">CI</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Nombre completo</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Celular</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                                </div>
                                                
                                                <!-- <div class="mb-3 form-check">
                                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                    <label class="form-check-label" for="exampleCheck1">Enviado</label>
                                                </div> -->
                                                <a type="submit" class="btn btn-primary" style="width: 100%;background-color:#482359;color:#fff !important;">Guardar</a>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="total">
                            <p>Sub Total: 3140 Bs</p>
                            <p>Total descuento: 550 Bs</p>
                            <p>Total: 2590 Bs</p>
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