<!-- Left Panel -->
<aside id="left-panel" class="left-panel">
  <nav class="navbar navbar-expand-sm navbar-default">
      <div id="main-menu" class="main-menu collapse navbar-collapse">
          <ul class="nav navbar-nav">
                
              <li class="">
                <br>
                  <a href="{{route('inicioAdmin') }}"><i class="menu-icon fa fa-house-chimney"></i>Inicio</a>
              </li>
              <li class="menu-title">Administración</li>
              <!-- /.menu-title -->
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-lock"></i>Seguridad</a>
                  <ul class="sub-menu children dropdown-menu"><li><i class="fa fa-suitcase"></i><a href="{{ route('roles') }}">Roles</a></li>
                      <li><i class="fa fa-users"></i><a href="{{ route('usuarios') }}">Usuarios</a></li>
                  </ul>
              </li>
              
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cog"></i>Parámetros</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="fa fa-table"></i><a href="{{ route('gestion') }}">Gestión</a></li>
                      <li><i class="fa fa-bullseye"></i><a href="#">Área</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Nivel de estudios</a></li>
                      <li><i class="fa fa-file"></i><a href="#">Profesión</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Cargo</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Tipo de acuerdo</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Universidades</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Feriados</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Tipo de permisos</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Horario laboral</a></li>
                  </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Talento humano</a>
                    <ul class="sub-menu children dropdown-menu">
                        <li><i class="fa fa-table"></i><a href="#">Pasantes</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Externas</a></li>
                        <li><i class="fa fa-bullseye"></i><a href="#">Estructurales</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Autónomas</a></li>
                        <li><i class="fa fa-file"></i><a href="#">Voluntarias</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Asistencia</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Registro de horas</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Permisos</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Teletrabajo</a></li>
                        <li><i class="fa fa-table"></i><a href="#">Sueldos</a></li>
                    </ul>
              </li>
              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-shopping-cart"></i>Ventas</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="fa fa-bullseye"></i><a href="{{ route('servicio') }}">Servicios</a></li>
                      <li><i class="fa fa-bullseye"></i><a href="{{ route('marca') }}">Marcas</a></li>
                      <li><i class="fa fa-bullseye"></i><a href="{{ route('clientes') }}">Clientes</a></li>
                      <li><i class="fa fa-table"></i><a href="{{ route('huella_digital') }}">Huella Digital</a></li>
                      <li><i class="fa fa-file"></i><a href="{{ route('proforma') }}">Proformas</a></li>
                      <li><i class="fa fa-table"></i><a href="#">Ventas</a></li>
                  </ul>
              </li> 

              <li class="menu-title">Reportes</li><!-- /.menu-title -->

              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Asignaciones</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Estructurales</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Externas</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Pasantes</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Voluntarias</a></li>

                  </ul>
              </li>

              <li class="menu-title">Comercio digital</li><!-- /.menu-title -->

              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Asignaciones</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Estructurales</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Externas</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Pasantes</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Voluntarias</a></li>

                  </ul>
              </li>

              <li class="menu-title">Medios digitales</li><!-- /.menu-title -->

              <li class="menu-item-has-children dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Asignaciones</a>
                  <ul class="sub-menu children dropdown-menu">
                      <li><i class="menu-icon fa fa-fort-awesome"></i><a href="font-fontawesome.html">Estructurales</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Externas</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Pasantes</a></li>
                      <li><i class="menu-icon ti-themify-logo"></i><a href="font-themify.html">Voluntarias</a></li>

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
                    <a href="#"  onclick="myFunction()" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="user-avatar rounded-circle" src="{{asset('visita/imagen_empresa/logos/perfilFace.png')}}" alt="User Avatar"> 
                    </a>

                    <div class="user-menu dropdown-menu">
                        <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Cerrar sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
</div>