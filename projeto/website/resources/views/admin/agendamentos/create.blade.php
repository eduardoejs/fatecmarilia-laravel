@extends('layouts.areaRestrict')

@section('css')
@parent
<!-- Bootstrap -->
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
   <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />

@endsection

@section('page-title', 'Menu Agendamento') 
@section('x-title', 'Cadastrar novo agendamento') 

@section('conteudo')
		@if (session('status'))
		    <div class="alert alert-error" role="alert">
		        {{ session('status') }}
		    </div>
		@endif
    {!! Form::open(['route'=>'admin.agendamentos.store']) !!}                            
        @include('admin.agendamentos._form')
        {!! Form::submit('Agendar', ['class'=>'btn btn-primary']) !!}
        <a href="{{route('admin.agendamentos.index')}}" class='btn btn-default'>Voltar</a>
    {!! Form::close() !!} 
@endsection

@section('scripts')
@parent
<script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>


    <!-- bootstrap-daterangepicker -->
    <script>
      $(document).ready(function() {  
      	
      	var minDate = new Date();		
		minDate.setDate(minDate.getDate() + 1);

        $('#datepicker').daterangepicker({
		    "singleDatePicker": true,
		    "locale": {
		        "format": "DD/MM/YYYY",
		        "separator": " - ",
		        "applyLabel": "Apply",
		        "cancelLabel": "Cancel",
		        "fromLabel": "From",
		        "toLabel": "To",
		        "customRangeLabel": "Custom",
		        "weekLabel": "W",
		        "daysOfWeek": [
		            "Dom",
		            "Seg",
		            "Ter",
		            "Qua",
		            "Qui",
		            "Sex",
		            "Sab"
		        ],
		        "monthNames": [
		            "Janeiro",
		            "Fevereiro",
		            "Março",
		            "Abril",
		            "Maio",
		            "Junho",
		            "Julho",
		            "Agosto",
		            "Setembro",
		            "Outubro",
		            "Novembro",
		            "Dezembro"
		        ],
		        "firstDay": 1
		    },    
		    "minDate": minDate
		}, function(start, end, label) {
		  console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
		});
      });
    </script>
    <!-- /bootstrap-daterangepicker -->

    <script type="text/javascript">
	    $(document).ready(function() {  
		    
			window.onload = function(){
				$('#datepicker').change();
			}

			//testar qdo o campo data estiver vazio, se sim setar data atual para a busca

		    $('#datepicker').change(function() {
		    	
		    	var data = $('#datepicker');		    	
		    	var agenda = $('#agenda');
		    	var periodo = $('#periodo');
		    			    	
		    	$.get("check/" + data.val().replace(/\//g, '-') + "/" + periodo.val() + "/" + agenda.val(), function(agendamentos){
		    		
		    		$( "#aula1" ).prop( "disabled", false );
    				$( "#aula1" ).prop( "checked", false );
    				$( "#aula2" ).prop( "disabled", false );
    				$( "#aula2" ).prop( "checked", false );
    				$( "#aula3" ).prop( "disabled", false );
    				$( "#aula3" ).prop( "checked", false );
    				$( "#aula4" ).prop( "disabled", false );
    				$( "#aula4" ).prop( "checked", false );
    				$( "#aula5" ).prop( "disabled", false );
    				$( "#aula5" ).prop( "checked", false );
    				
		    		$.each(agendamentos, function(key,value){
		    			if(agendamentos.aula1 == "1"){
		    				$( "#aula1" ).prop( "disabled", true );
		    				$( "#aula1" ).prop( "checked", true );		    				
		    			}
		    			else{
		    				$( "#aula1" ).prop( "disabled", false );
		    				$( "#aula1" ).prop( "checked", false );		    				
		    			}

		    			if(agendamentos.aula2 == "1"){
		    				$( "#aula2" ).prop( "disabled", true );
		    				$( "#aula2" ).prop( "checked", true );		    				
		    			}
		    			else{
		    				$( "#aula2" ).prop( "disabled", false );
		    				$( "#aula2" ).prop( "checked", false );		    				
		    			}
		    			
		    			if(agendamentos.aula3 == "1"){
		    				$( "#aula3" ).prop( "disabled", true );
		    				$( "#aula3" ).prop( "checked", true );		    				
		    			}
		    			else{
		    				$( "#aula3" ).prop( "disabled", false );
		    				$( "#aula3" ).prop( "checked", false );		    				
		    			}
		    			
		    			if(agendamentos.aula4 == "1"){
		    				$( "#aula4" ).prop( "disabled", true );
		    				$( "#aula4" ).prop( "checked", true );		    				
		    			}
		    			else{
		    				$( "#aula4" ).prop( "disabled", false );
		    				$( "#aula4" ).prop( "checked", false );		    				
		    			}
		    			
		    			if(agendamentos.aula5 == "1"){
		    				$( "#aula5" ).prop( "disabled", true );
		    				$( "#aula5" ).prop( "checked", true );		    				
		    			}
		    			else{
		    				$( "#aula5" ).prop( "disabled", false );
		    				$( "#aula5" ).prop( "checked", false );		    				
		    			}   			
		    		});
		    	});
			});
		});
	</script>
@endsection