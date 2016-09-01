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
<div class="card" align="center">
  @if($user->id == $foodtruckers->user_id)
	<p><a class="btn btn-success btn-lg" href="foodtruckersEDIT?id={{ $foodtruckers->id }}" role="button">Editar</a></p>
  @endif
 	<img class="card-img-top" src="{{ $foodtruckers->image}}" alt="{{ $foodtruckers->name }}">
  	<div class="card-block">
    <h4 class="card-title">{{ $foodtruckers->name }}</h4>
    <p class="card-text">Telefone: <br>{{ $foodtruckers->tell }}</p>
  	</div>
  <ul class="list-group list-group-flush">

    <li class="list-group-item">Info</li>
  </ul>
  <div class="card-block">
  <a href="locationMostrar?id={{ $foodtruckers->location_id }}" onClick="window.open('locationMostrar?id={{ $foodtruckers->location_id }}','Mapa Evento','toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width=500,height=500'); return false;" class="card-link">Local</a>

  </div>
  
</div>
@endsection