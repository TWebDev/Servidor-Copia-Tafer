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
            <li class="nav-item dropdown menu-large"><a href="{{ route('Catalogo') }}">Catalogo <b class="caret"></b></a></li>
            <li class="nav-item dropdown menu-large"><a href="{{ route('Admin') }}">Admin <b class="caret"></b></a>@guest
            <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesion') }}</a></li>
            @if (Route::has('register'))
              <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a></li>
            @endif
              @else
              <li class="nav-item dropdown active"><a href="javascript: void(0)" data-toggle="dropdown" class="dropdown-toggle"aria-haspopup="true" aria-expanded="false" v-pre><img style="width:20px;" src="{{asset('img/configuser.png')}}"><b class="caret">{{ Auth::user()->name }}</b></a>
                <ul class="dropdown-menu">
                  <li class="dropdown-item"><a href="{{route('his')}}" class="nav-link">Historial</a></li>
                  <li class="dropdown-item"><a href="{{route('Config')}}" class="nav-link">Cambiar Contraseña</a></li>
                  <li class="dropdown-item"><a href="{{ route('logout') }}" class="nav-link"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Finalizar Sesion') }}</a></li>
                </ul>
              </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </ul>
          @endguest
                    <a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i class="fa fa-shopping-cart"></i></button></a>
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
    </header>
    <!-- Cambiar contraseña -->
    <section>
    <div id="content">
        <div class="container">
          <div class="row bar">
            <div id="customer-account" class="col-lg-9 clearfix">
        <div class="heading text-center">
            <h2>Sección para cambiar tus datos personales</h2>
              </div>
              <div class="box mt-5">
                <div class="heading">
                  <h3 class="text-uppercase">Cambia tu contraseña</h3>
                </div>
                <form action="{{route('contra')}}" method="post" >
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_old">Contraseña anterior</label>
                        <input id="password_old" type="password" name="password_old" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_1">Nueva contraseña</label>
                        <input id="password_1" type="password" name="password_1" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="password_2">Repita la nueva contraseña</label>
                        <input id="password_2" type="password" name="password_2" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i>Guardar contraseña</button>
                  </div>
                </form  >
                
              </div>
              <div class="bo3">
                <div class="heading">
                  <h3 class="text-uppercase">Datos personales</h3>
                </div>
                <form action="{{route('datos')}}" method="post" >
                @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="firstname">Nombre completo</label>
                        <input id="firstname" type="text" class="form-control" name="nombre" value="{{auth()->user()->nombre}}">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="lastname">E-mail</label>
                        <input id="lastname" type="text" class="form-control" name="email" value="{{auth()->user()->email}}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="company">Telefono</label>
                        <input id="company" type="text" class="form-control" name="telefono" value="{{auth()->user()->telefono}}">
                      </div>
                    </div>
                    <div class="col-md-12 text-center">
                      <button type="submit" class="btn btn-template-outlined"><i class="fa fa-save"></i> Guardar cambios</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
              <!-- CUSTOMER MENU -->
              <div class="panel panel-default sidebar-menu">
                <div class="panel-heading">
                  <h3 class="h4 panel-title">Más Opciones</h3>
                </div>
                <div class="panel-body">
                  <ul class="nav nav-pills flex-column text-sm">
                    <li class="nav-item"><a href="{{route('his')}}" class="nav-link "><i class="fa fa-list"></i> Mis ordenes</a></li>
                    <li class="nav-item"><a href="{{route('Config')}}" class="nav-link active"><i class="fa fa-user"></i>Cambiar Contraseña</a></li>
                  </ul>
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
            <p>Somos una empresa que se dedica al crear detalles o presentes para las personas que quieres demostrar un detalle</p>
            <hr>
          </div>
          <div class="col-lg-3">
            <h4 class="h6">Ayuda</h4>
            <p>Si tiene alguna duda llame al numero de contacto para más información</p>
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