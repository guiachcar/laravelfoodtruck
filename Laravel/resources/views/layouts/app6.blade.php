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

 <link href="/assets/bootstrap/css/bootstrap.css" rel="stylesheet" />
  <link href="/assets/bootstrap/css/rotating-card.css" rel="stylesheet" />
  <link href="http://netdna.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" />
  <script type="text/javascript" src="assets/bootstrap/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/assets/images/logo.png" type="/image/x-icon">

  <link href="/assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">
  <link href="/assets/bootstrap/css/main.css" rel="stylesheet">
  <link rel="stylesheet" href="/assets/mobirise/css/style.css">
  <link rel="stylesheet" href="/assets/mobirise-gallery/style.css">
  <link rel="stylesheet" href="/assets/mobirise-slider/style.css">
  <link rel="stylesheet" href="/assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body >



<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
         
            <div class="row" >             
                <div class="navbar-header" >
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Food Trucks</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                      <img class="img-responsive" src="/images/logo.png" alt="logo">
                    </a>                    
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">                 
                        <li class="scroll active"><a href="/">Home</a></li>
                        <li class="scroll"><a href="/events">Eventos</a></li>                         
                        <li class="scroll"><a href="/foodtruckers">FoodTruckers</a></li>
                        @if(@$user->tipo == 2)
                           <li class="scroll"><a href="/products">Meus Cardápios</a></li>
                        @endif
                        @if(@$user->id!=NULL)
                        <li class="scroll"><a href="/login">Entrar</a></li> 
                         <div class="btn-group" role="group">
                                <button type="button" class="mbr-buttons__btn btn btn-success" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  {{ @$user->name}}
                                  <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                  <li class="scroll"><a href="logout">Sair</a></li>
                                </ul>
                        </div>     
                        @endif            
 
                    </ul>
                </div>
            </div>
          </div>
        </div>                    
    </header>

</section>


<section class="mbr-gallery mbr-section mbr-section--no-padding mbr-after-navbar">
    @yield('content')
</section>


</body>
</html>

