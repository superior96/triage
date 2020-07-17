@extends("layouts.plantilla")

@section("cabecera")
    
@endsection

@section("cuerpo")

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if(Session::has('alert-' . $msg))
        <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
        @endif
    @endforeach
</div>

<form method="POST" action="/profesionales">
  @csrf
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="inputEmail4">Nombre</label>
            <input type="text" name="nombre" class="form-control" placeholder="Nombre">
        </div>
        <div class="form-group col-md-4">
            <label for="inputEmail4">Apellido</label>
            <input type="text" name="apellido" class="form-control" placeholder="Apellido">
        </div>
        <div class="form-group col-md-4">
            <label for="inputZip">Matrícula</label>
            <input type="number" name="matricula" class="form-control" id="inputZip" placeholder="Número de Documento">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-8">
            <label for="inputAddress">Domicilio</label>
            <input type="text" name="domicilio" class="form-control" id="inputAddress" placeholder="Dirección">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Registrar</button>
    <a class="btn btn-default btn-close" href="{{ route('profesionales.index') }}">Volver</a>
</form>



@endsection
