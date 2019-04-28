
@extends('layouts.app')
@section('content')

	@if($prenatal)
	<h2>Control Prenatal Base de {{$paciente->nombres}} {{$paciente->apellidos}}</h2>
<div class="rows">
		<div class="col-sm-12">
			<div class="rows">
				<h3 class="col-sm-12"><strong>Consulta del {{$prenatal->created_at}}</strong></h3>

				<h3 class="col-sm-12">II. AMANESIS</h3>
				<p class="col-sm-6"><strong>Motivo de Consulta:</strong> {{ $prenatal->motivo_consulta }}</p>
				<p class="col-sm-6"><strong>Tiempo de Enfermedad:</strong> {{ $prenatal->tiempo_enf }}</p>
				<p class="col-sm-12"><strong>ANTECEDENTES MÉDICOS</strong></p>
				<p class="col-sm-6"><strong>Antecedentes Patológicos:</strong> {{$prenatal->antecedentes_patologicos}}</p>
				<p class="col-sm-6"><strong>Antecedentes Personales:</strong> {{$prenatal->antecedentes_personales}}</p>
				<p class="col-sm-6"><strong>Antecedentes Familiares:</strong> {{$prenatal->antecedentes_familiar}}</p>
				<p class="col-sm-6"><strong>Antecedentes Quirúrgicos:</strong> {{$prenatal->antecedentes_quirurgicos}}</p>
				<p class="col-sm-6"><strong>Antecedentes Traumáticos:</strong> {{$prenatal->antecedentes_traumaticos}}</p>
				<p class="col-sm-6"><strong>Antecedentes Genéticos:</strong> {{$prenatal->antecedentes_geneticos}}</p>
				<p class="col-sm-6"><strong>Alergias:</strong> {{$prenatal->alergias}}</p>
				<br>
				<p class="col-sm-12"><strong>ANTECEDENTES GINECO - OBSTÉTRICOS</strong></p>
				<p class="col-sm-3"><strong>Menarquia:</strong> {{$prenatal->menarquia}} años</p>
				<p class="col-sm-3"><strong>R/C:</strong> {{$prenatal->pulso}}</p>
				<p class="col-sm-3"><strong>1º R.S:</strong> {{$prenatal->prs}}</p>
				<p class="col-sm-3"><strong>Nº PS:</strong> {{$prenatal->andria}}</p>
				<p class="col-sm-1"><strong>G:</strong> {{$prenatal->g}}</p>
				<p class="col-sm-1"><strong>P:</strong> {{$prenatal->p}}</p>
				<p class="col-sm-4"><strong>Fecha Últ. Emb.:</strong> {{$prenatal->fechaemb}}</p>
				<p class="col-sm-3"><strong>RN> peso:</strong> {{$prenatal->rnpeso}}</p>
				<p class="col-sm-3"><strong>FUR:</strong> {{$prenatal->fur}}</p>
				<p class="col-sm-12"><strong>Anticonceptivo:</strong> {{$prenatal->anticon}}</p>
				<p class="col-sm-3"><strong>Fecha Último PAP:</strong> {{$prenatal->fecha}}</p>
				<p class="col-sm-3"><strong>Resultado:</strong> {{$prenatal->result}}</p>
				<p class="col-sm-2"><strong>Grupo Sanguineo:</strong> {{$prenatal->gsan}}</p>
				<p class="col-sm-12"><strong>Procesos Hemorrágicos (Parto/Aborto):</strong> {{$prenatal->phpa}}</p>
				<p class="col-sm-6"><strong>Antecedentes de EPI:</strong> {{$prenatal->antepi}}</p>
				<p class="col-sm-3"><strong>ETS:</strong> {{$prenatal->ets}}</p>
				<p class="col-sm-6"><strong>OTROS:</strong> {{$prenatal->etsotro}}</p>

				<h3 class="col-sm-12">III. EXAMEN FÍSICO/CLÍNICO</h3>
				<p class="col-sm-12"><strong>FUNCIONES VITALES</strong></p>
				<p class="col-sm-2"><strong>P/A:</strong> {{$prenatal->pa}}</p>
				<p class="col-sm-2"><strong>Pulso:</strong> {{$prenatal->card}}</p>
				<p class="col-sm-2"><strong>TºO:</strong> {{$prenatal->temperatura}}</p>
				<p class="col-sm-2"><strong>SO<sub>3</sub>:</strong> {{$prenatal->so3}}</p>
				<p class="col-sm-2"><strong>Peso:</strong> {{$prenatal->peso}}</p>
				<p class="col-sm-2"><strong>Talla:</strong> {{$prenatal->talla}}</p>
				<p class="col-sm-2"><strong>IMC:</strong> {{$prenatal->imc}}</p>
				<br>
				<h3 class="col-sm-12">IV. DIAGNÓSTICO PRESUNTIVO:</h3>
				<p class="col-sm-6">{{ $prenatal->presuncion_diagnostica }}</p>
				<p class="col-sm-6"><strong>CIEX Pres. Diag.:</strong> {{ $prenatal->CIEX }}</p>
				<br>
				<h3 class="col-sm-12">V. EXÁMENES AUXILIARES</h3>
				<p class="col-sm-12">{{ $prenatal->examen_auxiliar }}</p>
				<br>
				<h3 class="col-sm-12">VI. DIAGNÓSTICO DEFINITIVO:</h3>
				<p class="col-sm-6">{{ $prenatal->diagnostico_final }}</p>
				<p class="col-sm-6"><strong>CIEX Diag. Def.: </strong>{{ $prenatal->CIEX2 }}</p>
				<br>
				<h3 class="col-sm-12">VII. TRATAMIENTO:</h3>
				<p class="col-sm-12">{{ $prenatal->plan_tratamiento }}</p>
				<p  class="col-sm-12"><strong>Observaciones: </strong> {{ $prenatal->observaciones }}</p>
				<p class="col-sm-6"><strong>Proxima CITA </strong>{{ $prenatal->prox }}</p>
		        <p  class="col-sm-6"><strong>Atendido Por: </strong> {{ $prenatal->personal }}</p>
				


				<br>
			</div>
		</div>

	@else 
	<h3>Registrar nuevo control prenatal</h3>
	<br>
	<div class="box-content">
	<form class="form-horizontal" role="form" method="post" action="prenatal/create">
		{{ csrf_field() }}
		<div class="form-group">
			<input type="hidden" name="paciente_id" value="{{$paciente->id}}">
			<input type="hidden" name="profesional_id" value="{{$evento->profesional}}">
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
				
				<br>
				<p><strong>ANTECEDENTES GINECO - OBSTÉTRICOS</strong></p>
				<div class="row">
					<label for="" class="col-sm-1">Menarquia:</label>
					<div class="col-sm-3">
						<input class="form-control" type="text" name="menarquia">
					</div>
					<label for="" class="col-sm-1">R/C:</label>
					<div class="col-sm-2">	
						<input   class="form-control" type="text" name="pulso">
					</div>
					<label for="" class="col-sm-1">1º R.S:</label>
					<div class="col-sm-1">
						<input class="form-control" type="text" name="prs">
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
				<label for="" class="col-sm-1 control-label">SO<sub>3</sub>:</label>
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
		<h2>IV. DIAGNÓSTICO PRESUNTIVO</h2>
        <div class="row">
	        
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
		<h2>V. EXÁMENES AUXILIARES</h2>
		<div class="row">
	        
			<div class="col-sm-12">	
				<textarea   class="form-control" cols="10" rows="3" type="text" name="examen_auxiliar"></textarea>
			</div>
		</div>
        <br>
        <h2>VI. DIAGNÓSTICO DEFINITIVO</h2>
		<div class="row">
			
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
		<h2>VII. TRATAMIENTO</h2>
		<div class="row">
		
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
           
            <!-- /sheepIt Form --> 
						
					</div>
          <hr>

       
			
		
			<div class="col-sm-12">
				<input type="button" onclick="form.submit()" value="Registrar" class="btn btn-success" class="form-control">
			</div>

					</div>																																																										
					</div>
				</div>
				</form>
			</div>	
		</div>
@endif
 
<div class="box-content">
   	<div style="background: #eaeaea;">
	<table style="width: 100%;text-align: center;margin: 10px 0;border:1px solid black;">

		<tr>
			<div>

    <th scope="col" style="background: #2E9AFE;">CONTROLES PRENATALES de {{$paciente->nombres}} {{$paciente->apellidos}}
    	<td scope="col" style="background: #2E9AFE;"></td>
    </th>


  


  </tr>

  <tr>
    

    <th style="background: #81BEF7;border: 1px solid black;">Fecha de Control</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->created_at}}</td>
  @endforeach
  </tr>

   <tr>
    <th style="background: #81BEF7;border: 1px solid black;">Tiempo de Embarazo</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->tiempoemb}} {{$c->gesta_semanas}}</td>
  @endforeach
  </tr>

   <tr>
    <th style="background: #81BEF7;border: 1px solid black;">Peso</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->peso}}</td>
  @endforeach
  </tr>

  <tr>
   <th style="background: #81BEF7;border: 1px solid black;">PA</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->tension}}</td>
  @endforeach
  </tr>

  <th style="background: #81BEF7;border: 1px solid black;">Pulso</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->pulso_materno}}</td>
  @endforeach
  </tr>

  <tr>
    <th style="background: #81BEF7;border: 1px solid black;">Temperatura</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->temp}}</td>
  @endforeach
  </tr>

  <tr>
   <th style="background: #81BEF7;border: 1px solid black;">SO<sub>2</sub></th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->consejeria}}</td>
  @endforeach
  </tr>

  <tr>
   <th style="background: #81BEF7;border: 1px solid black;">AU</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->altura_uterina}}</td>
  @endforeach
  </tr>

  <tr>
   <th style="background: #81BEF7;border: 1px solid black;">Presentación</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->presentacion}}</td>
  @endforeach
  </tr>

  <tr>
     <th style="background: #81BEF7;border: 1px solid black;">LCF</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->fcf}}</td>
  @endforeach
  </tr>

  <tr>
    <th style="background: #81BEF7;border: 1px solid black;">Mov. Fetal</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->movimiento_fetal}}</td>
  @endforeach
  </tr>

  <tr>
   <th style="background: #81BEF7;border: 1px solid black;">Edema</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->edema}}</td>
  @endforeach
  </tr>

  <tr>
   <th style="background: #81BEF7;border: 1px solid black;">Responsable</th>
 @foreach($control as $c)
    <td style="border: 1px solid black;">{{$c->responsable_control}}</td>
  @endforeach
  </tr>

 @foreach($control as $c)
	<div class="col-sm-12">
	   <h2>Fecha de Control: {{$c->created_at}}</h2>
	      



	</div>
	<div class="row">
		<label class="col-sm-12" for="">Exámenes de laboratorio</label>
		<label class="col-sm-1">Hemoglobina</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->hemo}}
		<br>
		<strong>Fecha:</strong> {{$c->hemod}}
		</div>
		<label class="col-sm-1">Glucosa</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->glu}}
		<br>
		<strong>Fecha:</strong> {{$c->glud}}
		</div>
		<label class="col-sm-1">Plaquetas</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->plaquetas}}
		<br>
		<strong>Fecha:</strong> {{$c->plaqdate}}
		</div>
	</div>
	<br>
	<div class="row">
		<label class="col-sm-1">Urea</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->urea}}
		<br>
		<strong>Fecha:</strong> {{$c->uread}}
		</div>
		<label class="col-sm-1">Creatinina</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->creati}}
		<br>
		<strong>Fecha:</strong> {{$c->creatid}}
		</div>
		<label class="col-sm-1">HBSAg</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->hbsa}}
		<br>
		<strong>Fecha:</strong> {{$c->hbsad}}
		</div>
	</div>
	<br>
	<div class="row">
		<label class="col-sm-1">Orina completa</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong>{{$c->orinap}}
		<br>
		<strong>Fecha:</strong>{{$c->oridate}}
		</div>
		<label class="col-sm-1">Urocultivo</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->urocultivo}}
		<br>
		<strong>Fecha:</strong> {{$c->urodate}}
		</div>
		<label class="col-sm-1">VIH</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->vih}}
		<br>
		<strong>Fecha:</strong> {{$c->vihd}}
		</div>
	</div>
	<br>
	<div class="row">
		<label class="col-sm-1">Sifilis</label>
		<div class="col-sm-3">
		<strong>Resultado:</strong> {{$c->sifi}}
		<br>
		<strong>Fecha:</strong> {{$c->sifid}}
		</div>	
	</div>

		    	
</div>
  @endforeach





	
	
	</table>
</div>


   	
   </div>

 <div class="box-content"> 
        <form class="form-horizontal" role="form" method="post" action="control/create">
          {{ csrf_field() }}
          <div class="form-group">          
              <input type="hidden" name="evento" value="{{$evento->id}}">
            <h3>Control Prenatal Mensual de {{$paciente->nombres}} {{$paciente->apellidos}}</h3>
            <br>
            
             <input type="hidden" name="paciente" value="{{$paciente->id}}">
            <label for="">Fecha Control</label>
            <input type="date" name="fecha_cont" style="line-height: 20px"> 
            <br>

            <div class="row">

	            <label class="col-sm-1 control-label">Tiemp. Emb.</label>
	            <div class="col-sm-4">
	            	<input type="text" class="form-control" name="tiempoemb" placeholder="Tiempo de Embarazo" data-toggle="tooltip" data-placement="bottom" title="tiempoemb">
	            </div>
	            <div class="col-sm-1">
	              <select id="el23" name="gesta_semanas">
	              	<option value="" disabled selected hidden>Select</option>
	              	<option value="FUR">FUR</option>
	              	<option value="ECO">ECO</option>
	              </select>
	            </div>

	            <label class="col-sm-1 control-label">A.U.</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="altura_uterina" placeholder="Altura Uterina" data-toggle="tooltip" data-placement="bottom" title="altura uterina">
	            </div>
	        </div>
	        <div class="row">
	            <label class="col-sm-1 control-label">Peso</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="peso" placeholder="Peso" data-toggle="tooltip" data-placement="bottom" title="peso">
	            </div>

	            <label class="col-sm-1 control-label">Presentación</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="presentacion" placeholder="presentacion" data-toggle="tooltip" data-placement="bottom" title="presentacion">
	            </div>

	            <label class="col-sm-1 control-label">PA</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="tension" placeholder="PA" data-toggle="tooltip" data-placement="bottom" title="tension">
	            </div>

	            <label class="col-sm-1 control-label">L.C.F.</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="fcf" placeholder="LCF" data-toggle="tooltip" data-placement="bottom" title="lcf">
	            </div>

            	<label class="col-sm-1 control-label">Pulso</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="pulso_materno" placeholder="Pulso Materno" data-toggle="tooltip" data-placement="bottom" title="pulso_materno">
	            </div>

	             <label class="col-sm-1 control-label">Mov. Fetal</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="movimiento_fetal" placeholder="Movimiento Fetal" data-toggle="tooltip" data-placement="bottom" title="movimiento_fetal">
	            </div>

	            <label class="col-sm-1 control-label">Temp.</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="temp" placeholder="Temperatura" data-toggle="tooltip" data-placement="bottom" title="Temperatura">
	            </div>

	             <label class="col-sm-1 control-label">Edema</label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="edema" placeholder="Edema" data-toggle="tooltip" data-placement="bottom" title="edema">
	            </div>

	             <label class="col-sm-1 control-label">SO<sub>2</sub></label>
	            <div class="col-sm-5">
	              <input type="text" class="form-control" name="consejeria" placeholder="SO2" data-toggle="tooltip" data-placement="bottom" title="consejeria">
	            </div>

        	</div>
        	<br>
        	<h3>Exámenes de laboratorio</h3>
            <div class="row">

            	<label class="col-sm-1 control-label">Hemoglobina</label>
	            <div class="col-sm-3">
	             	<input type="text" name="hemo" style="line-height: 20px; width: 140px;">	
					<input type="date" name="hemod" style="line-height: 20px; width: 140px;">	
	            </div>

	            <label class="col-sm-1 control-label">Glucosa</label>
	            <div class="col-sm-3">
	               <input type="text" name="gluco" style="line-height: 20px; width: 140px;">
					<input type="date" name="glucod" style="line-height: 20px; width: 140px;">	
	            </div>

	            <label class="col-sm-1 control-label">Plaquetas</label>
	            <div class="col-sm-3">
	               <input type="text" name="plaquetas" style="line-height: 20px; width: 140px;">
					<input type="date" name="plaqdate" style="line-height: 20px; width: 140px;">	
	            </div>

        	</div>
        	<br>
        	<div class="row">
            	
            	<label class="col-sm-1 control-label">Urea</label>
	            <div class="col-sm-3">
	             	<input type="text" name="urea" style="line-height: 20px; width: 140px;">	
					<input type="date" name="uread" style="line-height: 20px; width: 140px;">	
	            </div>

	            <label class="col-sm-1 control-label">Creatinina</label>
	            <div class="col-sm-3">
	               <input type="text" name="creati" style="line-height: 20px; width: 140px;">
					<input type="date" name="creatid" style="line-height: 20px; width: 140px;">	
	            </div>

	            <label class="col-sm-1 control-label">HBSAg</label>
	            <div class="col-sm-3">
	               <input type="text" name="hbsa" style="line-height: 20px; width: 140px;">
					<input type="date" name="hbsad" style="line-height: 20px; width: 140px;">	
	            </div>

        	</div>
        	<br>
        	<div class="row">
            	
            	<label class="col-sm-1 control-label">Orina completa</label>
	            <div class="col-sm-3">
	             	<input type="text" name="orinap" style="line-height: 20px; width: 140px;">	
					<input type="date" name="oridate" style="line-height: 20px; width: 140px;">	
	            </div>

	            <label class="col-sm-1 control-label">Urocultivo</label>
	            <div class="col-sm-3">
	               <input type="text" name="urocultivo" style="line-height: 20px; width: 140px;">
					<input type="date" name="urodate" style="line-height: 20px; width: 140px;">	
	            </div>

	            <label class="col-sm-1 control-label">VIH</label>
	            <div class="col-sm-3">
	            	<input type="text" name="vih" style="line-height: 20px; width: 140px;">
					<input type="date" name="vihd" style="line-height: 20px; width: 140px;">
	            </div>

        	</div>
        	<br>
            <div class="row">

            	<label class="col-sm-1 control-label">Sifilis</label>
	            <div class="col-sm-3">
	            	<input type="text" name="sifi" style="line-height: 20px; width: 140px;">
					<input type="date" name="sifid" style="line-height: 20px; width: 140px;">
	            </div>

	        </div>
     
          

        </div>


            <br>
            <div class="col-sm-3">
            <input type="button" onclick="form.submit()" class="btn btn-primary" value="Guardar">  
            </div>                         
      </form>
  </div>











@section('scripts')


<script type="text/javascript">

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
	$("#el23").select2();
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
        $('#el2').on('change',function(){
          var link;
          if ($(this).val() ==  1) {
            link = '/antf/otro/';
          } else {
           his.GetType ();
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
        $('#el3').on('change',function(){
          var link;
          if ($(this).val() ==  1) {
            link = '/antp/otro/';
          } else {
           his.GetType ();
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
        $('#el12').on('change',function(){
          var link;
          if ($(this).val() ==  2) {
            link = '/af1/otros/';
          } else {
           link = '/af1/ningunof/';
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
            link = '/ap1/otros/';
          } else {
           link = '/ap1/ningunop/';
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
            link = '/apa1/otros/';
          } else {
           link = '/apa1/ningunopa/';
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
            link = '/aq1/otros/';
          } else {
           link = '/aq1/ningunoaq/';
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
            link = '/at1/otros/';
          } else {
           link = '/at1/ningunoat/';
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
            link = '/ag1/otros/';
          } else {
           link = '/ag1/ningunoag/';
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
            link = '/alerg1/si/';
          } else {
           link = '/alerg1/no/';
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