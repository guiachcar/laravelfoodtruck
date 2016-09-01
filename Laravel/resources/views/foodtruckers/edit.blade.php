@extends('layouts.app')

@section('content')
 <script src="/assets/bootstrap/js/jquery.mask.js"></script>



            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="foodtruckersEditar" method="POST" role="form">
               
                
                <div class="form-group">
                    <legend>Cadastro Food Truck</legend>
                    <img src="{{ $foodtrucker->image}}" width='120' height='120'/>
                    <div class="input-group">
                        <label for="fileToUpload">Logo do Food Truck</label>
                        <input type="file" name="image" id="filesToUpload"/>
                        <output id="filesInfo"></output>
                        <script type="text/javascript" src="assets/bootstrap/file.js"></script>
                    </div>    
                    <div class="input-group">
                       
                        <label>Local</label>
                        <select type="text" name="location_id" id="location_id" class="form-control" >
                            @foreach($locations as $location)
                                @if ($location->id == $foodtrucker->location_id)
                                    <option value="{{ $location->id}}" selected="selected">{{ $location->name }}</option>
                                @else
                                <option value="{{ $location->id}}">{{ $location->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>Nome do Food Truck</label>
                        <input type="text" name="name" value="{{ $foodtrucker->name}}" class="form-control"/>
                        

                       
                        <label>Telefone</label>
                        <input type="tel" name="tell" id="txttelefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" value="{{ $foodtrucker->tell}}"/>
                        <script type="text/javascript">$("#txttelefone").mask("(00) 0000-00009");</script>
                    
                    </div>
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                    <input type="hidden" name="id" value="{{ $foodtrucker->id}}"> 
                </div>
            
              
        
            
            
            
    
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            </section>
        
        
@endsection
 




