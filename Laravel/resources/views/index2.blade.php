@extends('layouts.app')

@section('content')
  <section style="background: url('images/sponsor-bg.jpg') no-repeat center center fixed;">
 <!--Form de busca , action LocationsController-->
      <div align="center">
        <label class="btn-success"> Buscar Food Trucks</label>
      </div>
      <form method="POST" action="locationBuscar">
      <div class="form-group" style="padding: 50px 30px 50px 80px;">
      <div class="input-group">
         <select type="text" name="uf" id="uf" default="SP" class="form-control" required="required"></select>
         <select type="text" name="cidade" id="cidade" class="form-control" ></select>
         <span class="input-group-btn">
          <!--Token necessario para envio POST Laravel-->
         <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
       
         </span>
     </div>
        
         <input type="submit" class="btn btn-default" value="Buscar" name="btnEnviar" />
         </form>
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
    
</section>
<section  id="carousel" class="mbr-after-navbar" style="background: url('images/event-bg.jpg') no-repeat center ;">
    
       <div align="center">
              <label class="btn-success"> Próximos Eventos</label>
      </div>

    <div id="main-slider" class="carousel slide" data-ride="carousel" align="center">
      <ol class="carousel-indicators">
        @for ($i = 0; $i < count($events) ; $i++)
            @if($i === 0)
               <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            @else
               <li data-target="#main-slider" data-slide-to="{{ $i }}"></li>
            @endif
        @endfor
      </ol>
     <div class="carousel-inner">
             @for ($i = 0; $i < count($events) ; $i++)
                @if($i === 0)
                    <div class="active item">
                        <img class="img-responsive" src="{{ $events[$i]->image }}" alt="">
                        <div class="carousel-caption">
                         <h4>{{ $events[$i]->name }}</h4>
                          <p>Data: {{ $events[$i]->startDate }}  até  {{ $events[$i]->endDate }}</p>
                          <p>{{ $events[$i]->description}} </p>
                        </div>
                    </div>
                @else
                    <div class="item">
                        <img class="img-responsive" src="{{ $events[$i]->image }}" alt="" >
                        <div class="carousel-caption" ><br>
                          <h4>{{ $events[$i]->name }}</h4>
                          <p>Data: {{ $events[$i]->startDate }}  até  {{ $events[$i]->endDate }}</p>
                          <p>{{ $events[$i]->description}} </p>
                        </div>
                    </div>
                @endif

             @endfor


          </div>

      </div>
    </div>      
</section>
@endsection