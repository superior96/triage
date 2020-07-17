@extends("layouts.plantilla")



@section("cuerpo")

	
      {{-- <button type="submit" class="btn btn-dark">Agregar</button> --}}
     <a class="btn btn-dark" href="{{ route('sintomas.create') }}">Agregar</a>
     <table class="table table-bordered">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="col-md-1">#</th>
          <th scope="col" class="col-md-4">Sintomas</th>
          <th scope="col" class="col-md-1" >Accion</th>
        </tr>
      </thead>
      <tbody>
       @foreach($sintomas as $sintoma)
       		<tr>
       			<form class= "form-inline" method="POST" action="/sintomas/{{ $sintoma->id }} ">
       				@csrf
       				{{ method_field('DELETE') }}
	       			<td>{{ $sintoma->id }}</td>
	       			<td>{{ $sintoma->descripcion }}</td>
	       			<td><button type="submit" class="btn btn-danger">Eliminar</button></td>
       			</form>
       		</tr>


       @endforeach
      </tbody>
    </table>

    


@endsection