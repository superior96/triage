@extends("layouts.plantilla")

@section("cabecera")
    
@endsection

@section("cuerpo")
{{--    PARA AUTOCOMPLETE INPUT
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
--}}

<div class="form-row">
  <div class="form-group col-md-2">
    <input id="auto" placeholder="Buscar" class="form-control" onkeyup="myFunction()" name="doc" type="text">
  </div>
  <div class="form-group col-md-1.5">
    <select id="picker" class="form-control">
      <option value="2" hidden>Filtrar por</option>
      <option value="2">Documento</option>      
      <option value="0">Apellido</option>	          		
      <option value="1">Nombre</option>
    </select>
  </div>
</div>
<div class="form-row">
  <div class="form-group col-md-2">
    <form class= "form-inline" method="get" action="/pacientes/create ">
      <button type="submit" class="btn btn-success">Registrar</button>
    </form>
  </div>
</div>

<br>

<table id="myTable" class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Apellido</th>
      <th scope="col">Nombre</th>
      <th scope="col">DNI</th>
      <th scope="col">Telefono</th>
      <th scope="col">Fecha Nacimiento</th>
      <th scope="col">Sexo</th>      
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
      @foreach($pacientes as $paciente)
        <tr>
          <td><strong>{{ $paciente->apellido }}</strong></td>
          <td>{{ $paciente->nombre }}</td>
          <td>{{ $paciente->dni }}</td>
          <td>{{ $paciente->telefono }}</td>
          <td>{{ $paciente->fechaNac }}</td>
          <td>{{ $paciente->sexo }}</td>
          <td>
            <div class="form-row">
             <form class= "form-inline" action="{{route('triagepreguntas.show',$paciente->Paciente_id)}}" method="GET">
                <button type="submit" class="btn btn-primary btn-sm">Triaje</button>
              </form>
              <form class= "form-inline"  method="get">
                <button type="button" class="btn btn-warning btn-sm">Editar</button>
              </form>
              <form class= "form-inline"  method="get">
                <button type="button" class="btn btn-danger btn-sm">Eliminar</button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table> 
  
<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("auto");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[parseInt($('#picker').val())];
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
// $('.picker').selectpicker({noneSelectedText: 'Insert Placeholder text'});  
// $( function() {
//   pacientes=<?php echo $pacientes ?>;
//   var availableTags=[];
//   for(let i=0; i<pacientes.length;i++){
//     availableTags.push(pacientes[i].apellido);
//   }
  
//   $( "#auto" ).autocomplete({
//     source: availableTags
//   });
// });
</script>


@endsection

@section("pie")
    
@endsection