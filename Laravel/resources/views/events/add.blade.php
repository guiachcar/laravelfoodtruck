@extends('layouts.app')

@section('content')


            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="eventsCadastrar" method="POST" role="form">
               
                
                <div class="form-group">
                     <legend>Cadastro Evento</legend>
                    <div class="input-group">
                        <label for="fileToUpload">Imagem do Evento</label>
                        <input type="file" name="image" id="filesToUpload" required="required" />
                        <output id="filesInfo"></output>
                        <script type="text/javascript" src="assets/bootstrap/file.js"></script>
                    </div>    
                    <div class="input-group">
                        <label >Data Inicio</label>
                        <input type="date" name="startDate" id="input" class="form-control" value="" required="required" title="DataInicio" />
                    
                        <label >Hora Inicio</label>
                        <input type="time" name="startHour" id="input" class="form-control" value="" required="required" title="DataInicio" />
                   
                        <label >Hora Fim</label>
                        <input type="time" name="endHour" id="input" class="form-control" value="" required="required" title="DataInicio" />
                    
                        <label >Data fim</label>
                        <input type="date" name="endDate" id="inputDateEnd" class="form-control" value="" required="required" title="DataFim" />

                        <label>Local</label>
                        <select type="text" name="location_id" id="location_id" class="form-control" required="required">
                            @foreach($locations as $location)
                                <option value="{{ $location->id}}">{{ $location->name }}</option>
                            option
                            @endforeach
                        </select>
                        <label>Food Truck Partcipante</label>
                        <select type="text" name="foodtrucker_id" id="foodtrucker_id" class="form-control" required="required" >
                            @foreach($foodtruckers as $foodtrucker)
                                <option value="{{ $foodtrucker->id}}">{{ $foodtrucker->name }}</option>
                            option
                            @endforeach
                        </select>
                        <label>Cardápio do Evento</label>
                        <select type="text" name="menu_id" id="menu_id" class="form-control" >
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id}}">{{ $menu->name }}</option>
                            option
                            @endforeach
                        </select>
                        <label>Nome do Evento</label>
                        <input type="text" name="name"  class="form-control"/>
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
 




