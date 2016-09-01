@extends('layouts.app')

@section('content')
 <script src="/assets/bootstrap/js/jquery.mask.js"></script>




            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="foodtruckersCadastrar" method="POST" role="form">
               
                
                <div class="form-group">
                     <legend>Cadastro Food Truck</legend>
                    <div class="input-group">
                        <label for="fileToUpload">Logo do Food Truck</label>
                        <input type="file" name="image" id="filesToUpload" required="required"/>
                        <output id="filesInfo"></output>
                        <script type="text/javascript" src="assets/bootstrap/file.js"></script>
                    </div>    
                    <div class="input-group">
                       
                        <label>Local</label>
                        <select type="text" name="location_id" id="location_id" class="form-control" required="required">
                            @foreach($locations as $location)
                                <option value="{{ $location->id}}">{{ $location->name }}</option>
                            option
                            @endforeach
                        </select>
                        <label>Nome do Food Truck</label>
                        <input type="text" name="name"  class="form-control" required="required"/>
                        

                       
                        <label>Telefone</label>
                        <input type="tel" name="tell" id="txttelefone" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" class="form-control" required="required"/>
                        <script type="text/javascript">$("#txttelefone").mask("(00) 0000-00009");</script>
                    
                    </div>
                    
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                </div>
            
              
        
            
            
            
    
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
            </section>
        
        
@endsection
 




