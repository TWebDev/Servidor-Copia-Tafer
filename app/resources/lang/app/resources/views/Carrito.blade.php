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
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
  </head>
  <body>
    <div id="all">
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
              <li class="nav-item dropdown active"><a href="{{route('carrito')}}"><button width="50" type="submit" class="btn btn-template-outlined"><i style="color: white" class="fa fa-shopping-cart"></i></button></a></li>
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
      <!-- Navbar End-->
    <div id="heading-breadcrumbs">
      <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
          <div class="col-md-7">
            <h1 class="h2">Carrito de Compras</h1>
          </div>
          <div class="col-md-5">
            <ul class="breadcrumb d-flex justify-content-end">
              <li class="breadcrumb-item"><a href="/">Inicio</a></li>
              <li class="breadcrumb-item active">Carrito de Compras</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
      <div id="content">
        <div class="container" style="margin-bottom: 248px">
          <div class="row bar">
            @if(count($carro))
              <div class="col-lg-12">
                <!--String para jalar el total de productos que se tiene en el carrito un contador o algo-->
                <p class="text-muted lead">Tienes {{count($carro)}} articulo(s) actualmente en tu carrito.</p>
              </div>
          <div id="basket" class="col-lg-12">
            <div class="box mt-0 pb-0 no-horizontal-padding">
              <!--poner la ruta para hacer la orden de pago-->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th colspan="2">Producto</th>
                      <th>Cantidad</th>
                      <th>Precio por unidad</th>
                      <th colspan="2">Total</th>
                    </tr>
                  </thead>
                <tbody>
                  @foreach($carro as $item)
                  <tr>
                  <td><a href="{{ asset('Catalogo') }}"><img src="{{ asset('img/'.$item -> imagen) }}" alt="..." class="img-fluid"></a></td>
                  <td><a href="{{ asset('Catalogo') }}">{{$item -> nombre}}</a></td>
                  <td>
                    <form method="post" action="{{route('actualiza')}}" >
                      @csrf
                      <input type="hidden" name="id" value="{{$item -> id}}">
                      <input 
                        type="number" 
                        min="1" 
                        max="{{$item -> cantidad}}" 
                        value="{{$item -> cantidadcarro}}" 
                        id="cantidadcarro"
                        name = "cantidadcarro"
                        placeholder="cantidadcarro"
                      >
                      <button type= "submit">
                        <i class="fa fa-refresh"></i>
                      </button>
                    </form>
                  </td>
                  <td>${{$item -> precio}}</td>
                  <td>${{number_format($item -> precio * $item -> cantidadcarro,2)}}</td>
                  <td><a href="{{route ('carritoElim', $item -> id)}}"><i class="fa fa-trash-o"></i></a></td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th colspan="5">Total</th>
                    <th colspan="2">${{number_format($total,2)}}</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <div class="box-footer d-flex justify-content-between align-items-center">
              <div class="left-col"><a href="{{ asset('Catalogo') }}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Continuar Comprando</a></div>
              <div class="right-col">
                <a class="btn btn-secondary" href="{{route('carritoLimp')}}"><i class="fa fa-trash"></i> Vaciar el carrito</a>
                <a  href="{{route('MetodoPago')}}" class="btn btn-template-outlined">Proceder a hacer el pago <i class="fa fa-chevron-right"></i></a>
              </div>
            </div>
          </div>
        </div>
          @else
            <div class="col-lg-12">
              <blockquote class="blockquote text-center">
                <div class="alert alert-warning" role="alert">
                  <p class="mb-0"><strong><h3>El carrito esta vacio</h3></strong> </p>
                </div>
                <div class="left-col"><a href="{{ asset('Catalogo') }}" class="btn btn-secondary mt-0"><i class="fa fa-chevron-left"></i> Continuar Comprando</a></div>    
              </blockquote>
            </div>
          @endif
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
    <!-- Javascript files-->
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