@extends("layouts.plantilla")

@section("cabecera")
    
@endsection

@section("cuerpo")
<!-- Para Modal -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))

      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<div class="form-row">
	<div class="form-group col-md-2">
		<a class="btn btn-dark" href="{{ route('usuarios.create') }}">Registrar Usuario</a>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-2">
		<input class="form-control" type="text" id="myInput" onkeyup="myFunction()" placeholder="Nombre" title="Introduzca el nombre del protocolo">
	</div>
</div>
<div class="table-responsive">
  
	<table id="myTable" class="table" cellspacing="0" width="100%">
		<thead class="thead-dark">
			<tr>
				<th scope="col" style="width:20%">Usuario</th>
				<th scope="col" style="width:15%">Estado</th>
				<th scope="col" style="width:30%">Email</th>
				<th scope="col" style="width:20%">Rol</th>
				<th scope="col" style="width:15%">Acción<nav></nav></th>
			</tr>
		</thead>
		<tbody id="tabla">
			@foreach($usuarios as $usuario)
			<tr>
				<td>{{ $usuario->username }}</td>
				<td>
				@if( $usuario->isOnline() )
					<li class="text-success">Online</li>
				@else
					<li class="text-muted">Offline</li>
				@endif
				</td>				
				<td>{{ $usuario->email }}</td>
				<td>{{ $usuario->rol->nombre }}</td>
				<td>
					<div class="form-row">
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-dark btn-sm" data-toggle="modal" data-target="#exampleModalCenter{{$usuario->id}}">Ver</button>
						<!-- Modal -->
						<div class="modal fade" id="exampleModalCenter{{$usuario->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
							<div class="modal-dialog modal-dialog-centered" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="exampleModalLongTitle">Datos de Usuario</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">&times;</span>
										</button>
									</div>
									<div class="modal-body">
										@if($usuario->profesional)
											<div class="col-md-4 text-md-right">
												<h5>Nombre:</h5>			
											</div>
											<div class="col-md-6">
												<h5>{{$usuario->profesional->nombre}}</h5>		
											</div>
											<div class="col-md-4 text-md-right">
												<h5>Apellido:</h5>			
											</div>
											<div class="col-md-6">
												<h5>{{$usuario->profesional->apellido}}</h5>		
											</div>
											<div class="col-md-4 text-md-right">
												<h5>Domicilio:</h5>			
											</div>
											<div class="col-md-6">
												<h5>{{$usuario->profesional->domicilio}}</h5>		
											</div>
										@else
										<h5>No hay más datos para este usuario</h5>
										@endif
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
						</div>
						<form id="a2" name="{{$usuario->username}}" action="usuarios/{{$usuario->id}}" method="post">
							@csrf
							{{method_field('DELETE')}}
							@if(Auth::id()==$usuario->id)
								<button type="submit" class="btn btn-danger btn-sm" value="{{$usuario->id}}" disabled>Eliminar</button>
							@else
								<button type="submit" class="btn btn-danger btn-sm" value="{{$usuario->id}}">Eliminar</button>
							@endif
						</form>
					</div>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>






<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<script>
$('form[id^="a2"').submit( function() {
	if (confirm('Por favor, confirme que desea eliminar al usuario '.concat($(this).attr('name')))) {
		return true;
	}else{
		return false;
	}
});
</script>

@endsection

@section("pie")
    
@endsection