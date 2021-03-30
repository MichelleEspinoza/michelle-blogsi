<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ADVentas | www.incanatoit.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
   <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{ asset('css/font-awesome.css')}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{ asset('css/AdminLTE.min.css')}}>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href={{ asset('css/_all-skins.min.css')}}>
    <link rel="apple-touch-icon" href={{ asset('img/apple-touch-icon.png')}}>
    <link rel="shortcut icon" href={{ asset('img/favicon.ico')}}>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="{{ url('/home-blogsi')}}" class="logo my-2 ">
          <img src="https://images.vexels.com/media/users/3/200093/isolated/preview/596f0d8cb733b17268752d044976f102-shopping-bag-icon-by-vexels.png"  width="50" alt="">
        </a>
        <nav class="navbar navbar-expand-lg navbar-dark bg-menu">
          <div class="container-fluid mt-2 mb-1">
            <a class="navbar-brand" href="{{ url('/home-blogsi')}}">MICHELLE-BLOGSI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll"
             aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
              <ul class="navbar-nav my-2 my-lg-0 navbar-nav-scroll ml-auto" style="--bs-scroll-height: 100px;">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle align-items-end text-white" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Opciones
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><span class="dropdown-item font-weight-bold disabled">Almacén</span></li>
                    <li><a class="dropdown-item" href="{{ url('almacen/articulo')}}">Artículos</a></li>
                    <li><a class="dropdown-item" href="{{ url('almacen/categoria')}}"> Categorías</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><span class="dropdown-item font-weight-bold disabled">Compras</span></li>
                    <li><a class="dropdown-item" href="{{ url('compras/ingreso')}}">Ingresos</a></li>
                    <li><a class="dropdown-item" href="{{ url('compras/proveedor')}}">Proveedores</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><span class="dropdown-item font-weight-bold disabled">Ventas</span></li>
                    <li><a class="dropdown-item" href="{{ url('ventas/venta')}}">Ventas</a></li>
                    <li><a class="dropdown-item" href="{{ url('ventas/cliente')}}">Clientes</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><span class="dropdown-item font-weight-bold disabled">Acceso</span></li>
                    <li><a class="dropdown-item" href="{{ url('seguridad/usuario')}}">Usuarios</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">

            <!--<li class="treeview ">-->
              <br>
              <li class="text-center my-1">

              <span class="badges bg-lights">
                <i class="fs-6  fa fa-laptop text-white"></i> <span class="fs-6 text-white">ALMACÉN</span>
              </span>
            
             <!--<ul class="treeview-menu">-->
                <li><a class="btns btn-menu mr-1" href="{{ url('almacen/articulo')}}"><i class="fa fa-circle-o"></i> Artículos</a></li>
                <li><a class="btns btn-menu mr-1" href="{{ url('almacen/categoria')}}" ><i class="fa fa-circle-o"></i> Categorías</a></li>
              <!--</ul>-->
            <!--</li>--></li>
            
           <!-- <li class="treeview">-->
             <li class="text-center my-2">
              <span class="badges bg-lights">
                <i class="fs-6 fa fa-th text-white"></i> <span class="fs-6 text-white">COMPRAS</span>
              </span>
             <!-- <ul class="treeview-menu">-->
                <li><a class="btns btn-menu mr-1" href="{{ url('compras/ingreso')}}"><i class="fa fa-circle-o"></i> Ingresos</a></li>
                <li><a class="btns btn-menu mr-1" href="{{ url('compras/proveedor')}}"><i class="fa fa-circle-o"></i> Proveedores</a></li>
             <!-- </ul>-->
            </li>
            <!--<li class="treeview">-->
              <li class="text-center my-2">
              <span class="badges bg-lights">
                <i class="fs-6 fa fa-shopping-cart text-white"></i> <span class="fs-6 text-white">VENTAS</span>
              </span>
              <!--<ul class="treeview-menu">-->
                <li><a class="btns btn-menu mr-1" href="{{ url('ventas/venta')}}"><i class="fa fa-circle-o"></i> Ventas</a></li>
                <li><a class="btns btn-menu mr-1" href="{{ url('ventas/cliente')}}"><i class="fa fa-circle-o"></i> Clientes</a></li>
              <!--</ul>-->
            </li>
                       
           <!-- <li class="treeview">-->
             <li class="text-center my-2">
              <span class="badges bg-lights ">
                <i class="fs-6 fa fa-folder text-white"></i> <span class="fs-6 text-white">ACCESO</span>
              </span>
              <!--<ul class="treeview-menu">-->
                <li><a class="btns btn-menu mr-1" href="{{ url('seguridad/usuario')}}"><i class="fa fa-circle-o"></i> Usuarios</a></li>
                
             <!-- </ul>-->
            </li>
            
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="container-fluid">
                <div class="box-header with-border">
                  <h3 class="text-header font-weight-bold">Sistema de Ventas</h3>
                  <div class="box-tools pull-right">
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->           
                              @yield('contenido')
		                          <!--Fin Contenido-->
                      </div>
                    </div>   
                </div>
                      
              </div><!-- /.container -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.1.0
        </div>
        <strong>Copyright &copy; 2021 <a href="https://michelleespinoza.github.io/">Michelle Espinoza</a>.</strong> All rights reserved.
      </footer>
 
      
    <script src="{{ asset('js/app.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <!--<script src="https://unpkg.com/vue-chartjs/dist/vue-chartjs.min.js"></script>-->
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="crossorigin="anonymous"></script>
    @stack('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
 

  </body>
</html>
