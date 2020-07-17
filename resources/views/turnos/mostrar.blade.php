@extends("layouts.plantilla")

@section("cuerpo")

<div class="form-row">
  {{-- <div class="form-group col-md-2">
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
    </div> --}}
    <div class="form-group col-md-2">
        <label for="inputState">Condicion</label>
        <select name="cod" id="cod" class="form-control">
          <option value="Todas" selected>Todas</option>
          <option value="Operar">Operar</option>
          <option value="Internar" >Internar</option>

          <option value="Shock Room">Shoock Room</option>
          <option value="consulta" >Consulta</option>
          <option value="Internado" >Internado</option>
          <option value="Internado" >Operado</option>

        </select>
    </div>
</div>
<label for="inputState">Pacientes</label>
<table class="table table-bordered">
  <thead class="thead-dark">
          <tr>
              <th scope="col" class="col-md-2">Nombre y Apellido </th>
              <th scope="col" class="col-md-2">Fecha y hora</th>
              <th scope="col" class="col-md-2">Area</th>
              <th scope="col" class="col-md-2">Especialidad</th>
              <th scope="col" class="col-md-2">Condicion</th>
              <th scope="col" class="col-md-6">Observacion</th>
              <th scope="col" class="col-md-2">Sala</th>  
          </tr>
  </thead>
  <tbody id="tabla">
    @foreach($pacientes as $p)
    <tr>
      <td> {{ $p->nombre }} {{ $p->apellido }}</td>
      <td> {{ $p->fecha }} {{ $p->hora }}</td>
      <td> {{ $p->tipo_dato }}</td>
      <td> {{ $p->especialidad}} </td>
      <td> {{ $p->estado }}</td>
      <td>
        @foreach($historial as $h)
          @if($h->id_detalle_atencion == $p->id)
            CIE:{{ $h->codigo }}-{{ $h->descripcion }}
            <br>
            {{ $h->observacion }}

          @endif
        @endforeach
      </td>
      <td>
        @if($p->estado != "consulta" && $p->estado!= "alta" && $p->estado !="Internado" && $p->estado != "Operado")
            <!-- Button trigger modal -->

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{ $p->id }}">
              Asignar sala
            </button>


          <!-- Modal -->
          <div class="modal fade" id="exampleModal{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Salas</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="row col-md-10">
                      <div class="form-group">
                          <div class="table">
                            <table class="table">
                              
                              @foreach($salas as $s)
                                @if($p->estado == "Internar")
                                  @if($s->tipo_dato == "Internacion")

                                  <tr>
                                    <form method="POST" action="/turnos">
                                       @csrf

                                    <td><label >{{ $s->nombre}}</label></td>
                                    <input type="hidden" name="sala" value="{{ $s->nombre }}">
                                    <input type="hidden" name="detalleatencion" value="{{ $p->id }}">
                                    <input type="hidden" name="id_sala" value={{ $s->id }}>
                                    <input type="hidden" name="tipo" value="Internado">
                                    @if($s->disponibilidad==1)

                                      <td><label>Disponible</label></td>
                                      <td><button type="submit" id="add" name="add" class="btn btn-success">Asignar esta sala</button></td>
                                    @else
                                      <td><label>No disponible</label></td>
                                      <td><button type="submit" id="add" name="add" class="btn btn-success" disabled>Asignar esta sala</button></td>

                                    @endif
                                    </form>
                                  </tr>
                                  @endif
                                @else
                                      @if($s->tipo_dato == "Quirofano")
                                      <tr>
                                        <form method="POST" action="/turnos">
                                           @csrf
                                        <td><label >{{ $s->nombre}}</label></td>
                                        <input type="hidden" name="sala" value="{{ $s->nombre }}">
                                        <input type="hidden" name="detalleatencion" value="{{ $p->id }}">
                                        <input type="hidden" name="id_sala" value={{ $s->id }}>
                                        <input type="hidden" name="tipo" value="Operado">
                                        @if($s->disponibilidad==1)

                                          <td><label>Disponible</label></td>
                                          <td><button type="submit" id="add" name="add" class="btn btn-success">Asignar esta sala</button></td>
                                        @else
                                          <td><label>No disponible</label></td>
                                          <td><button type="submit" id="add" name="add" class="btn btn-success" disabled>Asignar esta sala</button></td>

                                        @endif
                                        </form>
                                      </tr>
                                      @endif
                                @endif
                              @endforeach
                            </table>
                            
                          </div>
                        
                      </div>
                      
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                
                </div>
              </div>
            </div>
          </div>
        @else
          @if($p->estado != "consulta")
            {{ $p->sala }}
          @endif

        @endif
      </td>
     
    </tr>


    @endforeach
  </tbody>
 
</table>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script >
  $('#myModal').on('shown.bs.modal', function () {
   $('#myInput').focus()
})
</script>




<script>
  $("form").submit( function() {
      // $(this).append('<input type="hidden" name="n" value="cualquiercosa"\>');
      // $(this).append('<input type="hidden" name="a" value="cualquiercosa"\>');
    
    
      $("<input />").attr("type", "hidden")
        .attr("name", "a")
        .attr("value", $('#area').val())
        .appendTo("form");
      $("<input />").attr("type", "hidden")
        .attr("name", "m")
        .attr("value", $('#esp').val())
        .appendTo("form");
        return true;
    
  });

</script>

<script>
  $('select').on('change', function() {
    if($('#cod').val() == 'Todas'){
     
      $("#tabla tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf($('#cod').val().toLowerCase()) == -1)
        });
    }else{
      $("#tabla tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf($('#cod').val().toLowerCase()) > -1)
        });
    
    // }else if($('#area').val() == 'Todas' && $('#me').val() != 'Todas' ){
    //   $("#tabla tr").filter(function() {
    //       $(this).toggle($(this).text().toLowerCase().indexOf($('#area').val().toLowerCase()) == -1 && $(this).text().toLowerCase().indexOf($('#me').val().toLowerCase()) > -1)
    //     });

    // }else if($('#area').val() != 'Todas' && $('#me').val() != 'Todas' ){
    //   $("#tabla tr").filter(function() {
    //       $(this).toggle($(this).text().toLowerCase().indexOf($('#area').val().toLowerCase()) > -1 && $(this).text().toLowerCase().indexOf($('#me').val().toLowerCase()) > -1)
    //     });

    }


    // {$("#tabla tr").filter(function() {
    //       $(this).toggle($(this).text().toLowerCase().indexOf($('#area').val().toLowerCase()) > -1 )
    //     });}

    // if($('#me').val()!= 'Todas'){
    //   $("#tabla tr").filter(function() {
    //       $(this).toggle($(this).text().toLowerCase().indexOf($('#me').val().toLowerCase()) > -1 )
    //     });
    // }
    

    }).trigger('change');

  // $("#name").change(function(){
  //   if($("#name").val()=="basic")
  //     $("#area option").not("[value^='basic']").hide();
  //   else
  //     $("#subscription_interval option").not("[value^='basic']").show();
  //   });

</script>

@endsection