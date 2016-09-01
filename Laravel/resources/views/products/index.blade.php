
@extends('layouts.app')

@section('content')

     <div class="container">
            <div class="row">
                <h1 class="title">
                    Produtos
                <br>
                <small>Lista dos Produtos</small>
            </h1>
                <div class="col-sm-10 col-sm-offset-1">
                  @foreach($products as $product)
                  <div class="col-md-4 col-sm-6">

                      <div class="card-container manual-flip">
                         <div class="card">
                             <div class="front">
                                 <div class="cover">
                                     <img src="{{$product->image}}"/>
                                 </div>
                                 <div class="user">
                                     <img class="img-circle" src="{{$product->image}}"/>
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h3 class="name">{{$product->name}}</h3>
                                         <p class="profession">{{$product->valor}}</p>

                                         <p class="text-center">{{$product->description}}</p>
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
                                     <h5 class="motto">{{$product->name}}</h5>
                                 </div>
                                 <div class="content">
                                     <div class="main">
                                         <h4 class="text-center">{{$product->description}}</h4>
                                         <p class="text-center">info</p>

                                         <div class="stats-container">
                                             <div class="stats">
                                                 <h4>5</h4>
                                                 <p>
                                                     Participação em eventos
                                                 </p>
                                             </div>
                                             <div class="stats">
                                                 <h4>20</h4>
                                                 <p>
                                                     Produtos
                                                 </p>
                                             </div>
                                             <div class="stats">
                                                 <h4>Informação completa do Produto</h4>
                                                 <a href="visualizarProduct?id={{ $product->id }}"><button  class="btn-danger">
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

