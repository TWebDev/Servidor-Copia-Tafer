<!DOCTYPE html>
<html >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Male Globos y Regalos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.pink.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon and apple touch icons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <header class="nav-holder make-sticky">
        <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
          <div class="container"><a href="{{route('home')}}" class="navbar-brand home"><img src="{{ asset('img/Regaloslogoch.jpg') }}" alt="Male Globos y Regalos" class="d-none d-md-inline-block"><img src="" alt="Male Globos y Regalos" class="d-inline-block d-md-none"><span class="sr-only">Inicio</span></a>
            <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Barra de Navegacion</span><i class="fa fa-align-justify"></i></button>
            <div id="navigation" class="navbar-collapse collapse">
              <ul class="nav navbar-nav ml-auto">
              <li class="nav-item dropdown active"><a href="{{route('home')}}">Inicio<b></b></a></li>
              <li class="nav-item dropdown menu-large"><a href="{{ route('Catalogo') }}">Catalogo <b class="caret"></b></a></li>
              <li class="nav-item dropdown menu-large"><a href="{{ route('Admin') }}">Admin <b class="caret"></b></a>
              @guest
              <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a></li>
              @if (Route::has('register'))
                <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
              @endif
                @else

                  <a href="{{ route('logout') }}" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  {{ __('Finalizar Sesion') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                  </form>
                  <li class="nav-item dropdown menu-large"><a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i></button></a></li>
                @endguest
                </ul>
              </div>
                <div id="search" class="collapse clearfix">
                  <form role="search" class="navbar-form">
                    <div class="input-group">
                      <input type="text" placeholder="Search" class="form-control"><span class="input-group-btn">
                      <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button></span>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </header>




      <!-- Empieza Footer -->
      <!-- Franja Gris clara informacion etc...-->
      <footer class="main-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h4 class="h6">Sobre Nosotros</h4>
              <p>Informacion Adicional</p>
              <hr>
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Ayuda</h4>
              <p>Click para mas informacion</p>
              <hr>
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Contacto con el local</h4>
              <p class="text-uppercase">Rafael Sanzio<br>505 local 2<br>Zapopan<br>GUADALAJARA,JAL.<br><strong>TEL: 33 2301 5264</strong></p>
              <hr class="d-block d-lg-none">
            </div>
            <div class="col-lg-3">
              <h4 class="h6">Metodo de pago</h4>
              <ul class="list-inline photo-stream">
                <li class="list-inline-item"><a href="#"><img src="{{ asset('img/RegalosPago.png') }}" alt="Pago PayPal" class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="{{ asset('img/RegalosPago2.png') }}" alt="Pago OXXO" class="img-fluid"></a></li>
                <li class="list-inline-item"><a href="#"><img src="{{ asset('img/RegalosPago3.jpg') }}" alt="Pago MasterCard" class="img-fluid"></a></li>
              </ul>
            </div>
          </div>
        </div>
          <!--Franja negra con el copyright de la web -->
        <div class="copyrights">
          <div class="container">
            <div class="row">
              <div class="col-lg-4 text-center-md">
                <p>&copy; 2020. Male Globos y Regalos</p>
              </div>
            </div>
          </div>
        </div>
      </footer>





  <!-- Javascript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper.js/umd/popper.min.js"> </script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/waypoints/lib/jquery.waypoints.min.js"> </script>
  <script src="vendor/jquery.counterup/jquery.counterup.min.js"> </script>
  <script src="vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js"></script>
  <script src="js/jquery.parallax-1.1.3.js"></script>
  <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
  <script src="vendor/jquery.scrollto/jquery.scrollTo.min.js"></script>
  <script src="js/front.js"></script>
  </body>
</html>