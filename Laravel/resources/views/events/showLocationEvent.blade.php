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
  <script type="text/javascript" src="/assets/bootstrap/js/bootstrap.min.js"></script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="/assets/images/logo.png" type="/image/x-icon">

  <link href="/assets/bootstrap/css/font-awesome.min.css" rel="stylesheet">


  
  
  
</head>
<body >





   <section style="background-image: url(/images/sponsor-bg.jpg);">
 
       <!--Script de chamada do MAPS com minha Key-->
       <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxYtVi1rI-VVKYPJVadAVlPLHgejbyglQ&callback=initMap">
       </script>

      <!--Script para mostrar posicoes do mapa-->
       <script type="text/javascript">
              
              
              function initMap() {
                //  variavel exibida pelo blade laravel
                var latlng = new google.maps.LatLng({{ $location->lat }},{{ $location->long}} );
                var map = new google.maps.Map(document.getElementById('map'), {
                  center: latlng,
                  zoom: {{ @$zoom }}      
                
                }); 
            
           

              // laco que traz consulta de localizacoes

                  //variavel que guarda info ao clicar no ponto do mapa
                  var html = "<b>{{ $location->name }}</b><br> {{ $location->address }} <br> <img src='{{ $location->image }}' width='120' height='120' alt='{{ $location->name }}'><br>";
                  infowindow{{ $location->id }} = new google.maps.InfoWindow({
                  content: html
                  });
                  //variavel que exibe as marcacoes do mapa
                  var maker{{ $location->id }} = new google.maps.Marker({
                        position: new google.maps.LatLng({{ $location->lat }}, {{ $location->long }}),
                        title: "{{ $location->name }}",
                        map: map
                  });
                  //funcao que da zoom e exibe a info do local
                  google.maps.event.addListener(maker{{ $location->id }},'click',function() {
                  map.setZoom(19);
                  infowindow{{ $location->id }}.open(map, maker{{ $location->id }});
                  map.setCenter(maker{{ $location->id }}.getPosition());
                  });


            }
      </script>
    

      <div id="map"></div>

</section>


</body>
</html>