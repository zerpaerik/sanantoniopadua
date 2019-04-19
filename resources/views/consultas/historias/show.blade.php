@extends('layouts.app')
@section('content')
<div class="col-sm-4">
	<h2>Datos del paciente</h2>
	<p>Nombre: {{$data->nombres}} {{$data->apellidos}} </p>
	<p>DNI paciente: {{$data->dni}}</p>
	<p>Direccion del paciente: {{$data->direccion}}</p>
	<p>Telefono del paciente: {{$data->telefono}}</p>
	<p>Fecha de nacimiento: {{$data->fechanac}}</p>
	<p>Grado de isntruccion del paciente: {{$data->gradoinstruccion}}</p>
	<p>Ocupacion del paciente: {{$data->ocupacion}}</p>	
</div>	
<div class="col-sm-8">

	@if($historial)
	<h2>Historia Base de {{$data->nombres}} {{$data->apellidos}}</h2>
		<p>Alergias: {{$historial->alergias}}</p>
		<p>Antecedentes patologicos: {{$historial->antecedentes_patologicos}}</p>
		<p>Antecedentes Personales: {{$historial->antecedentes_personales}}</p>
		<p>Antecedentes Familiares: {{$historial->antecedentes_familiar}}</p>
    <p>Antecedentes Quirúrgicos: {{$historial->antecedentes_quirurgicos}}</p>
    <p>Antecedentes Traumáticos: {{$historial->antecedentes_traumaticos}}</p>
    <p>Antecedentes Genéticos: {{$historial->antecedentes_geneticos}}</p>
		<p>Menarquia: {{$historial->menarquia}}</p>
		<p>1º R.S : {{$historial->prs}}</p>

	@else
	
	@endif
</div>	

<br>
	
	<br>
		<div class="col-sm-12">
			<div class="rows">
				<h3 class="col-sm-12"><strong>Consulta del {{$consulta->created_at}}</strong></h3>
				<h3 class="col-sm-12">II. AMANESIS</h3>
        <p class="col-sm-6"><strong>Motivo de Consulta:</strong> {{ $consulta->motivo_consulta }}</p>
        <p class="col-sm-6"><strong>Tiempo de Enfermedad:</strong> {{ $consulta->tiempo_enf }}</p>
        <p class="col-sm-12"><strong>ANTECEDENTES MÉDICOS</strong></p>
        <p class="col-sm-6"><strong>Antecedentes Patológicos:</strong> {{$consulta->antecedentes_patologicos}}</p>
        <p class="col-sm-6"><strong>Antecedentes Personales:</strong> {{$consulta->antecedentes_personales}}</p>
        <p class="col-sm-6"><strong>Antecedentes Familiares:</strong> {{$consulta->antecedentes_familiar}}</p>
        <p class="col-sm-6"><strong>Antecedentes Quirúrgicos:</strong> {{$consulta->antecedentes_quirurgicos}}</p>
        <p class="col-sm-6"><strong>Antecedentes Traumáticos:</strong> {{$consulta->antecedentes_traumaticos}}</p>
        <p class="col-sm-6"><strong>Antecedentes Genéticos:</strong> {{$consulta->antecedentes_geneticos}}</p>
        <p class="col-sm-6"><strong>Alergias:</strong> {{$consulta->alergias}}</p>
        <br>
        <p class="col-sm-12"><strong>ANTECEDENTES GINECO - OBSTÉTRICOS</strong></p>
        <p class="col-sm-3"><strong>Menarquia:</strong> {{$consulta->menarquia}} años</p>
        <p class="col-sm-3"><strong>R/C:</strong> {{$consulta->pulso}}</p>
        <p class="col-sm-3"><strong>1º R.S:</strong> {{$consulta->prs}}</p>
        <p class="col-sm-3"><strong>Nº PS:</strong> {{$consulta->andria}}</p>
        <p class="col-sm-1"><strong>G:</strong> {{$consulta->g}}</p>
        <p class="col-sm-1"><strong>P:</strong> {{$consulta->p}}</p>
        <p class="col-sm-4"><strong>Fecha Últ. Emb.:</strong> {{$consulta->fechaemb}}</p>
        <p class="col-sm-3"><strong>RN> peso:</strong> {{$consulta->rnpeso}}</p>
        <p class="col-sm-3"><strong>FUR:</strong> {{$consulta->fur}}</p>
        <p class="col-sm-12"><strong>Anticonceptivo:</strong> {{$consulta->anticon}}</p>
        <p class="col-sm-3"><strong>Fecha Último PAP:</strong> {{$consulta->fecha}}</p>
        <p class="col-sm-3"><strong>Resultado:</strong> {{$consulta->result}}</p>
        <p class="col-sm-2"><strong>Grupo Sanguineo:</strong> {{$consulta->gsan}}</p>
        <p class="col-sm-12"><strong>Procesos Hemorrágicos (Parto/Aborto):</strong> {{$consulta->phpa}}</p>
        <p class="col-sm-6"><strong>Antecedentes de EPI:</strong> {{$consulta->antepi}}</p>
        <p class="col-sm-3"><strong>ETS:</strong> {{$consulta->ets}}</p>
        <p class="col-sm-6"><strong>OTROS:</strong> {{$consulta->etsotro}}</p>

        <h3 class="col-sm-12">III. EXAMEN FÍSICO/CLÍNICO</h3>
        <p class="col-sm-12"><strong>FUNCIONES VITALES</strong></p>
        <p class="col-sm-2"><strong>P/A:</strong> {{$consulta->pa}}</p>
        <p class="col-sm-2"><strong>Pulso:</strong> {{$consulta->card}}</p>
        <p class="col-sm-2"><strong>TºO:</strong> {{$consulta->temperatura}}</p>
        <p class="col-sm-2"><strong>SO<sub>3</sub>:</strong> {{$consulta->so3}}</p>
        <p class="col-sm-2"><strong>Peso:</strong> {{$consulta->peso}}</p>
        <p class="col-sm-2"><strong>Talla:</strong> {{$consulta->talla}}</p>
        <p class="col-sm-2"><strong>IMC:</strong> {{$consulta->imc}}</p>
        <br>
        <h3 class="col-sm-12">IV. DIAGNÓSTICO PRESUNTIVO:</h3>
        <p class="col-sm-6">{{ $consulta->presuncion_diagnostica }}</p>
        <p class="col-sm-6"><strong>CIEX Pres. Diag.:</strong> {{ $consulta->CIEX }}</p>
        <br>
        <h3 class="col-sm-12">V. EXÁMENES AUXILIARES</h3>
        <p class="col-sm-12">{{ $consulta->examen_auxiliar }}</p>
        <br>
        <h3 class="col-sm-12">VI. DIAGNÓSTICO DEFINITIVO:</h3>
        <p class="col-sm-6">{{ $consulta->diagnostico_final }}</p>
        <p class="col-sm-6"><strong>CIEX Diag. Def.: </strong>{{ $consulta->CIEX2 }}</p>
        <br>
        <h3 class="col-sm-12">VII. TRATAMIENTO:</h3>
        <p class="col-sm-12">{{ $consulta->plan_tratamiento }}</p>
        <p  class="col-sm-12"><strong>Observaciones: </strong> {{ $consulta->observaciones }}</p>
        <p class="col-sm-6"><strong>Proxima CITA </strong>{{ $consulta->prox }}</p>
        <p  class="col-sm-6"><strong>Atendido Por: </strong> {{ $consulta->personal }}</p>
				<br>
			</div>
		</div>
	
	<div class="col-sm-12">
	<form action="observacion/create" method="post" class="form-horizontal">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="hidden" name="paciente_id" value="{{$data->pacienteId}}">
			<input type="hidden" name="profesional_id" value="{{$data->profesionalId}}">
          

	

			
			
            <!-- sheepIt Form -->
            <div id="laboratorios" class="embed ">
            
                <!-- Form template-->
                <div id="laboratorios_template" class="template row">

                   

                    <div class="col-sm-2">

                    </div>

                    <a id="laboratorios_remove_current" style="cursor: pointer;"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                </div>
                <!-- /Form template-->
                
                <!-- No forms template -->
                <div id="laboratorios_noforms_template" class="noItems col-sm-12 text-center">Ningún laboratorios</div>
                <!-- /No forms template-->
                
                <!-- Controls -->
              
                <!-- /Controls -->
                
            </div>
            <!-- /sheepIt Form --> 
						
					</div>
          <hr>

         
			
		
		</div>
		</div>
	</form>
	</div>
</div>
@section('scripts')
<script src="{{ asset('plugins/sheepit/jquery.sheepItPlugin.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('plugins/jqNumber/jquery.number.min.js') }}" type="text/javascript"></script>

<script type="text/javascript">

  $(document).ready(function() {

    $(".monto").keyup(function(event) {
      var montoId = $(this).attr('id');
      var montoArr = montoId.split('_');
      var id = montoArr[1];
      var montoH = parseFloat($('#servicios_'+id+'_montoHidden').val());
      var monto = parseFloat($(this).val());
      $('#servicios_'+id+'_montoHidden').val(monto);
      calcular();
      calculo_general();
    });

    $(".montol").keyup(function(event) {
      var montoId = $(this).attr('id');
      var montoArr = montoId.split('_');
      var id = montoArr[1];
      var montoH = parseFloat($('#laboratorios_'+id+'_montoHidden').val());
      var monto = parseFloat($(this).val());
      $('#laboratorios_'+id+'_montoHidden').val(monto);
      calcular();
      calculo_general();
    });

    $(".abonoL, .abonoS").keyup(function(){
      var total = 0;
      var selectId = $(this).attr('id');
      var selectArr = selectId.split('_');
      
      if(selectArr[0] == 'servicios'){
          if(parseFloat($(this).val()) > parseFloat($("#servicios_"+selectArr[1]+"_monto").val())){
              alert('La cantidad insertada en abono es mayor al monto.');
              $(this).val('0.00');
              calculo_general();
          } else {
              calculo_general();
          }
      } else {
        if(parseFloat($(this).val()) > parseFloat($("#laboratorios_"+selectArr[1]+"_monto").val())){
              alert('La cantidad insertada en abono es mayor al monto.');
              $(this).val('0.00');
              calculo_general();
          } else {
              calculo_general();
          }
      }
    });

    var botonDisabled = true;

    // Main sheepIt form
    var phonesForm = $("#laboratorios").sheepIt({
        separator: '',
        allowRemoveCurrent: true,
        allowAdd: true,
        allowRemoveAll: true,
        allowRemoveLast: true,

        // Limits
        maxFormsCount: 10,
        minFormsCount: 1,
        iniFormsCount: 0,

        removeAllConfirmationMsg: 'Seguro que quieres eliminar todos?',
        
        afterRemoveCurrent: function(source, event){
          calcular();
          calculo_general();
        }
    });

 
    $(document).on('change', '.selectLab', function(){
      var labId = $(this).attr('id');
      var labArr = labId.split('_');
      var id = labArr[1];

      $.ajax({
         type: "GET",
         url:  "analisis/getAnalisi/"+$(this).val(),
         success: function(a) {
            $('#laboratorios_'+id+'_montoHidden').val(a.preciopublico);
            $('#laboratorios_'+id+'_monto').val(a.preciopublico);
            var total = parseFloat($('#total').val());
            $("#total").val(total + parseFloat(a.preciopublico));
            calcular();
            calculo_general();
         }
      });
    })
});


function calcular() {
  var total = 0;
      $(".monto").each(function(){
        total += parseFloat($(this).val());
      })

      $(".montol").each(function(){
        total += parseFloat($(this).val());
      })

      $("#total").val(total);
}

function calculo_general() {
  var total = 0;
  $(".abonoL").each(function(){
    total += parseFloat($(this).val());
  })

  $(".abonoS").each(function(){
    total += parseFloat($(this).val());
  })

  $("#total_a").val(total);
  $("#total_g").val(parseFloat($("#total").val()) - parseFloat(total));
}

// Run Select2 on element
function Select2Test(){
	$("#el2").select2();
	$("#el1").select2();
	$("#el3").select2();
  $("#el5").select2();
  $("#el4").select2();
}
$(document).ready(function() {
	// Load script of Select2 and run this
	LoadSelect2Script(Select2Test);
	LoadTimePickerScript(DemoTimePicker);
	WinMove();
});

function DemoTimePicker(){
	$('#input_date').datepicker({
	setDate: new Date(),
	minDate: 0});
	$('#input_time').timepicker({
		setDate: new Date(),
		stepMinute: 10
	});
	$('#input_time2').timepicker({
		setDate: new Date(),
		stepMinute: 10
	});
}
</script>


@endsection
@endsection