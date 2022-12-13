<style>
  .navbar-expand-lg .navbar-nav .nav-link {
    padding-right: 10px !important;
    padding-left: 10px !important;
}
</style>
<!-- Navigation -->
<div class="fixed" style="position:fixed;width: 100%;z-index:100;">
  <nav class="navbar navbar-expand-lg static-top" style="background-color:#482359;padding:0;">
    <div class="container">
      <div class="navbar-brand">
          <div class="inline">
            <a href="https://www.facebook.com/mentedigitalboliviaa/" target="_blank" class="icono-socia1"><i class="icono-social1 fab fa-facebook-square"></i></a>
            <a href="https://www.instagram.com/mentedigitalbolivia/?hl=es" target="_blank" class="icono-socia1"><i class="icono-social1 fab fa-instagram"></i></a>
            <a href="https://www.tiktok.com/@mentedigitalbolivia/video/7010384718390676742?is_copy_url=1&is_from_webapp=v1" target="_blank" class="icono-socia1"><i class="icono-social1 fab fa-tiktok"></i></a>
            <a href="https://api.whatsapp.com/send?phone=+59176985007" target="_blank" class="icono-socia1"><i class="icono-social1 fab fa-whatsapp"></i></a>
          </div>
      </div>
    </div>
  </nav>
  <nav class="navbar navbar-expand-lg navbar-light static-top bg-light" style="box-shadow: 2px 2px 5px #999;">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="./visita/imagen_empresa/logos/logoMD.png" alt="logo mente digital" height="50">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('inicio_index')}}" style="color:#482359;">Inicio</a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#" style="color:#482359;">Servicios&nbsp;&nbsp;&nbsp;&nbsp;</a>
          </li> -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"style="color:#482359;">
              Servicios
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{route('brandingEstrategico_index')}}" style="color:#482359;">Branding estratégico</a></li>
              <li><a class="dropdown-item" href="{{route('grafico_index')}}" style="color:#482359;">Producción gráfica para redes sociales</a></li>
              <li><a class="dropdown-item" href="{{route('socialMedia_index')}}" style="color:#482359;">Social media marketing</a></li>
              <li><a class="dropdown-item" href="{{route('tiktok_index')}}" style="color:#482359;">Tik tok publicitario</a></li>
              <li><a class="dropdown-item" href="{{route('fotografia_index')}}" style="color:#482359;">Producción fotográfica comercial</a></li>
              <li><a class="dropdown-item" href="{{route('audiovisual_index')}}" style="color:#482359;">Producción audiovisual para redes sociales</a></li>
              <li><a class="dropdown-item" href="{{route('web_index')}}" style="color:#482359;">Desarrollo y diseño de página web</a></li>
              <br>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('nosotros_index')}}"style="color:#482359;">Sobre nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('equipo_index')}}"style="color:#482359;">Nuestro equipo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('contactanos.index')}}" style="color:#482359;">Contacto</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{route('login')}}" style="color:#482359;"><i class="fa fa-user" style="margin: 0px 5px 0px 5px;"></i></a>
          </li>
          <br>
        </ul>
      </div>
    </div>
  </nav>
</div>
<br>