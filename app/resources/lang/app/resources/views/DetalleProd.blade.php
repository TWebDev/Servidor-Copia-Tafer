<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Male Globos y regalos</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <script src="{{ asset('js/app.js' )}}"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/font-awesome/css/font-awesome.min.css') }}">
    <!-- Google fonts - Roboto-->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,700') }}">
    <!-- Bootstrap Select-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- owl carousel-->
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owl.carousel/assets/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.pink.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
  </head>
  <body>
    <!-- Navbar Start-->
    <header class="nav-holder make-sticky">
      <div id="navbar" role="navigation" class="navbar navbar-expand-lg">
        <div class="container"><a href="{{route('home')}}" class="navbar-brand home"><img src="img/Regaloslogoch.jpg" alt="Male Globos y Regalos" class="d-none d-md-inline-block"><img src="" alt="Male Globos y Regalos" class="d-inline-block d-md-none"><span class="sr-only">Inicio</span></a>
          <button type="button" data-toggle="collapse" data-target="#navigation" class="navbar-toggler btn-template-outlined"><span class="sr-only">Barra de Navegacion</span><i class="fa fa-align-justify"></i></button>
          <div id="navigation" class="navbar-collapse collapse">
            <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown menu-large"><a href="{{route('home')}}">Inicio<b></b></a></li>
            <li class="nav-item dropdown active"><a href="{{ route('Catalogo') }}">Catalogo <b class="caret"></b></a></li>
            <li class="nav-item dropdown menu-large"><a href="{{ route('Admin') }}">Admin <b class="caret"></b></a>@guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a></li>
            @if (Route::has('register'))
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
            @endif
              @else
                <li class="nav-item dropdown"><a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }} <span class="caret"></span></a></li>
             <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Finalizar Sesion') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
              </div>
              </li>
              @endguest
              <li class="nav-item dropdown menu-large"><a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i></button></a></li>
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
    </div>
    </header>

    <div id="heading-breadcrumbs">
      <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
          <div class="col-md-7">
            <h1 class="h2">{{$producto -> nombre}}</h1>
          </div>
          <div class="col-md-5">
            <!--PONER STRINGS DEPENDIENDO DE LA CATEGORIA SELECCIONADA-->
            <ul class="breadcrumb d-flex justify-content-end">
              <li class="breadcrumb-item"><a href="/">Inicio</a></li>
              <li class="breadcrumb-item"><a href="/Catalogo">Catalogo</a></li>
              <li class="breadcrumb-item"><a href="/Catalogo/{{$producto -> id}}/detalle">{{$producto -> nombre}}</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div id="content">
      <div class="container">
        <div class="row bar">
          <!-- Informacion del producto-->
          <div class="col-lg-12">
            <div id="productMain" class="row">
              <div class="col-sm-6">
                <div data-slider-id="1" class="owl-carousel shop-detail-carousel">
                  <div> <img src="{{ asset('img/'.$producto -> imagen) }}" alt="" class="img-fluid"></div>
                </div>
              </div>
              <div class="col-sm-6">
                <h4>Detalles del Producto</h4>
                <blockquote class="blockquote">
                  <p>{{$producto -> descripcion}}</p>
                </blockquote>
                <form>
                  <p>Precio</p>
                  <p class="price">${{$producto -> precio}}</p>
                  <p class="text-center"><a class="btn btn-template-outlined" href="{{route ('carritoAgr', $producto -> id)}}"><i class="fa fa-shopping-cart"></i>Añadir al Carrito</a></p>
                </form>
              </div>
            </div>
          </div>
          <!--Se describen los materiales y detalles del producto PUEDES PONDER LA DESCRIPCION DEL PRODUCTO EN DETALLES DEL PRODUCTO-->
          <!--Seccion para compartirlo a Facebook o Google+-->
          <div id="product-social" class="box social text-center mb-5 mt-5 col-sm-12">
            <h4 class="heading-light">Comparte la pagina</h4>
            <ul class="social list-inline">
              <li class="list-inline-item"><a href="https://www.facebook.com/MaleGlobosyRegalos/" data-animate-hover="pulse" class="external facebook"><i class="fa fa-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#" data-animate-hover="pulse" class="external gplus"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>
          <!--Las imagenes donde se pone el precio de algunos productos-->
          <div class="row">
            <div class="col-lg-3 col-md-6">
              <div class="box text-uppercase mt-0 mb-small">
                <h3>Productos que quizas te gusten</h3>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="product">
                <div class="image"><a href="#"><img src="img/RegalosArreglo1.png" alt="" class="img-fluid image1"></a></div>
                <div class="text">
                  <h3 class="h5"><a href="shop-detail.html">Caja</a></h3>
                  <p>Precio</p>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="product">
                <div class="image"><a href="#"><img src="img/RegalosArreglo2.png" alt="" class="img-fluid image1"></a></div>
                <div class="text">
                  <h3 class="h5"><a href="shop-detail.html">Arreglo </a></h3>
                  <p>Precio</p>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6">
              <div class="product">
                <div class="image"><a href="#"><img src="img/RegalosArreglo5.png" alt="" class="img-fluid image1"></a></div>
                <div class="text">
                  <h3 class="h5"><a href="shop-detail.html">Arreglo</a></h3>
                  <p>Precio</p>
                  <p class="price">$143</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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
              <li class="list-inline-item"><a href="#"><img src="{{asset('img/RegalosPago.png')}}" alt="Pago PayPal" class="img-fluid"></a></li>
              <li class="list-inline-item"><a href="#"><img src="{{asset('img/RegalosPago2.png')}}" alt="Pago OXXO" class="img-fluid"></a></li>
              <li class="list-inline-item"><a href="#"><img src="{{asset('img/RegalosPago3.jpg')}}" alt="Pago MasterCard" class="img-fluid"></a></li>
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
    </div>
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popper.js/umd/popper.min.js') }}"> </script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.cookie/jquery.cookie.js') }}"> </script>
    <script src="{{ asset('vendor/waypoints/lib/jquery.waypoints.min.js') }}"> </script>
    <script src="{{ asset('vendor/jquery.counterup/jquery.counterup.min.js') }}"> </script>
    <script src="{{ asset('vendor/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js') }}"></script>
    <script src="{{ asset('js/jquery.parallax-1.1.3.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery.scrollto/jquery.scrollTo.min.js') }}"></script>
    <script src="{{ asset('js/front.js') }}"></script>
  </body>
</html>