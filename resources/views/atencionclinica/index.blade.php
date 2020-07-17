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
                <input type="hidden" name="detalleatencion" value="{{ $paciente->id }}">
                <button type="submit" class="btn btn-primary btn-sm">Triaje</button>
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

