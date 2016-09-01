@extends('layouts.app')

@section('content')
   
            <section style="padding: 10px 260px 30px;">
                
            
            <form enctype="multipart/form-data" action="eventsEditar" method="POST" role="form">
               
                
                <div class="form-group">
                     <legend>Cadastro Evento</legend>
                    <img src="{{ $event->image}}" width='120' height='120'/>
                    <div class="input-group">
                        <label for="fileToUpload">Trocar Imagem do Evento</label>
                        <input type="file" name="image" id="filesToUpload"/>
                        <output id="filesInfo"></output>
                        <script type="text/javascript" src="assets/bootstrap/file.js"></script>
                    </div>    
                    <div class="input-group">
                        <label >Data Inicio</label>
                        <input type="date" name="startDate" id="input" class="form-control" value="{{ $event->startDate}}" required="required" title="DataInicio" />
                    
                        <label >Hora Inicio</label>
                        <input type="time" name="startHour" id="input" class="form-control" value="{{ $event->startHour}}" required="required" title="DataInicio" />
                   
                        <label >Hora Fim</label>
                        <input type="time" name="endHour" id="input" class="form-control" value="{{ $event->endHour}}" required="required" title="DataInicio" />
                    
                        <label >Data fim</label>
                        <input type="date" name="endDate" id="inputDateEnd" class="form-control" value="{{ $event->endDate}}" required="required" title="DataFim" />

                        <label>Local (Verificar local)</label>
                        <select type="text" name="location_id" id="location_id" class="form-control" >
                            @foreach($locations as $location)
                                @if ($location->id == $event->location_id)
                                    <option value="{{ $location->id}}" selected="selected">{{ $location->name }}</option>
                                @else
                                <option value="{{ $location->id}}">{{ $location->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <label>Nome do Evento</label>
                        <input type="text" name="name" value="{{ $event->name}}" class="form-control"/>
                    </div>
                    <div class="form-group">
                      <label for="description">Descrição:</label>
                      <textarea name="description" class="form-control" rows="5" id="description">{{ $event->description}}</textarea>
                    </div>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                    <input type="hidden" name="user_id" value="{{ $user->id }}"> 
                     <input type="hidden" name="id" value="{{ $event->id}}"> 
                </div>
            
              
        
            
            
            
    
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
            </section>
        
        
@endsection
 




