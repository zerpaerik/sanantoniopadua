@extends('layouts.app')

@section('content')

<body>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-linux"></i>
					<span>Resultados/Redactar Servicios</span>

				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>

			{!! Form::open(['method' => 'get', 'route' => ['resultados.index']]) !!}

			<div class="row">
				<div class="col-md-2">
					{!! Form::label('fecha', 'Fecha Inicio', ['class' => 'control-label']) !!}
					{!! Form::date('fecha', old('fechanac'), ['id'=>'fecha','class' => 'form-control', 'placeholder' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('fecha'))
					<p class="help-block">
						{{ $errors->first('fecha') }}
					</p>
					@endif
				</div>
				<div class="col-md-2">
					{!! Form::label('fecha2', 'Fecha Fin', ['class' => 'control-label']) !!}
					{!! Form::date('fecha2', old('fecha2'), ['id'=>'fecha2','class' => 'form-control', 'placeholder' => '']) !!}
					<p class="help-block"></p>
					@if($errors->has('fecha2'))
					<p class="help-block">
						{{ $errors->first('fecha2') }}
					</p>
					@endif
				</div>
                        <div class="col-md-3">
                              {!! Form::label('name', '*', ['class' => 'control-label']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Buscar por Detalle']) !!}
                            <p class="help-block"></p>
                            @if($errors->has('name'))
                            <p class="help-block">
                                {{ $errors->first('name') }}
                          </p>
                          @endif
                    </div>
				<div class="col-md-2">
					{!! Form::submit(trans('Buscar'), array('class' => 'btn btn-info')) !!}
					{!! Form::close() !!}

				</div>
			</div>	
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-3">
					<thead>
						<tr>
							<th>Id</th>
							<th>Fecha</th>
							<th>Paciente</th>
							<th>Origen</th>
							<th>Servicio</th>
							<th width="40%">Informe</th>
							<th>Acciones:</th>
							


						</tr>
					</thead>
					<tbody>
					@foreach($data as $p)					
						<tr>
						<td>{{$p->id}}</td>
						<td>{{$p->created_at}}</td>
						<td>{{$p->apellidos}},{{$p->nombres}}</td>
						<td>{{$p->lastname}},{{$p->name}}</td>
						<td>{{$p->servicio}}</td>
						
					
						  
							@if($p->informe)
						<td>

					    <a href="resultados-desoc-{{$p->id}}" class="btn btn-success">Reversar</a>
	
						<a href="/modelo-informe-{{$p->id}}-{{$p->informe}}" class="btn btn-danger" target="_blank">Descargar Modelo</a>
							
						<td><a class="btn btn-primary" href="/resultados-guardar-{{$p->id}}">Adjuntar Informe</a></td>

							@else
								<td>
								<form action="{{$model . '-asoc-' .$p->id}}" method="get">
					     <select id="el2" name="informe">
						<option value="">Seleccione</option>
                                   <option value="ABDOMEN COLECISTITIS CRONICA FASE AGUDA-V.docx">ABDOMEN COLECISTITIS CRONICA FASE AGUDA-V</option>
                                    <option value="ABDOMEN COLECISTITIS CRONICA-V.docx">ABDOMEN COLECISTITIS CRONICA-V</option>
                                    <option value="ABDOMEN ESTEATOSIS LEVE, CCC-V.docx">ABDOMEN ESTEATOSIS LEVE, CCC-V</option>
                                    <option value="ABDOMEN ESTEATOSIS LEVE, SVB-V.docx">ABDOMEN ESTEATOSIS LEVE, SVB-V</option>
                                    <option value="ABDOMEN ESTEATOSIS LEVE-V.docx">ABDOMEN ESTEATOSIS LEVE-V</option>
                                    <option value="ABDOMEN ESTEATOSIS MODERADA, SVB-V.docx">ABDOMEN ESTEATOSIS MODERADA, SVB-V</option>
                                    <option value="ABDOMEN ESTEATOSIS MODERADA,PANCREAS INUSUAL-V.docx">ABDOMEN ESTEATOSIS MODERADA,PANCREAS INUSUAL-V</option>
                                    <option value="ABDOMEN ESTEATOSIS MODERADA-V.docx">ABDOMEN ESTEATOSIS MODERADA-V</option>
                                    <option value="ABDOMEN NRML-V.docx">ABDOMEN NRML-V</option>
                                    <option value="ABDOMEN POLIPO VB-V.docx">ABDOMEN POLIPO VB-V</option>
                                    <option value="ABDOMEN POLIPOSIS VB-V.docx">ABDOMEN POLIPOSIS VB-V</option>
                                    <option value="ABDOMEN STATUS POST COLECISTECTOMIA-V.docx">ABDOMEN STATUS POST COLECISTECTOMIA-V</option>
                                     <option value="COLPOSCOPIAPOSITIVO-V.docx">COLPOSCOPIAPOSITIVO-V</option>
                                      <option value="COLPOSCOPIANEGATIVO-V.docx">COLPOSCOPIANEGATIVO-V</option>
                                    <option value="GIN EPI-V.docx">GIN EPI-V</option>
                                    <option value="GIN NRML-V.docx">GIN NRML-V</option>
                                    <option value="GIN POLIFOL, EPI-V.docx">GIN POLIFOL, EPI-V</option>
                                    <option value="GIN POLIFOL-V.docx">GIN POLIFOL-V</option>
                                    <option value="GIN TV AMNRR-V.docx">GIN TV AMNRR-V</option>s
                                    <option value="GIN TV CONSIDERAR AB EN CURSO-V.docx">GIN TV CONSIDERAR AB EN CURSO-V</option>
                                    <option value="GIN TV DIU NRML-V.docx">GIN TV DIU NRML-V</option>
                                    <option value="GIN TV DIU SITUACION BAJA-V.docx">GIN TV DIU SITUACION BAJA-V</option>
                                    <option value="GIN TV INVOLUTIVO-V.docx">GIN TV INVOLUTIVO-V</option>
                                    <option value="GIN TV DIU SITUACION BAJA-V.docx">GIN TV DIU SITUACION BAJA-V</option>
                                    <option value="GIN TV MIOMATOSIS-V.docx">GIN TV MIOMATOSIS-V</option>
                                    <option value="GIN TV NRML-V.docx">GIN TV NRML-V</option>

                                    <option value="GIN TV OV MORFOLOGIA POLIQUISTICA-V.docx">GIN TV OV MORFOLOGIA POLIQUISTICA-V</option>
                                    <option value="GIN TV POLIFOL, EPI-V.docx">GIN TV POLIFOL, EPI-V</option>
                                    <option value="GIN TV POLIFOL-V.docx">GIN TV POLIFOL-V</option>
                                    <option value="GIN TV PRODUCTOS RETENIDOS DE LA CONCEPCION-V.docx">GIN TV PRODUCTOS RETENIDOS DE LA CONCEPCION-V</option>
                                    <option value="GIN TV SEGUIMIENTO OVULATORIO NRML-V.docx">GIN TV SEGUIMIENTO OVULATORIO NRML-V</option>
                                    <option value="GIN TV SITUACION INDETERMIDA BETA +-V.docx">GIN TV SITUACION INDETERMIDA BETA +-V</option>
                                    <option value="MAMAS FIBROADENOMA MAMA DER-V.docx">MAMAS FIBROADENOMA MAMA DER-V</option>
                                    <option value="MAMAS FIBROADENOMA MAMA IZQ-V.docx">MAMAS FIBROADENOMA MAMA IZQ-V</option>
                                    <option value="MAMAS QT SIMPLE MAMA DER-V.docx">MAMAS QT SIMPLE MAMA DER-V</option>
                                    <option value="MAMAS QT SIMPLE MAMA IZQ-V.docx">MAMAS QT SIMPLE MAMA IZQ-V</option>
                                    <option value="MAMAS-V.docx">MAMAS-V</option>
                                    <option value="OBST 4D II TRIMESTRE-V.docx">OBST 4D TRIMESTRE-V</option>
                                    <option value="OBST 4D III TRIMESTRE CC-V.docx">OBST 4D III TRIMESTRE CC-V</option>
                                    <option value="OBST 4D III TRIMESTRE-V.docx">OBST 4D III TRIMESTRE-V</option>
                                   
                                    <option value="OBST DOPPLER TAMIZAJE II TRIMESTRE-V.docx">OBST DOPPLER TAMIZAJE II TRIMESTRE-V</option>
                                    <option value="OBST GEMELAR II, III TRIMESTRE BICO, BIAMN-V.docx">OBST GEMELAR II, III TRIMESTRE BICO, BIAMN-V-V</option>
                                    <option value="OBST GEMELAR II, III TRIMESTRE MONOCO, BIAMN-V.docx">OBST GEMELAR II, III TRIMESTRE MONOCO, BIAMN-V-V</option>
                                    <option value="OBST I EMBRION 6 - 8 SEMANAS-V.docx">OBST I EMBRION 6 - 8 SEMANAS-V-V</option>
                                    <option value="OBST I EMBRION 9 SEMANAS-V.docx">OBST I EMBRION 9 SEMANAS-V-V</option>
                                    <option value="OBST GEMELAR II, III TRIMESTRE BICO, BIAMN-V.docx">OBST GEMELAR II, III TRIMESTRE BICO, BIAMN-V</option>
                                    <option value="OBST I EMBRION 6 - 8 SEMANAS-V.docx">OBST I EMBRION 6 - 8 SEMANAS-V</option>
                                    <option value="OBST I EMBRION 9 SEMANAS-V.docx">OBST I EMBRION 9 SEMANAS-V</option>
                                    <option value="OBST I FETO 10 - 11SS-V.docx">OBST I FETO 10 - 11SS-V</option>
                                    <option value="OBST I FETO 12 - 14SS-V.docx">OBST I FETO 12 - 14SS-V</option>
                                   
                                    <option value="OBST I TV DOPPLER TAMIZAJE-V.docx">OBST I TV DOPPLER TAMIZAJE-V</option>
                                    <option value="OBST I TV FETO 10 - 11SS DOBLE BIAMN BICOR-V.docx">OBST I TV FETO 10 - 11SS DOBLE BIAMN BICOR-V</option>
                                    <option value="OBST I TV FETO 10 - 11SS DOBLE BIAMN MONOCOR-V.docx">OBST I TV FETO 10 - 11SS DOBLE BIAMN MONOCOR-V</option>

                                    <option value="OBST I TV FETO 10 - 11SS-V.docx">OBST I TV FETO 10 - 11SS-V</option>
                                    <option value="OBST I TV FETO 12 - 14SS-V.docx">OBST I TV FETO 12 - 14SS-V</option>
                                    <option value="OBST I TV NO EVOLUTIVO LCN-V.docx">OBST I TV NO EVOLUTIVO LCN-V</option>
                                    <option value="OBST I TV NO EVOLUTIVO SG-V.docx">OBST I TV NO EVOLUTIVO SG-V</option>
                                    <option value="OBST I TV NO EVOLUTIVO vs VIABILIDAD SG-V.docx">OBST I TV NO EVOLUTIVO vs VIABILIDAD SG-V</option>
                                    <option value="OBST I TV UTERO BICORNE-V.docx">OBST I TV UTERO BICORNE-V</option>
                                    <option value="OBST I TV, GEST TEMPR, EPI-V.docx">OBST I TV, GEST TEMPR, EPI-V</option>
                                    <option value="OBST II-V.docx">OBST II-V</option>
                                    <option value="OBST III DISCORDANTE DC CIR TIPO II, CC-V.docx">OBST III DISCORDANTE DC CIR TIPO II, CC-V</option>
                                    <option value="OBST III DISCORDANTE DC CIR TIPO II-V.docx">OBST III DISCORDANTE DC CIR TIPO II-V</option>
                                    <option value="OBST III DOPPLER NIVEL II CC-V.docx">OBST III DOPPLER NIVEL II CC-V-V</option>
                                    <option value="OBST III DOPPLER NIVEL II-V.docx">OBST III DOPPLER NIVEL II-V-V</option>

                                    <option value="OBST III DOPPLER NIVEL II-3p-V.docx">OBST III DOPPLER NIVEL II-3p-V</option>
                                    <option value="OBST III PB SOSPECHA DE CC-V.docx">OBST III PB SOSPECHA DE CC-V-V</option>
                                    <option value="OBST III TRIMESTRE SOSPECHA DE CC-V.docx">OBST III TRIMESTRE SOSPECHA DE CC-V-V</option>

                                    <option value="OBST III PB-V.docx">OBST III PB-V</option>
                                    <option value="OBST III TRIMESTRE CIRCULAR DE CORDON-V.docx">OBST III TRIMESTRE CIRCULAR DE CORDON-V</option>
                                    <option value="OBST III-V.docx">OBST III-V</option>
                                    <option value="OBST MORFOLOGICA II TRIMESTRE-V.docx">OBST MORFOLOGICA II TRIMESTRE-2p-V</option>
                                    <option value="PB CADERAS NRML-V.docx">PB CADERAS NRML-V</option>
                                    <option value="PB INGLE NRML, HERNIA POSITIVO-V.docx">PB INGLE NRML, HERNIA POSITIVO-V</option>
                                    <option value="PB TESTICULAR NRML-V.docx">PB TESTICULAR NRML-V</option>
                                    <option value="PB TIROIDES NRML-V.docx">PB TIROIDES NRML-V</option>
                                    <option value="PROSTATA HPB G II ADENOMA-V.docx">PROSTATA HPB G II ADENOMA-V-V</option>
                                    <option value="PROSTATA HPB G I-V.docx">PROSTATA HPB G I-V-V</option>

                                    <option value="PROSTATA NRML-V.docx">PROSTATA NRML-V</option>
                                    <option value="PROSTATA QT LINEA MEDIA-V.docx">PROSTATA QT LINEA MEDIA-V</option>
                                    <option value="PROSTATA REMANENTE-V.docx">PROSTATA REMANENTE-V</option>
                                    <option value="PROSTATA SEC DE PROSTATITIS-V.docx">PROSTATA SEC DE PROSTATITIS-V</option>
                                    <option value="RENAL DOBLE SISTEMA-V.docx">RENAL DOBLE SISTEMA-V</option>
                                    <option value="RENAL HIDROURETERONEFROSIS-V.docx">RENAL HIDROURETERONEFROSIS-V</option>
                                    <option value="RENAL LITIASIS BILATERAL-V.docx">RENAL LITIASIS BILATERAL-V</option>
                                    <option value="RENAL LITIASIS UNILATERAL-V.docx">RENAL LITIASIS UNILATERAL-V</option>
                                    <option value="RENAL NRML-V.docx">RENAL NRML-V</option>
                                    <option value="RENAL QT SIMPLE-V.docx">RENAL QT SIMPLEL-V</option>
                                    <option value="RENAL Y VIAS URINARIAS-V.docx">RENAL Y VIAS URINARIAS-V</option>
								</select>
							</td>
							<td><input type="submit" class="btn btn-success" value="Asociar"></td>
							@endif
							
						</tr>
						</form>
						@endforeach	
					</tbody>
					<tfoot>
						<tr>
						    <th>Id</th>
							<th>Fecha</th>
							<th>Paciente</th>
							<th>Origen</th>
							<th>Detalle</th>
							<th>Informe</th>
							<th>Acciones:</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

</body>



<script src="{{url('/tema/plugins/jquery-ui/jquery-ui.min.js')}}"></script>




@section('scripts')
<script type="text/javascript">
// Run Select2 on element
$(document).ready(function() {
      LoadTimePickerScript(DemoTimePicker);
      LoadSelect2Script(function (){
            $("#el2").select2();
            $("#el1").select2();
            $("#el3").select2({disabled : true});
      });
      WinMove();
});

$('#input_date').on('change', getAva);
$('#el1').on('change', getAva);

function getAva (){
            var d = $('#input_date').val();
            var e = $("#el1").val();
            if(!d) return;
            $.ajax({
      url: "available-time/"+e+"/"+d,
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
      type: "get",
      success: function(res){
            $('#el3').find('option').remove().end();
            for(var i = 0; i < res.length; i++){
                              var newOption = new Option(res[i].start_time+"-"+res[i].end_time, res[i].id, false, false);
                              $('#el3').append(newOption).trigger('change');
            }
      }
    });     
}

function DemoTimePicker(){
      $('#input_date').datepicker({
      setDate: new Date(),
      minDate: 0});
}
</script>
@endsection
@endsection
