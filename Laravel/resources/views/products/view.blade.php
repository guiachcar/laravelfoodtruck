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
@if($user->id == $menus[0]->user_id)
	<p><a class="btn btn-success btn-lg" href="productsEDIT?id={{ $product->id }}" role="button">Editar</a></p>
@endif

 	<img class="card-img-top" src="{{ $product->image}}" alt="{{ $product->name }}">
  	<div class="card-block">
    <h4 class="card-title">{{ $product->name }}</h4>
    <p class="card-text">Descrição: <br>{{ $product->description }}</p>
  	</div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Valor: {{ $product->valor }}</li>
  </ul>
  <div class="card-block">
 
  </div>
</div>
@endsection