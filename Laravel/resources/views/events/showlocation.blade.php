@extends('layouts.app')

@section('content')




   <section style="background-image: url(/images/sponsor-bg.jpg);">
 <!--Form de busca , action LocationsController-->
      <div align="center">
        <label> Buscar Food Trucks</label>
      </div>
      <form method="POST" action="locationBuscar">
      <div class="form-group" style="padding: 50px 30px 50px 80px;">
      <div class="input-group">
         <select type="text" name="uf" id="uf" default="SP" class="form-control" ></select>
         <select type="text" name="cidade" id="cidade" class="form-control" ></select>
         <span class="input-group-btn">
          <!--Token necessario para envio POST Laravel-->
         <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
       
         </span>
     </div>
        <div class="input-group">
         <input type="submit" class="btn btn-default" value="Buscar" name="btnEnviar" />
         </form>{{ $lat }}
         </div>
      </div>
      <!--Script de populacao de select de cidades por estado -->
      <script>
          $('#uf').ufs({
              onChange: function(uf){
                  $('#cidade').cidades({uf: uf});
              }
          });
       </script>  
       <!--Script de chamada do MAPS com minha Key-->
       <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxYtVi1rI-VVKYPJVadAVlPLHgejbyglQ&callback=initMap">
       </script>

      <!--Script para mostrar posicoes do mapa-->
       <script type="text/javascript">
              
              
              function initMap() {
                //  variavel exibida pelo blade laravel
                var latlng = new google.maps.LatLng({{ @$lat}},{{ @$long}} );
                var map = new google.maps.Map(document.getElementById('map'), {
                  center: latlng,
                  zoom: {{ @$zoom }}      
                
                }); 
            
           

              // laco que traz consulta de localizacoes
              @foreach ($locations as $location)
                  //variavel que guarda info ao clicar no ponto do mapa
                  var html = "<b>{{ $location->name }}</b><br> {{ $location->address }} <br><a href='visualizarEvento?id={{ $location->id }}'> <img src='{{ $location->image }}' width='120' height='120' alt='{{ $location->name }}'></a><br>";
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

              @endforeach
            }
      </script>
    

      <div id="map"></div>

</section>

@endsection