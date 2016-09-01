
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
                    Food Trucks
                <br>
                <small>Lista dos Food Trucks</small>
            </h1>
                <div class="col-sm-10 col-sm-offset-1">
                  @foreach($foodtruckers as $foodtrucker)
                  <div class="col-md-4 col-sm-6">

                      <div class="card-container manual-flip">
                         <div class="card">
                             <div class="front">
                                 <div class="cover">
                                     <img src="{{$foodtrucker->image}}"/>
                                 </div>
                                 <div class="user">
                                     <img class="img-circle" src="{{$foodtrucker->image}}"/>
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h3 class="name">{{$foodtrucker->name}}</h3>
                                         <p class="profession">{{ $user->name}}</p>

                                         <p class="text-center">{{$foodtrucker->tell}}</p>
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
                                     <h5 class="motto">{{$foodtrucker->name}}</h5>
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h4 class="text-center">{{$foodtrucker->tell}}</h4>
                                         <p class="text-center">info</p>

                                         <div class="stats-container">
                                             <div class="stats">
                                                 <h4>X</h4>
                                                 <p>
                                                     Participação em eventos
                                                 </p>
                                             </div>
                                             <div class="stats">
                                                 <h4>X</h4>
                                                 <p>
                                                     Produtos
                                                 </p>
                                             </div>
                                             <div class="stats">
                                                 <h4>Informações</h4>
                                                 <a href="visualizarFoodtrucker?id={{ $foodtrucker->id }}"><button  class="btn-danger">
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

