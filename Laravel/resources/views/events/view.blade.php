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
@if($user->tipo==2)
@if($user->id == $events->user_id)
<p><a class="btn btn-success btn-lg" href="eventsEDIT?id={{ $events->id }}" role="button">Editar</a></p>
@else
<div class="form-group" align="center" style="color:#FFFFFF;background: #c8080b;">

 <div class="input-group">
  <form action="eventsPARTICIPAR" method="POST">
    <input type="hidden" name="id" value="{{ $events->id }}">
    <label>Participar com:</label>
    <select type="text" name="foodtrucker_id" id="foodtrucker_id" class="form-control" required="required" >
      @foreach($foodtruckersPart as $foodtruckersPart1)
      <option value="{{ $foodtruckersPart1->id}}">{{ $foodtruckersPart1->name }}</option>

      @endforeach
    </select>
    <label>Cardápio do Evento</label>
    <select type="text" name="menu_id" id="menu_id" class="form-control" required="required">
      @foreach($menus as $menu)
      <option value="{{ $menu->id}}">{{ $menu->name }}</option>
      @endforeach
    </select>
    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
    <button type="submit" class="btn btn-success">Participar</button>
  </form> 
</div>
</div>       
@endif
@endif
<div class="card" align="center">
  <img class="card-img-top" src="{{ $events->image}}" alt="{{ $events->name }}">
  <div class="card-block">

    <h4 class="card-title">{{ $events->name }}</h4>
    <p class="card-text">Descrição: <br>{{ $events->description }}</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Data Inicio: {{ $events->startDate }}</li>
    <li class="list-group-item">Data Fim: {{ $events->endDate }}</li>
    <li class="list-group-item">Horário Inicio: {{ $events->startHour }}</li>
    <li class="list-group-item">Horário Fim: {{ $events->endHour }}</li> 
    <li class="list-group-item">Food Trucks Participantes:<br>
      @foreach($foodtruckers as $foodtrucker)
      <a href="visualizarFoodtrucker?id={{ $foodtrucker->id }}">{{ $foodtrucker->name }}</a><br>
      @endforeach
    </li>
    
    @if($user->id == $events->user_id)
    <li class="list-group-item">Solicitação para participação no evento<br>
    @foreach($foodtruckersSolPart as $foodtruckersSolPart1)
      <a href="liberaFoodtrucker?id={{ $foodtruckersSolPart1->id }}">{{ $foodtruckersSolPart1->name }} (Liberar)</a><br>
    @endforeach
    </li>
    @endif
  </ul>
  <div class="card-block">
    <a href="locationMostrar?id={{ $events->location_id }}" onClick="window.open('locationMostrar?id={{ $events->location_id }}','Mapa Evento','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=500,height=500'); return false;" class="card-link">Local</a>

  </div>
</div>
@endsection