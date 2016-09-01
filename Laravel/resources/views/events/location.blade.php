@extends('layouts.app')

@section('content')

  

      <!--Script de chamada do MAPS com minha Key-->
      <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAxYtVi1rI-VVKYPJVadAVlPLHgejbyglQ&callback=initMap">
      </script>

      <!--Script para mostrar posicao do mapa-->
      <script type="text/javascript">

        function initMap() {
          var latlng = new google.maps.LatLng({{ @$lat}},{{ @$long}} );
          var map = new google.maps.Map(document.getElementById('map'), {
            center: latlng,
            zoom: 16        
          });
          var marker = new google.maps.Marker({
                  position: new google.maps.LatLng({{ @$lat }}, {{ @$long }}),
                  title: "{{ @$name }}",
                  map: map
          });
        }
      </script>
      <!--Form de busca-->
     
        <form method="POST" action="locationBuscar">   
        
          
                
       
              <div class="input-group">
                  <span class="input-group-addon" id="sizing-addon1">Nome</span>
                  <input type="text" id="name" name="name" class="form-control" placeholder="Nome do Local" aria-describedby="sizing-addon1" value="{{ @$name }}"  />
              </div>
              <div class="input-group">
                  <span class="input-group-addon" id="sizing-addon1">Local</span>
                  <input type="text" id="addressBusca" name="addressBusca" class="form-control" placeholder="Exemplo Av São Carlos 1000, Centro, São Carlos" aria-describedby="sizing-addon2" value="{{ @$address }}"  />
              </div>
              <div class="input-group" align="center">
                  <span class="input-group-btn">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="submit" class="btn btn-default" value="Buscar" name="btnEnviar" />
                  </span>
              </div>

       
        
        </form>
   
      <!--Div para mostrar mapa-->
      <div id="map"></div>
      <!--Botao para salvar posicao-->
      <form method="POST" action="locationSalvar">
          <input type="hidden" name="name" value="{{ @$name }}" />
          <input type="hidden" name="address" value="{{ @$address }}" />
          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
          <input type="hidden" name="lat" value="{{ @$lat }}"> 
          <input type="hidden" name="long" value="{{ @$long }}"> 
           <input type="hidden" name="user_id" value="{{ @$user->id }}"> 
          <div class="input-group" align="center">
            <span class="input-group-btn">
              <input type="submit" value="Salvar" class="btn btn-default"/>
            </span>
          </div>
      </form>
@endsection