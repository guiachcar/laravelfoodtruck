<!DOCTYPE html>
<html>

<head>
  <!--Estilo do Mapa -->
  <style type="text/css">
    html, body, section { height: 100%; margin: 0; padding: 0; }
    #map { height: 100%; }
  </style>
    <script src="/assets/bootstrap/jquery.min.js"></script>
    <script src="/js/scripts.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    
   
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/bootstrap/font-awesome/css/font-awesome.css" rel="stylesheet">
    <!--Cidades -->

    <!-- Toastr style -->
    <link href="/assets/bootstrap/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="/assets/bootstrap/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="/assets/bootstrap/css/animate.css" rel="stylesheet">
    <link href="/assets/bootstrap/css/style.css" rel="stylesheet">
    <!-- Cards -->
    <link href="/assets/bootstrap/css/rotating-card.css" rel="stylesheet" />
    
    <title>Central Food Trucks</title>
</head>

<body>
    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        @if(@$user->id!=NULL)
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" width="100" height="100" src="/assets/images/logo.png" />
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">  @if(@$user->tipo==2)
                                  Food Trucker
                              @else
                                  Usuário
                              @endif</strong>
                             </span> <span class="text-muted text-xs block">
                            <strong class="font-bold">{{ @$user->name}}</strong>
                              <b class="caret"></b></span> </span> </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a href="editarUser">Dados</a></li>
                                <li class="divider"></li>
                                <li><a href="logout">Logout</a></li>
                            </ul>
                        </div>
                        @endif
                        <div class="logo-element">
                            CFT+
                        </div>
                    </li>
                    <li class="active">
                        <a href="/"><i class="fa fa-home"></i> <span class="nav-label">Home</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-truck"></i> <span class="nav-label">Food Trucks</span> <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li class="active"><a href="foodtruckers">Todos</a></li>
                            <li><a href="foodtruckADD">Novo</a></li>
                            <li><a href="#">Meus Food Trucks *</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calendar"></i> <span class="nav-label">Eventos</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="events">Todos</a></li>
                            <li><a href="eventsADD">Novo</a></li>
                            <li><a href="#">Meus Eventos *</a></li>
                            <li><a href="#">Participação *</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-map-marker"></i> <span class="nav-label">Localização </span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="mapas">Novo</a></li>
                            <li><a href="show">Localização Eventos</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-cutlery"></i> <span class="nav-label">Produtos</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="products">Meus Produtos</a></li>
                            <li><a href="productADD">Novo</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label">Cardápios</span>  <span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li><a href="menus">Meus Cardápios</a></li>
                            <li><a href="menuADD">Novo</a></li>
                        </ul>
                    </li>
                    
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>

        </nav>
        </div>

                @yield('content')   

        



        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/assets/bootstrap/js/jquery-2.1.1.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/bootstrap/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="/assets/bootstrap/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="/assets/bootstrap/js/plugins/flot/jquery.flot.js"></script>
    <script src="/assets/bootstrap/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="/assets/bootstrap/js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="/assets/bootstrap/js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="/assets/bootstrap/js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="/assets/bootstrap/js/plugins/peity/jquery.peity.min.js"></script>
    <script src="/assets/bootstrap/js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="/assets/bootstrap/js/inspinia.js"></script>
    <script src="/assets/bootstrap/js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="/assets/bootstrap/js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="/assets/bootstrap/js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="/assets/bootstrap/js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="/assets/bootstrap/js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="/assets/bootstrap/js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="/assets/bootstrap/js/plugins/toastr/toastr.min.js"></script>
    

<script src="/js/scripts.js"></script>

    
</body>
</html>
