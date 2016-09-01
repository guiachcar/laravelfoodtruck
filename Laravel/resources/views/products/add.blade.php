@extends('layouts.app')

@section('content')



            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="productsCadastrar" method="POST" role="form">
               
                
                <div class="form-group">
                     <legend>Cadastro Produto</legend>
                    <div class="input-group">
                        <label for="fileToUpload">Imagem do Produto</label>
                        <input type="file" name="image" id="filesToUpload"/>
                        <output id="filesInfo"></output>
                        <script type="text/javascript" src="assets/bootstrap/file.js"></script>
                    </div>    
                    <div class="input-group">
                      

                        <label>Cardápio</label>
                        <select type="text" name="menu_id" id="menu_id" class="form-control" >
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id}}">{{ $menu->name }}</option>
                            option
                            @endforeach
                        </select>
                        <label>Nome do Produto</label>
                        <input type="text" name="name"  class="form-control"/>

                        <label>Valor do Produto</label>
                        <input type="decimal" name="valor"  class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="description">Descrição:</label>
                      <textarea name="description" class="form-control" rows="5" id="description"></textarea>
                    </div>
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                </div>
            
              
        
            
            
            
    
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            </section>
        
        
@endsection
 




