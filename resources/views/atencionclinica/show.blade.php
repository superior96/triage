@extends("layouts.plantilla")



@section("cuerpo")

<div class="form-row">
  <div class="form-group col-md-2">
        <label for="inputState">Área</label>
        <select name="area" id="area" class="form-control">
          <option value="Todas" selected>Todas</option>

              @foreach($areas as $area)
                @if($area->tipo_dato == $val1)
                  <option value="{{$area->tipo_dato}}" selected>{{$area->tipo_dato}}</option>
                @else
                  <option value="{{$area->tipo_dato}}">{{$area->tipo_dato}}</option>
                @endif
              @endforeach
        </select>
    </div>
    <div class="form-group col-md-2">
        <label for="inputState">Especialidades</label>
        <select name="esp" id="esp" class="form-control">
          <option value="Todas" selected>Todas</option>
              @foreach($especialidades as $esp)
                  <option value="{{ $esp->nombre }}">{{ $esp->nombre }}</option>
              @endforeach
        </select>
    </div>
</div>


    <form class="form-inline" method="GET" action="/atencionclinica">
      {{-- <input type="hidden" name="id_med" value="<?php echo $id_medicoAux?>"> --}}
      <button type="submit" class="btn btn-dark btn-sm">Refresh</button>
    </form>
    <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">Apellido</th>
          <th scope="col">Fecha</th>
          <th scope="col">Especialidad</th>
          <th scope="col">Area</th>
          <th scope="col" class="col-md-2">Accion</th>
          
        </tr>
      </thead>
      <tbody id="tabla">
        @foreach($pacientes as $paciente)
        <tr>
          <td>{{ $paciente->nombre }}</td>
          <td> {{ $paciente->apellido }}</td>
         
          <td>{{ $paciente->fecha }}</td>
          <td> {{ $paciente->especialidad }}</td>
          <td>{{ $paciente->tipo_dato }}</td>
          <td>
          <div class="form-row">
             <form class= "form-inline" action="{{route('atencionclinica.show',$paciente->id_atencion)}}" method="GET">
                @if($paciente->id_atencion != $id)
                  <input type="hidden" name="detalleatencion" value="{{ $paciente->id }}">
                  <button type="submit" class="btn btn-primary btn-sm">Triaje</button>
                @else
                  <button type="submit" class="btn btn-primary btn-sm" disabled>Triaje</button>
                @endif
             </form>
             <button type="submit" class="btn btn-primary btn-sm">Editar</button>
          </div>
         
          
          </td>
        </tr>
        
        @endforeach
      </tbody>
    </table>
<script>
  $('select').on('change', function() {
    if($('#esp').val() == 'Todas' && $('#area').val()=='Todas'){
      $("#tabla tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf($('#esp').val().toLowerCase()) == -1 &&
           $(this).text().toLowerCase().indexOf($('#area').val().toLowerCase()) == -1 )
        });
    }else if($('#esp').val() != 'Todas' && $('#area').val() == 'Todas'){
      $("#tabla tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf($('#esp').val().toLowerCase()) > -1 &&
            $(this).text().toLowerCase().indexOf($('#area').val().toLowerCase()) == -1
            )
        });
    }else if($('#esp').val() == 'Todas' && $('#area').val() != 'Todas'){
      $("#tabla tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf($('#esp').val().toLowerCase()) == -1 &&
            $(this).text().toLowerCase().indexOf($('#area').val().toLowerCase()) > -1
            )
        });
    }else if($('#esp').val() != 'Todas' && $('#area').val() != 'Todas'){
      $("#tabla tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf($('#esp').val().toLowerCase()) > -1 &&
            $(this).text().toLowerCase().indexOf($('#area').val().toLowerCase()) > -1
            )
        });
    }
    
    
    

    }).trigger('change');

  $("#name").change(function(){
    if($("#name").val()=="basic")
      $("#area option").not("[value^='basic']").hide();
    else
      $("#subscription_interval option").not("[value^='basic']").show();
    });

</script>

@endsection
@section("pie")


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Formulario</div>
                    <div class="card-body">
                      <H4> Sintomas descripto</H4>
                        <ul class="list-group">
                          @foreach($preguntas as $pregunta)
                              <li class="list-group-item">{{ $pregunta->descripcion }}</li>
                          @endforeach
                        </ul>
                        
                          <div class="form-group">
                            <H4> Historial</H4>

                            <input type="text" name="search" placeholder="Filtrar" class="form-control col-md-4">
                            <div class="table-responsive">
                              <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                      <th scope="col col-md-2">CIE</th>
                                      <th scope="col col-md-2">Descripcion CIE</th>
                                      <th scope="col">Observacion</th>
                                     
                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @foreach($historial as $h)
                                    <tr>
                                      <td>{{ $h->codigo }}</td>
                                      <td>{{ $h->descripcion }}</td>
                                      <td>{{ $h->observacion }}</td>
                                    @endforeach
                                  </tr>
                                  </tbody>
                                
                              </table>
                            </div>
                              
                            </div>
                         
                       
                        <form method="POST" action="/atencionclinica">
                          @csrf
                          
                          <input type="hidden" name="detalleatencion1" value="{{ $detalleatencion }}">
                          <input type="hidden" name="atencion" value={{ $id }}>
                          <h4>Preguntas y Analisis</h4>
                          <div class="row">
                            <div class="col">
                              
                              <textarea class="form-control" id="descrito" name="descrito" rows="3"></textarea>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-2">
                              <label for="exampleFormControlTextarea1">CIE</label>
                              <input type="text" name="cie" id="cie" class="form-control">
                            </div>
                            <div class="col-md-2">
                              <label for="exampleFormControlTextarea1">Codigo del Triaje</label>
                              <select id="inputState" name="color" class="form-control">
                                @foreach($codigos as $c)
                                  <option value="{{ $c->color }}">{{ $c->color }}</option>
                                @endforeach
                                
                                
                              </select>
                            </div>
                          </div>
                          <br>
                          <div class="row">
                            <div class="col">
                              <label for="exampleFormControlTextarea1">Desea agregar alguna observacion?</label>
                              <textarea class="form-control" type="text" id="observacion" name="observacion" rows="3"></textarea>
                            </div>
                          </div>
                          <br>
                          <label for="exampleFormControlTextarea1">Que desea hacer?</label>
                          <div class="row">
                            <div class="form-check">
                            <label><input class="form-check-input position-static" type="radio" name="internar" id="blankRadio1" value="Internar" aria-label="..."> Internarlo</label>
                            </div>
                            <div class="form-check">
                              <label><input class="form-check-input position-static" type="radio" name="internar" id="blankRadio2" value="Operar" aria-label="..."> Operar</label>
                            </div>
                            <div class="form-check">
                              <label><input class="form-check-input position-static" type="radio" name="internar" id="blankRadio2" value="Shock Room" aria-label="...">Shock Room</label>
                            </div>
                            <div class="form-check">
                              <label><input class="form-check-input position-static" type="radio" name="internar" id="blankRadio2" value="alta" aria-label="..."> Dar de alta</label>
                            </div>
                          </div>
                          <br>
                          <button type="submit" class="btn btn-success">Finalizar</button>
                          <button type="submit" class="btn btn-success">Continuar Luego</button>
                          
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    cie=<?php echo $cie ?>;
    var availableTags=[];
    for(let i=0; i<cie.length;i++){
      availableTags.push(cie[i].codigo+"-"+cie[i].descripcion);
    }
    
    $( "#cie" ).autocomplete({
      source: availableTags
    });
  

  } );
 
  
 </script>

@endsection
