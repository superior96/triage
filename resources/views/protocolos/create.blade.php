@extends("layouts.plantillaSalas")

@section("cabecera")
    
@endsection

@section("cuerpo")
<form method="POST" action="/protocolos">
  @csrf

  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputEmail4">Descripción</label>
      <input type="text" autocomplete="on" name="desc"  class="form-control" placeholder="Nombre">
    </div>
    <div class="form-group col-md-2">
      <label for="inputState">Código</label>
      <select name="codigo" id="inputState" class="form-control">
        @foreach($codigos as $codigo)
          <option value="{{$codigo->id}}">{{$codigo->color}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <label for="inputEmail4">Síntomas</label>
  <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
      <th class="th-sm">Descripción</th>
      <th class="th-sm">Acción</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sintomas as $sintoma)
    <tr>
      <td>{{$sintoma->descripcion}}</td>
      <td><input class="form-check-input position-static" type="checkbox" name="cbs[]" value="{{$sintoma->id}}"></td>
    </tr>
    @endforeach
  </tbody>
  </table>

  <button type="submit" class="btn btn-primary">Registrar</button>
  <a class="btn btn-default btn-close" href="{{ route('protocolos.index') }}">Volver</a>


  {{--Mensaje--}}
  

  <div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="{{ route('protocolos.index') }}" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
  </div>

</form>
@endsection
