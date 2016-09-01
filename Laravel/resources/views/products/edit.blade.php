@extends('layouts.app')

@section('content')




            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="productsEditar" method="POST" role="form">
               
                
                <div class="form-group">
                     <legend>Cadastro Evento</legend>
                    <img src="{{ $product->image}}" width='120' height='120'/>
                    <div class="input-group">
                        <label for="fileToUpload">Trocar Imagem do Produto</label>
                        <input type="file" name="image" id="filesToUpload"/>
                        <output id="filesInfo"></output>
                        <script type="text/javascript" src="assets/bootstrap/file.js"></script>
                    </div>    
                    <div class="input-group">
                        
                        <label>Cardápio</label>
                        <select type="text" name="menu_id" id="menu_id" class="form-control" >
                            @foreach($menus as $menu)
                                @if ($menu->id == $product->menu_id)
                                    <option value="{{ $menu->id}}" selected="selected">{{ $menu->name }}</option>
                                @else
                                    @if($menu->user_id == $user->id)
                                        <option value="{{ $menu->id}}">{{ $menu->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                        <label>Nome do Produto</label>
                        <input type="text" name="name" value="{{ $product->name}}" class="form-control"/>
                    </div>
                    <label>Valor do Produto</label>
                        <input type="decimal" name="valor" value="{{ $product->valor}}" class="form-control"/>
                    <div class="form-group">
                      <label for="description">Descrição:</label>
                      <textarea name="description" class="form-control" rows="5" id="description">{{ $product->description}}</textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                     <input type="hidden" name="id" value="{{ $product->id}}"> 
                </div>
            
              
        
            
            
            
    
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
            </section>
        
        
@endsection
 




