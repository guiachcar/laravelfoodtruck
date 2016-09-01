@extends('layouts.app')

@section('content')


            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="menusEditar" method="POST" role="form">
               
                
                <div class="form-group">
                     <legend>Cadastro Evento</legend>
                  
                        <label>Nome do Cardápio</label>
                        <input type="text" name="name" value="{{ $menus->name}}" class="form-control"/>
                    </div>
                    <label for="description">Descrição:</label>
                      <textarea name="description" class="form-control" rows="5" id="description">{{ $menus->description}}</textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                     <input type="hidden" name="foodtrucker_id" value="{{ $menus->foodtrucker_id}}"> 
                     <input type="hidden" name="id" value="{{ $menus->id}}"> 
                </div>

                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
            </section>
        
        
@endsection
 




