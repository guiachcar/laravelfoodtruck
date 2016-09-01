@extends('layouts.app')

@section('content')




            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="menusCadastrar" method="POST" role="form">
               
                
                <div class="form-group">
                     <legend>Cadastro de Cardápios</legend>
                    
                    <div class="input-group">
                      

                       
                        <label>Nome do Cardápio</label>
                        <input type="text" name="name"  class="form-control"/>

                      <label for="description">Descrição:</label>
                      <textarea name="description" class="form-control" rows="5" id="description"></textarea>
                    </div>
                    <label>Food Truck</label>
                        <select type="text" name="foodtrucker_id" id="foodtrucker_id" class="form-control" >
                            @foreach($foodtruckers as $foodtrucker)
                                <option value="{{ $foodtrucker->id}}">{{ $foodtrucker->name }}</option>
                            option
                            @endforeach
                        </select>
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 

                </div>
          
            
    
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            </section>
        
        
@endsection
 




