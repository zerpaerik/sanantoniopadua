@extends('layouts.app')
@section('content')
	<h1>Cita medica {{$data->title}}</h1>
	<p>Paciente: {{$data->nombres}} {{$data->apellidos}} </p>
	<p>Doctor: {{$data->nombrePro}} {{$data->apellidoPro}}</p>
	<p>Fecha de cita: {{$data->date}}</p>
	<p>Hora: {{$data->start_time}} Hasta las {{$data->end_time}}</p>
	<br>

	<h2>Datos del paciente</h2>
	<p>Nombre: {{$data->nombres}} {{$data->apellidos}} </p>
	<p>DNI paciente: {{$data->dni}}</p>
	<p>Direccion del paciente: {{$data->direccion}}</p>
	<p>Telefono del paciente: {{$data->telefono}}</p>
	<p>Fecha de nacimiento: {{$data->fechanac}}</p>
	<p>Grado de isntruccion del paciente: {{$data->gradoinstruccion}}</p>
	<p>Ocupacion del paciente: {{$data->ocupacion}}</p>	
    <p>Edad del paciente: {{$edad}} años</p>	


	<br>
	<br>	

	@if($historial)
	<h2>Historia Base de {{$data->apellidos}} {{$data->nombres}} </h2>
		<p>Antecedentes Patologicos: {{$historial->antecedentes_patologicos}}</p>
		<p>Antecedentes Personales: {{$historial->antecedentes_personales}}</p>
		<p>Antecedentes Familiares: {{$historial->antecedentes_familiar}}</p>
		<p>Antecedentes Quirurgicos: {{$historial->antecedentes_quirurgicos}}</p>
		<p>Antecedentes Traumàticos: {{$historial->antecedentes_traumaticos}}</p>
	    <p>Antecedentes Geneticos: {{$historial->antecedentes_geneticos}}</p>
		<p>Alergias: {{$historial->alergias}}</p>
		<p>Menarquia: {{$historial->menarquia}} años.</p> 
		<p>1º R.S : {{$historial->prs}} años.</p> 

	@else
	<h4>Este usuario no cuenta con un historial base, por favor agregue uno</h4>
		<div></div>
		<form action="historial/create" method="post">
			<div class="form-group">
				{{ csrf_field() }}
				<input type="hidden" name="paciente_id" value="{{$data->pacienteId}}">
				<input type="hidden" name="profesional_id" value="{{$data->profesionalId}}">
				<p><strong>ANTECEDENTES MÉDICOS</strong></p>
				<div class="row">

				<label for="" class="col-sm-3">Antecedentes Familiares:</label>
				<div class="col-sm-3">
					<select id="el12" name="af">
							<option value="0" selected disabled hidden>Seleccione</option>
							<option value="1">Ninguno</option>
							<option value="2">Otros</option>
						</select>
				</div>
				<div class="col-sm-3">
					<div id="af1"></div>
				</div>



				</div>
				<div class="row">

				<label for="" class="col-sm-3">Antecedentes Personales:</label>
				<div class="col-sm-3">			
						<select id="el11" name="ap">
							<option value="0" selected disabled hidden>Seleccione</option>
							<option value="1">Ninguno</option>
							<option value="2">Otros</option>
						</select>
				</div>

				<div class="col-sm-3">
					<div id="ap1"></div>
				</div>
			  </div>

			  <div class="row">

				<label for="" class="col-sm-3">Antecedentes Patológicos:</label>
				<div class="col-sm-3">			
					<select id="el14" name="apa">
							<option value="0" selected disabled hidden>Seleccione</option>
							<option value="1">Ninguno</option>
							<option value="2">Otros</option>
						</select>
				</div>
					<div class="col-sm-3">
					<div id="apa1"></div>
				</div>

				</div>
				<div class="row">

				<label for="" class="col-sm-3">Antecedentes Quirúrgicos:</label>
				<div class="col-sm-3">			
					<select id="el20" name="aq">
							<option value="0" selected disabled hidden>Seleccione</option>
							<option value="1">Ninguno</option>
							<option value="2">Otros</option>
						</select>
				</div>
					<div class="col-sm-3">
					<div id="aq1"></div>
				</div>

				</div>
				<div class="row">

				<label for="" class="col-sm-3">Antecedentes Traumáticos:</label>
				<div class="col-sm-3">			
					<select id="el21" name="at">
							<option value="0" selected disabled hidden>Seleccione</option>
							<option value="1">Ninguno</option>
							<option value="2">Otros</option>
						</select>
				</div>
					<div class="col-sm-3">
					<div id="at1"></div>
				</div>

				</div>
				<div class="row">

				<label for="" class="col-sm-3">Antecedentes Genéticos:</label>
				<div class="col-sm-3">			
					<select id="el22" name="ag">
							<option value="0" selected disabled hidden>Seleccione</option>
							<option value="1">Ninguno</option>
							<option value="2">Otros</option>
						</select>
				</div>
					<div class="col-sm-3">
					<div id="ag1"></div>
				</div>

				</div>
				<div class="row">

				<label for="" class="col-sm-3">Alergias:</label>
				<div class="col-sm-3">
					<select id="el10" name="al">
					<option value="0" selected disabled hidden>Seleccione</option>
					<option value="1">No</option>
					<option value="2">Si</option>
				</select>

				</div>
					<div class="col-sm-3">
					<div id="alerg"></div>
				</div>

				</div>

				<label for="" class="col-sm-1">Menarquia:</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="menarquia">
					</div>
			    <label for="" class="col-sm-1">1RS:</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="prs">
					</div>
				
			
				<br>
				<div class="col-sm-12">
					<input type="button" onclick="form.submit()" value="Registrar" class="btn btn-success">
				</div>
			</div>
		</form>
	@endif	
	<br>
	<h2>Resultados anteriores de {{$data->nombres}} {{$data->apellidos}}</h2>
	@foreach($consultas as $consulta)
	<div class="rows">
		<div class="col-sm-12">
			<div class="rows">
				<h3 class="col-sm-12"><strong>Consulta del {{$consulta->created_at}}</strong></h3>

				<h3 class="col-sm-12">II. AMANESIS</h3>
				<p class="col-sm-6"><strong>Motivo de Consulta:</strong> {{ $consulta->motivo_consulta }}</p>
				<p class="col-sm-6"><strong>Tiempo de Enfermedad:</strong> {{ $consulta->tiempo_enf }}</p>
			
				<br>
				<p class="col-sm-12"><strong>ANTECEDENTES GINECO - OBSTÉTRICOS</strong></p>
				
				<p class="col-sm-3"><strong>R/C:</strong> {{$consulta->pulso}}</p>
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
	
	@endforeach
	<div class="col-sm-12">
	<h3>Registrar nueva Historia</h3>
	<br>
	<form action="observacion/create" method="post" class="form-horizontal">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="hidden" name="paciente_id" value="{{$data->pacienteId}}">
			<input type="hidden" name="profesional_id" value="{{$data->profesionalId}}">
		    <input type="hidden" name="evento" value="{{$evento->id}}">
             <div class="row">
			  <label class="col-sm-3 control-label">DEJAR PENDIENTE?:</label>
			<div class="col-sm-2">
				<select id="el3" name="pendiente" required="true">
					<option value="0">No</option>
					<option value="1">Si</option>
				</select>
			</div> 
			</div>
			<h2>II. ANAMNESIS</h2>
           <div class="row">
            <label for="" class="col-sm-2 control-label">Motivo de Consulta:</label>
			<div class="col-sm-10">	
				<textarea name="motivo_consulta" cols="10" rows="3" class="form-control" ></textarea>
			</div>
		  </div>
		  <div class="row">
            <label for="" class="col-sm-2 control-label">Tiempo de enfermedad:</label>
			<div class="col-sm-10">	
				<textarea name="tiempo_enf" cols="10" rows="3" class="form-control" ></textarea>
			</div>
		  </div>

		 
				
				<br>
				<p><strong>ANTECEDENTES GINECO - OBSTÉTRICOS</strong></p>
				<div class="row">
					
					<label for="" class="col-sm-1">R/C:</label>
					<div class="col-sm-2">	
						<input   class="form-control" type="text" name="pulso">
					</div>
					
					<label for="" class="col-sm-1">Nº PS:</label>
					<div class="col-sm-2">	
						<input class="form-control" type="text" name="andria">
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-1">G:</label>
					<div class="col-sm-1">	
						<input   class="form-control" type="text" name="g">
					</div>
					<label for="" class="col-sm-1">P:</label>
					<div class="col-sm-1">	
						<input  class="form-control" type="text" name="p">
					</div>
					<label for="" class="col-sm-2">Fecha Últ. Emb.:</label>
					<div class="col-sm-3">			
						<input  class="form-control" type="text" name="fechaemb" placeholder="fecha de último embarazo">
					</div>
					<label for="" class="col-sm-2">RN> peso:</label>
					<div class="col-sm-1">	
						<input class="form-control" type="text" name="rnpeso">
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-1">FUR:</label>
					<div class="col-sm-2">	
						<input class="form-control" type="text" name="fur" placeholder="fecha FUR">
					</div>

					<label for="" class="col-sm-2">Anticonceptivo:</label>
					<div class="col-sm-7">	
						<input class="form-control" type="text" name="anticon">
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-2">Fecha Último PAP:</label>
					<div class="col-sm-3">			
						<input  class="form-control" type="text" name="fecha" placeholder="fecha de último PAP">
					</div>
					<label for="" class="col-sm-1">Resultado:</label>
					<div class="col-sm-2">			
						<input  class="form-control" type="text" name="result">
					</div>
					<label for="" class="col-sm-2">Grupo Sanguineo:</label>
					<div class="col-sm-2">			
						<input  class="form-control" type="text" name="gsan">
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-4">Procesos Hemorrágicos (Parto/Aborto):</label>
					<div class="col-sm-8">	
						<input class="form-control" type="text" name="phpa">
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-2">Antecedentes de EPI:</label>
					<div class="col-sm-4">	
						<input class="form-control" type="text" name="antepi">
					</div>
					<label for="" class="col-sm-1">ETS:</label>
					<div class="col-sm-5">	
						<input class="form-control" type="text" name="ets">
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-1">Otros:</label>
					<div class="col-sm-11">	
						<input class="form-control" type="text" name="etsotro">
					</div>
				</div>
				<br>
		<h2>III. EXAMEN FÍSICO/CLÍNICO</h2>
		<br>
		<p><strong>FUNCIONES VITALES</strong></p>
			<div class="row">
				<label for="" class="col-sm-1 control-label">P/A:</label>
				<div class="col-sm-1">	
					<input   class="form-control" type="text" name="pa" placeholder="mmgh-">
				</div>
				<label for="" class="col-sm-1 control-label">Pulso:</label>
				<div class="col-sm-1">	
					<input  class="form-control" type="text" name="card">
				</div>
				<label for="" class="col-sm-1 control-label">Tº O:</label>
				<div class="col-sm-1">	
					<input   class="form-control" type="text" name="temperatura" placeholder="">
				</div>
				<label for="" class="col-sm-1 control-label">SO<sub>2</sub>:</label>
				<div class="col-sm-1">	
					<input   class="form-control" type="text" name="so3" placeholder="">
				</div>
				<label for="" class="col-sm-1 control-label">Peso:</label>
				<div class="col-sm-1">			
					<input  class="form-control" type="text" name="peso" placeholder="Kg">
				</div>
				<label for="" class="col-sm-1 control-label">Talla:</label>
				<div class="col-sm-1">			
					<input  class="form-control" type="text" name="talla" placeholder="talla">
				</div>
			</div>
		  <!--<div class="col-md-6">
		  	<label for="" class="col-sm-2 control-label">Func.Biològicas</label>
		  </div>
		  <div class="col-md-6">
		  	<label for="" class="col-sm-2 control-label">Func.Vitales</label>
		  </div>
			<label for="" class="col-sm-2 control-label">Apetito</label>
			<div class="col-sm-4">
				<select id="el7" name="apetito">
					<option value="Aumentado">Aumentado</option>
					<option value="Normal">Normal</option>
					<option value="Disminuido">Disminuido</option>
				</select>
			</div>
			
			<label for="" class="col-sm-2 control-label">Sed:</label>
			<div class="col-sm-4">	
				<select id="el8" name="sed">
					<option value="Aumentado">Aumentado</option>
					<option value="Normal">Normal</option>
					<option value="Disminuido">Disminuido</option>
				</select>
			</div>
			

			<label for="" class="col-sm-2 control-label">Frecuencia.Micciones</label>
			<div class="col-sm-4">	
				<input   class="form-control" placeholder="Frecuencia Micciones" type="text" name="orina" placeholder="c 24/hrs">
			</div>
			<label for="" class="col-sm-2 control-label">Animo</label>
			<div class="col-sm-4">	
				<select id="el9" name="animo">
					<option value="Deprimido">Deprimido</option>
					<option value="Eufórico">Eufórico</option>
					<option value="Normal">Normal</option>
					<option value="Tendencia al llanto">Tendencia al llanto</option>
				</select>
			</div>
			<label for="" class="col-sm-2 control-label">Temperatura</label>
			<div class="col-sm-4">	
				<input   class="form-control" type="text" name="temperatura" placeholder="ºC">
			</div>
			<label for="" class="col-sm-2 control-label">Frecuencia.Deposiciones</label>
			<div class="col-sm-4">	
				<input  class="form-control" placeholder="Frecuencia Deposiciones" type="text" name="deposiciones" placeholder="c 24/hrs">
			</div>
			<label for="" class="col-sm-2 control-label">Evol.Enf</label>
			<div class="col-sm-4">	
				<select id="el16" name="evolucion_enfermedad">
					<option value="Insidioso">Insidioso</option>
					<option value="Progresivo">Progresivo</option>
					
				</select>
			</div>	
			<label for="" class="col-sm-2 control-label">Tipo de enfermedad:</label>
			<div class="col-sm-4">	
					<select id="el15" name="tipo_enfermedad">
					<option value="Agudo">Agudo</option>
					<option value="Crònico">Crònico</option>
					
				</select>
			</div>
			<br>

			<label for="" class="col-sm-2 control-label">MAC:</label>
			<div class="col-sm-4">	
				<input  class="form-control" type="text" name="mac">
			</div>-->

			


		<br>
		<div class="row">
            <label for="" class="col-sm-2 control-label">Examen Físico General:</label>
			<div class="col-sm-10">	
				<textarea name="exagen" cols="10" rows="3" class="form-control" ></textarea>
			</div>
	  	</div>
		<div class="row">
        	<label for="" class="col-sm-2 control-label">Examen Físico Regional:</label>
			<div class="col-sm-10">	
				<textarea name="exareg" cols="10" rows="3" class="form-control" ></textarea>
			</div>
		</div>
		<br>
        <div class="row">
	        <h2>IV. DIAGNÓSTICO PRESUNTIVO</h2>
			<div class="col-sm-6">	
				<textarea   class="form-control" cols="10" rows="3" type="text" name="presuncion_diagnostica"></textarea>
			</div>

		
			<label class="col-sm-1">CIE-X:</label>
			<div class="col-sm-5">
				<select id="el6" name="ciex[]" multiple="">
					@foreach($ciex as $c)
					<option value="{{$c->codigo}}-{{$c->nombre}}">
						{{$c->codigo}}-{{$c->nombre}}
					</option>
					@endforeach
				</select>
			</div> 
		</div>
		<br>
		<div class="row">
	        <h2>V. EXÁMENES AUXILIARES</h2>
			<div class="col-sm-12">	
				<textarea   class="form-control" cols="10" rows="3" type="text" name="examen_auxiliar"></textarea>
			</div>
		</div>
        <br>
		<div class="row">
			<h2>VI. DIAGNÓSTICO DEFINITIVO</h2>
			<div class="col-sm-6">	
				<textarea   class="form-control" cols="10" rows="3" type="text" name="diagnostico_final"></textarea>
			</div>

			<label class="col-sm-1">CIE-X:</label>
			<div class="col-sm-5">
				<select id="el4" name="ciex2[]" multiple="">
					@foreach($ciex as $c)
					<option value="{{$c->codigo}}-{{$c->nombre}}">
						{{$c->codigo}}-{{$c->nombre}}
					</option>
					@endforeach
				</select>
			</div> 
			
		</div>
		<br>
		<div class="row">
		<h2>VII. TRATAMIENTO</h2>
		<div class="col-sm-12">	
				<textarea  class="form-control" type="text" cols="10" rows="3" name="plan_tratamiento"></textarea>
			</div>
	    </div>

	    <div class="row">
		<label for="" class="col-sm-2 control-label">Observaciones:</label>
		<div class="col-sm-10">	
			<textarea name="observaciones" cols="10" rows="10" class="form-control" ></textarea>
		</div>
		<label for="" class="col-sm-2 ">Pròxima Cita</label>
		<div class="col-sm-3">
			<input type="date" name="prox" class="form-control" >
		</div>
		</div>
		
			
			<label class="col-sm-12 alert"><i class="fa fa-tasks" aria-hidden="true"></i> Materiales Usados</label>
            <!-- sheepIt Form -->
            <div id="laboratorios" class="embed ">
            
                <!-- Form template-->
                <div id="laboratorios_template" class="template row">

                    <label for="laboratorios_#index#_laboratorio" class="col-sm-1 control-label">Materiales</label>
                    <div class="col-sm-4">
                      <select id="laboratorios_#index#_laboratorio" name="id_laboratorio[laboratorios][#index#][laboratorio]" class="selectLab form-control">
                        <option value="1">Seleccionar Material</option>
                        @foreach($productos as $pac)
                          <option value="{{$pac->id}}">
                            {{$pac->nombre}}
                          </option>
                        @endforeach
                      </select>
                    </div>

                    <label for="laboratorios_#index#_abonoL" class="col-sm-1 control-label">Cantidad Usada:</label>
                    <div class="col-sm-2">

                      <input id="laboratorios_#index#_abonoL" name="monto_abol[laboratorios][#index#][abono]" type="text" class="number form-control abonoL" placeholder="Abono" data-toggle="tooltip" data-placement="bottom" title="Abono" value="0.00">
                    </div>

                    <a id="laboratorios_remove_current" style="cursor: pointer;"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
                </div>
                <!-- /Form template-->
                
                <!-- No forms template -->
                <div id="laboratorios_noforms_template" class="noItems col-sm-12 text-center">Ningún laboratorios</div>
                <!-- /No forms template-->
                
                <!-- Controls -->
                <div id="laboratorios_controls" class="controls col-sm-11 col-sm-offset-1">
                    <div id="laboratorios_add" class="btn btn-default form add"><a><span><i class="fa fa-plus-circle"></i> Agregar Producto</span></a></div>
                    <div id="laboratorios_remove_last" class="btn form removeLast"><a><span><i class="fa fa-close-circle"></i> Eliminar ultimo</span></a></div>
                    <div id="laboratorios_remove_all" class="btn form removeAll"><a><span><i class="fa fa-close-circle"></i> Eliminar todos</span></a></div>
                </div>
                <!-- /Controls -->
                
            </div>
            <!-- /sheepIt Form --> 
						
					</div>
          <hr>

          <div class="form-group form-inline">
            <div class="col-sm-8 col-sm-offset-7">
              <div class="col-sm-2 text-right" style="font-weight: 600; font-size: 12px">
                Total Solicitados:
              </div>
              <input type="text" name="total_a" class="number form-control" value="0.00" id="total_a" readonly="readonly" style="width: 150px">
            </div>
          </div>
			
		
			<div class="col-sm-12">
				<input type="button" onclick="form.submit()" value="Registrar" class="btn btn-success" class="form-control">
			</div>
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
	$("#el6").select2();
	$("#el7").select2();
	$("#el8").select2();
	$("#el9").select2();
	$("#el10").select2();
	$("#el11").select2();
	$("#el12").select2();
	$("#el13").select2();
	$("#el14").select2();
	$("#el15").select2();
	$("#el16").select2();
	$("#el17").select2();
	$("#el20").select2();
	$("#el21").select2();
	$("#el22").select2();




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



<script type="text/javascript">
      $(document).ready(function(){
        $('#el12').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/af/otros/';
          } else {
           link = '/af/ningunof/';
          }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#af1').html(a);
                 }
          });

        });
        

      });
       
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#el11').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/ap/otros/';
          } else {
           link = '/ap/ningunop/';
          }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#ap1').html(a);
                 }
          });

        });
        

      });
       
    </script>

        <script type="text/javascript">
      $(document).ready(function(){
        $('#el14').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/apa/otros/';
          } else {
           link = '/apa/ningunopa/';
          }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#apa1').html(a);
                 }
          });

        });
        

      });
       
    </script>

	<script type="text/javascript">
      $(document).ready(function(){
        $('#el20').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/aq/otros/';
          } else {
           link = '/aq/ningunoaq/';
          }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#aq1').html(a);
                 }
          });

        });
        

      });
       
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#el21').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/at/otros/';
          } else {
           link = '/at/ningunoat/';
          }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#at1').html(a);
                 }
          });

        });
        

      });
       
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
        $('#el22').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/ag/otros/';
          } else {
           link = '/ag/ningunoag/';
          }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#ag1').html(a);
                 }
          });

        });
        

      });
       
    </script>


        <script type="text/javascript">
      $(document).ready(function(){
        $('#el10').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/alerg/si/';
          } else {
           link = '/alerg/no/';
          }

          $.ajax({
                 type: "get",
                 url:  link,
                 success: function(a) {
                    $('#alerg').html(a);
                 }
          });

        });
        

      });
       
    </script>



@endsection
@endsection