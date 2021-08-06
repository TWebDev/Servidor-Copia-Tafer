<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Male Globos y Regalos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,700">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="vendor/bootstrap-select/css/bootstrap-select.min.css">
    <!-- owl carousel-->
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="vendor/owl.carousel/assets/owl.theme.default.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.pink.css" id="theme-stylesheet">
    <!-- Custom stylesheet-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
  </head>
  <body>
  <!-- Barra de Navegacion -->
    <header class="nav-holder make-sticky">
      <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
        <div class="container"><a href="{{route('home')}}" class="navbar-brand home"><img src="img/Regaloslogoch.jpg" alt="Male Globos y Regalos" class="d-none d-md-inline-block"><img src="" alt="Male Globos y Regalos" class="d-inline-block d-md-none"><span class="sr-only">Inicio</span></a>
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

    <div id="heading-breadcrumbs">
      <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
          <div class="col-md-7">
            <h1 class="h2">Inicio</h1>
          </div>
        </div>
      </div>
    </div>
  <!-- Texto donde se ingresara datos de mision vision y valores e informacion de la empresa -->
    <section class="bg-white bar">
      <div class="container">
        <div class="heading text-center">
          <h2>Male Globos y Regalos</h2>
        </div>
        <p class="lead">Globos, Peluches, Regalos, Envolturas, Papeleria y mucho mas!! Te esperamos!! Y para tu comodidad tambien tenemos servicio a domicilio!!! Haz tu pedido!!!</p>
      </div>
    </section>
  <!-- Carrusel Principal se muestra los arreglos destacados de acuerdo a el evento-->
    <section style="background: url('img/Regalos-carrusel.jpg') center center repeat; background-size: cover;" class="bar background-white relative-positioned">
      <div class="home-carousel">
        <div class="dark-mask mask-primary"></div>
        <div class="container">
          <div class="homepage owl-carousel">
            <div class="item">
              <div class="row">
                <div class="col-md-5 text-right">
                  <h1>Regalo A</h1>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <div class="col-md-7"><img src="img/RegalosArreglo13.png" style="height:500px" style="width: 300px" alt="" class="img-fluid"></div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-md-7 text-center"><img src="img/RegalosArreglo11.png" style="height:500px" style="width: 300px" alt="" class="img-fluid"></div>
                <div class="col-md-5">
                  <h2>Regalo Y</h2>
                  <ul class="list-unstyled">
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-md-5 text-right">
                  <h1>Regalo X</h1>
                  <ul class="list-unstyled">
                    <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                  </ul>
                </div>
                <div class="col-md-7"><img src="img/RegalosArreglo7.png" style="height:500px" style="width: 500px" alt="" class="img-fluid"></div>
              </div>
            </div>
            <div class="item">
              <div class="row">
                <div class="col-md-7"><img src="img/RegalosArreglo1.png" style="height:500px" style="width: 300px" alt="" class="img-fluid"></div>
                  <div class="col-md-5">
                    <h1>Regalo Z</h1>
                    <ul class="list-unstyled">
                      <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</li>
                    </ul>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- Carrusel Fin-->
  <!--Empieza cuadros con imagenes con mas presentaciones de regalos-->
    <section class="bg-white bar">
      <div class="container">
        <div class="heading text-center">
          <h2>Mas Regalos</h2>
          <div class="row">
            <div class="col-lg-3">
              <div class="home-blog-post">
                <div class="image"><a href="/"><img src="img/RegalosArreglo1.png" style="height:300px" class="img-fluid"></a>
                  <div class="overlay d-flex align-items-center justify-content-center"></div>
                </div>
                <div class="text">
                  <h4><a>1</a></h4>
                  <p>Descripcion</p>
                  <p class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i></button></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="home-blog-post">
                <div class="image"><a href="/"><img src="img/RegalosArreglo2.png" style="height:300px" class="img-fluid"></a>
                  <div class="overlay d-flex align-items-center justify-content-center"></div>
                </div>
                <div class="text">
                  <h4><a>2</a></h4>
                  <p>Descripcion</p>
                  <p class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i></button></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="home-blog-post">
                <div class="image"><a href="/"><img src="img/RegalosArreglo4.png" class="img-fluid" style="height:300px"></a>
                  <div class="overlay d-flex align-items-center justify-content-center"></div>
                </div>
                <div class="text">
                  <h4><a>3</a></h4>
                  <p>Descripcion</p>
                  <p class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i></button></a>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <div class="home-blog-post">
                <div class="image"><a href="/"><img src="img/RegalosArreglo5.png" class="img-fluid" style="height: 300px"></a>
                  <div class="overlay d-flex align-items-center justify-content-center"></div>
                </div>
                <div class="text">
                  <h4><a>4</a></h4>
                  <p>Descripcion</p>
  	              <p class="intro">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                  consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                  cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                  proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i></button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
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
              <li class="list-inline-item"><a href="#"><img src="img/RegalosPago.png" alt="Pago PayPal" class="img-fluid"></a></li>
              <li class="list-inline-item"><a href="#"><img src="img/RegalosPago2.png" alt="Pago OXXO" class="img-fluid"></a></li>
              <li class="list-inline-item"><a href="#"><img src="img/RegalosPago3.jpg" alt="Pago MasterCard" class="img-fluid"></a></li>
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