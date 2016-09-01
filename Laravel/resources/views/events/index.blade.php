
@extends('layouts.app')

@section('content')     

    @if (@$status!=null)
           <div class="alert alert-success alert-white rounded">
            <button type="button" data-dismiss="alert" aria-hidden="true" class="close">×</button>
            <div class="icon">
                <i class="fa fa-warning"></i>
            </div>
            <strong>{{ $status }}</strong> 
        </div>    
     @endif

      <div class="container">
        <div class="row">
            <h1 class="title">
                Eventos
            <br>
            <small>Próximos eventos</small>
        </h1>
            <div class="col-sm-10 col-sm-offset-1">     
                @foreach($events as $index => $value)
                <div class="col-md-4 col-sm-6">

                      <div class="card-container manual-flip">
                         <div class="card">
                             <div class="front">
                                 <div class="cover">
                                     <img src="{{$events[$index]->image}}"/>
                                 </div>
                                 <div class="user">
                                     <img class="img-circle" src="{{$events[$index]->image}}"/>
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h3 class="name">{{$events[$index]->name}}</h3>
                                         <p class="profession">{{ $events[$index]->startDate}} até {{$events[$index]->endDate}}</p>

                                         <p class="text-center">{{$events[$index]->description}}</p>
                                     </div>
                                     <div class="footer">
                                         <button class="btn btn-simple" onclick="rotateCard(this)">
                                                    <i class="fa fa-mail-forward"></i> Saiba Mais
                                         </button>
                                     </div>
                                 </div>
                             </div> <!-- end front panel -->
                             <div class="back">
                                 <div class="header">
                                     <h5 class="motto">{{$events[$index]->name}}</h5>
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h4 class="text-center">{{$events[$index]->startDate}} até {{$events[$index]->endDate}}</h4>
                                         <p class="text-center">{{$events[$index]->startHour}} - {{$events[$index]->endHour}}</p>

                                         <div class="stats-container">
                                             <div class="stats">
                                                 <h4>X</h4>
                                                 <p>
                                                     Food Trucks
                                                 </p>
                                             </div>
                                             <div class="stats">
                                                 <h4>X</h4>
                                                 <p>
                                                     Produtos
                                                 </p>
                                             </div>
                                             <div class="stats">
                                                 <h4>Veja o Evento:<br></h4>
                                                 <a href="visualizarEvento?id={{ $events[$index]->id }}"><button  class="btn-danger">
                                                  Clique Aqui
                                                </button></a>
                                                
                                             </div>
                                         </div>

                                     </div>
                                 </div>
                                 <div class="footer">
                                     <button class="btn btn-simple" rel="tooltip" title="Girar" onclick="rotateCard(this)">
                                                <i class="fa fa-reply"></i> Voltar
                                      </button>

                                 </div>
                             </div> <!-- end back panel -->
                         </div> <!-- end card -->
                     </div> <!-- end card-container -->
                    </div>
                     @endforeach
                    
                </div>
         </div>
    </div>

    <script type="text/javascript">
        $().ready(function(){
            $('[rel="tooltip"]').tooltip();

        });

        function rotateCard(btn){
            var $card = $(btn).closest('.card-container');
            console.log($card);
            if($card.hasClass('hover')){
                $card.removeClass('hover');
            } else {
                $card.addClass('hover');
            }
        }
    </script>

        
@endsection

