<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Mente digital Bolivia">
  <meta name="keywords"
    content="Marketing digital en bolivia, marketing digital, marketing digital en cochabamba, agencia de marketing digital en cochabamba, agencia de marketing en cochabamab">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="robots" content="noindex, nofollow">
  <link rel="canonical" href="http://mentedigital.com">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <!-- <link rel="icon" href="{{asset('visita/imagen_empresa/iconos/logoico.ico')}}"> -->
    <title>Mente digital Bolivia</title>
    <!-- <link rel="shortcut icon" href="favicon1.ico" /> -->
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap inicio -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->
    <link href="{{asset('visita/css/admin.css')}}" rel="stylesheet">
    <link href="{{asset('visita/css/tabla.css')}}" rel="stylesheet">

    <!-- Tree -->
    <link href="{{asset('visita/dist/themes/default/style.min.css')}}" rel="stylesheet">
    <link href="{{asset('visita/dist/themes/default/style.css')}}" rel="stylesheet">
	<!-- sidebar -->

    <!-- links footer, adata ble -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/jqvmap@1.5.1/dist/jqvmap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/weathericons@2.1.0/css/weather-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" rel="stylesheet" />








    <!-- sweeft -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
          <ul class="nav navbar-nav">
                
              <li class="">
                <br>
                  <a href="{{route('inicioAdmin') }}"><i class="menu-icon fa fa-house-chimney"></i>Inicio</a>
              </li>
              <li class="menu-title">Administraci??n</li>
              <!-- /.menu-title -->
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-lock"></i>Seguridad</a>
                  <ul class="sub-menu children dropdown-menu"><li><i class="fa fa-suitcase"></i><a href="{{ route('roles') }}">Roles</a></li>
                      <li><i class="fa fa-users"></i><a href="{{ route('usuarios') }}">Usuarios</a></li>
                  </ul>
              </li>
              
              <!-- <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Par??metros</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="fa fa-table"></i><a href="{{ route('gestion') }}">Gesti??n</a></li>
                      <li><i class="fa fa-bullseye"></i><a href="#">??rea</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Nivel de estudios</a></li>
                      <li><i class="fa fa-file"></i><a href="#">Profesi??n</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Cargo</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Tipo de acuerdo</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Universidades</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Feriados</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Tipo de permisos</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Horario laboral</a></li>
                  </ul>
              </li> -->
              <!-- <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Talento humano</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="#">Pasantes</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Externas</a></li>
                        <li><i class="fa fa-bullseye"></i><a href="#">Estructurales</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Aut??nomas</a></li>
                        <li><i class="fa fa-file"></i><a href="#">Voluntarias</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Asistencia</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Registro de horas</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Permisos</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Teletrabajo</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Sueldos</a></li>
                    </ul>
              </li> -->
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Ventas</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="fa fa-bullseye"></i><a href="{{ route('servicio') }}">Servicios</a></li>
                      <li><i class="fa fa-bullseye"></i><a href="{{ route('marca') }}">Marcas</a></li>
                      <!-- <li><i class="fa fa-bullseye"></i><a href="{{ route('clientes') }}">Clientes</a></li> -->
                      <li><i class="fa fa-table"></i><a href="{{ route('huella_digital') }}">Huella Digital</a></li>
                      <li><i class="fa fa-file"></i><a href="{{ route('proforma') }}">Proformas</a></li>
                      <!-- <li><i class="fa fa-table"></i><a href="#">Ventas</a></li> -->
                  </ul>
              </li> 

              
          </ul>
      </div><!-- /.navbar-collapse -->
  </nav>
</aside>
<!-- /#left-panel -->
<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('inicioAdmin') }}"><img src="{{asset('visita/imagen_empresa/logos/logo.jpg')}}" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="{{asset('visita/imagen_empresa/logos/perfilFace.png')}}" alt="Logo"></a>
                <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <!-- <div class="header-left">
                    
                </div> -->
                <div class="user-area dropdown float-right">
                    <a href="#"  class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{asset('visita/imagen_empresa/logos/perfilFace.png')}}" alt="User Avatar"> 
                    </a>

                    <div class="user-menu dropdown-menu">
                        <!-- <a class="nav-link" href="#" ><i class="fa fa-power -off"></i>Cerrar sesi??n</a> -->
                        <br><br><br>
                        <form method="POST" action="{{ route('cerrar_sesion') }}">
                            @csrf
                            <button type="submit" ><i class="fa fa-sign-out" style="color:red;"></i>Salir</button>
                        </form>
                    </div>
                   
                       
                   





                    
                </div>
            </div>
        </div>
    </header>
    <!-- /#header -->
    <!-- Content -->
    <div class="content" >
        <!-- Animated -->
        <div class="animated fadeIn">
            @yield('content')
            
        </div>
        <!-- .animated -->
    </div>
    <!-- /.content -->
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2022
                </div>
                <div class="col-sm-6 text-right">
                    Hecho por <a href="https://colorlib.com">Mente digital Bolivia</a>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- /.site-footer -->
</div>
<!-- /#right-panel -->
    <!-- Bootstrap core JS-->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <!-- Core theme JS-->
    <script src="{{asset('visita/js/admin.js')}}"></script>
    <!-- tree -->
    <!-- <script src="{{asset('visita/dist/jstree.min.js')}}"></script> -->
    <!-- <script src="{{asset('visita/js/test.json')}}"></script> -->








         <!-- Scripts -->
         <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>

    <!--  Chart js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.bundle.min.js"></script>

    <!--Chartist Chart-->
    <script src="https://cdn.jsdelivr.net/npm/chartist@0.11.0/dist/chartist.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartist-plugin-legend@0.6.2/chartist-plugin-legend.min.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/jquery.flot@0.8.3/jquery.flot.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-pie@1.0.0/src/jquery.flot.pie.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flot-spline@0.0.1/js/jquery.flot.spline.min.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/simpleweather@3.1.0/jquery.simpleWeather.min.js"></script>
    <!-- <script src="assets/js/init/weather-init.js"></script> -->

    <script src="https://cdn.jsdelivr.net/npm/moment@2.22.2/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
    <script src="{{asset('assets/js/init/fullcalendar-init.js')}}"></script>




    <!-- jquery para select y tree -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- <script src="{{asset('visita/dist/jstree.min.js')}}"></script> -->
    <script src="{{asset('visita/js/jquery-simple-tree-table.js')}}"></script>









    <!--Local Stuff-->
    <!-- <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });
    </script> -->
  </body>
</html>
<script>
    function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}
</script>