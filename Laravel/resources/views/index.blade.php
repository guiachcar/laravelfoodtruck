@extends('layouts.app')

@section('content')




    <div id="main-slider" class="carousel slide" data-ride="carousel">
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
                          <p>{{ $events[$i]->startDate }}  - {{ $events[$i]->endDate }}</p>
                        </div>
                    </div>
                @else
                    <div class="item">
                        <img class="img-responsive" src="{{ $events[$i]->image }}" alt="" >
                        <div class="carousel-caption" ><br>
                          <h4>{{ $events[$i]->name }}</h4>
                          <p>{{ $events[$i]->startDate }}  - {{ $events[$i]->endDate }}</p>
                        </div>
                    </div>
                @endif

             @endfor



          </div>


      </div>
    </div>      

@endsection