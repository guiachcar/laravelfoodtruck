
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
                    Cardápios
                <br>
                <small>Meus Cardápios</small>
            </h1>
                <div class="col-sm-10 col-sm-offset-1">
                  @foreach($menus as $menu)
                  <div class="col-md-4 col-sm-6">

                      <div class="card-container manual-flip">
                         <div class="card">
                             <div class="front">
                                 <div class="cover">
                                    
                                 </div>
                                 <div class="user">
                                     
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h3 class="name">{{$menu->name}}</h3>
                                         <p class="profession"></p>

                                         <p class="text-center">{{$menu->description}}</p>
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
                                     <h5 class="motto">{{$menu->name}}</h5>
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h4 class="text-center">{{$menu->description}}</h4>
                                         <p class="text-center">Lista dos Produtos</p>

                                         <div class="stats-container">
                                             
                                             <div class="stats">
                                                 
                                                 <a href="visualizarMenu?id={{ $menu->id }}"><button  class="btn-success">
                                                  Listar Produtos
                                                </button></a>
                                             </div>
                                             <div class="stats">
                                                 
                                                 <a href="menusEDIT?id={{ $menu->id }}"><button  class="btn-danger">
                                                  Editar Cardápio
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

