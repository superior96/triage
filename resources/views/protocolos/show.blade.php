@extends("layouts.plantilla")

@section("cabecera")
    
@endsection

@section("cuerpo")

<div class="form-row">
	<div class="form-group col-md-2">
		<a class="btn btn-dark" href="{{ route('protocolos.index') }}">Volver</a>
	</div>
</div>
<table id="dtBasicExample" class="table" cellspacing="0" width="100%">
	<thead class="thead-dark">
		<tr>
			<th scope="col" style="width:20%">Protocolo</th>
			<th scope="col" style="width:30%">Código</th>
		</tr>
	</thead>
	<tbody id="tabla">
	@foreach($sintomas_protocolo as $sp)
		<tr>
			<td>{{ $protocolo->descripcion }}</td>
			<td>{{ $sp->descripcion }}</td>
		</tr>
	@endforeach
	</tbody>
</table>

@endsection

@section("pie")
    
@endsection