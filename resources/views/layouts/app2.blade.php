<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>MiTitulo</title>

	<!-- Boostrap css -->
	<!--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> 


	 <meta name="csrf-token" content="{{ csrf_token() }}">
	
	
	<!-- otro nuevoooo -->
	<!-- css y jss de full calendar -->
	<link href='{{ asset('fullcalendar/core/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('fullcalendar/daygrid/main.css') }}' rel='stylesheet' />

      <!-- stilos del full calendar -->
    <link href='{{ asset('fullcalendar/list/main.css') }}' rel='stylesheet' />
    <link href='{{ asset('fullcalendar/timegrid/main.css') }}' rel='stylesheet' />

    <script src='{{ asset('js/jquery.js') }}'></script>

    <script src='{{ asset('fullcalendar/core/main.js') }}'></script>
    <script src='{{ asset('fullcalendar/daygrid/main.js') }}'></script>

    <!-- Plug adicionales del full calendar -->
	<script src='{{ asset('fullcalendar/list/main.js') }}'></script>
    <script src='{{ asset('fullcalendar/timegrid/main.js') }}'></script>

    <script src='{{ asset('fullcalendar/interaction/main.js') }}'></script>

   <style type="text/css">
  
   </style>

    <script>

     

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        
        var calendar = new FullCalendar.Calendar(calendarEl, {
          plugins: [ 'dayGrid', 'interaction', 'timeGrid', 'list' ],
          //defaultView:'timeGridDay',
          header:{
          	left:'prev,next today',
          	center:'title',
          	right:'dayGridMonth, timeGridWeek, timeGridDay ',
          },
          dateClick:function(info){
            //console.log(info);
          	$('#textFecha').val(info.dateStr);
          	$('#exampleModal').modal();
           // info.dayEl.style.backgroundColor = 'red';
            //info.dayEl.classList.add("selectedDate");
        info.dayEl.className += ' selected';

          	//calendar.addEvent({title:"Evento x", date:info.dateStr});
            //info.dayEl.style.backgroundColor = 'red';
          },
         events:"{{ url('/calendario/show') }}",

        
     
            
            


        });
        //var days = document.querySelectorAll(".selectedDate");

        //info.dayEl.classList.add("selectedDate");

        

        calendar.setOption('locale','Es');

        calendar.render();

        $('#btnAgregar').click(function(){
        	objEvento=recolectarDatos("POST");
        	enviarDatos('',objEvento);
          //console.log(objEvento);
        	
        });

       

        function recolectarDatos(method){
        	nuevoEvento={
        		id_detalle_atencion:"1",
        		id_horarios:"1",
            title:$('#textTitulo').val(),
        		start:$('#textFecha').val()+" "+$('#inputHorario').val(),
        		end:$('#textFecha').val()+" "+$('#inputHorario').val(),
            descripcion:$('#textDescripcion').val(),
        		'_token':$("meta[name='csrf-token']").attr("content"),
        		'_method':method
        	}
        	return (nuevoEvento);
        };
        
        function enviarDatos(accion, objEvento){

         	$.ajax(
         		{	headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  },
         			type:"POST",
         			url:"{{ url('/calendario') }}"+accion,
         			data:objEvento,
         			success:function(msg){ 
                console.log(msg);
                $('#exampleModal').modal('toggle');
                calendar.refetchEvents();
              },
         			error:function(){ alert("Hya un error");}
         		}
         	);
         }
        	
	
      });
        

	</script>
	
      {{--   <script>
          function allSelectedDays() {
    //var days = $("#calendar table tbody td").css();
              var days = document.getElementsByClassName('selected');
              var selected = [];
              for (let i = 0; i < days.length; i++) {
                selected.push(days[i].getAttribute('data-date'));
                selected[i].dayEl.classList.add("selectedDate");
              }
              console.log(selected);
            }
        </script> --}}
    


</head>
<body>

	<div class="container">
		@include('layaout.navbar')
		
		@yield("content")
	</div>
	<div class="container">
		<hr>
		@yield("central")
	</div>



<!-- js de boostrap-->

<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" --><!--integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



</body>
</html>