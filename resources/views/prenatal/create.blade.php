
@extends('layouts.app')
@section('content')

	@if($prenatal)
	<h2>Control Prenatal Base de {{$paciente->nombres}} {{$paciente->apellidos}}</h2>
	<div class="row">
		    <strong><p>I. Antecedentes Obstètricos</p></strong>
			<div class="col-sm-8">
              
            <div class="col-sm-3">
            	<strong><p>Gestas:</strong> {{$prenatal->gesta}}</p>  
            </div>

            
            <div class="col-sm-3">
            	<strong><p>Aborto:</strong> {{$prenatal->aborto}}</p> 
            </div>

            
            <div class="col-sm-3">
            	<strong><p>Vaginales:</strong> {{$prenatal->vaginales}}</p> 
            </div>

            
            <div class="col-sm-3">
            	<strong><p>Nac. Vivos:</strong> {{$prenatal->vivos}}</p> 
            </div>
          </div>

          <div class="col-sm-4">
            <div class="row">
            <div class="col-sm-7">
            	<strong><p>Viven:</strong> {{$prenatal->viven}}</p> 
            </div>
            </div>
            <div class="row">
            <div class="col-sm-7">
            	<strong><p>Mueren 1Sem:</strong> {{$prenatal->semana1}}</p> 
            </div>
            </div>
            <div class="row">
            <div class="col-sm-7">
            	<strong><p>Mueren 2Sem:</strong> {{$prenatal->semana2}}</p> 
            </div>
            </div>

          </div>

          <div class="col-sm-8" style="margin-top: -50px;">
            <div class="col-sm-3">
            	<p>{{$prenatal->num}}</p>
            </div>
            <div class="col-sm-3">
            	<strong><p>Partos:</strong> {{$prenatal->parto}}</p>
            </div>

            <div class="col-sm-3">
            	<strong><p>Cesarea:</strong> {{$prenatal->cesaria}}</p>
            </div>

            <div class="col-sm-3">
            	<strong><p>Nac.Muertos:</strong> {{$prenatal->muertos}}</p>
            </div>
          </div>
		    <br>
	</div>
	<div class="row">
		<div class="col-md-6">
			@if($prenatal->af == '1')
		    <strong><p>II. Antecedentes Familiares</p></strong>
		    Otro: {{$prenatal->at_fami}}
		    @else
		    <strong><p>II. Antecedentes Familiares</p></strong>
		    {{ $prenatal->af }}
		    @endif
		</div>
		<div class="col-md-6">
			@if($prenatal->ap == '1')
			<strong><p>II. Antecedentes Personales</p></strong>
		    Otro: {{$prenatal->at_perso}}
		    @else
		    <strong><p>II. Antecedentes Personales</p></strong>
		    {{ $prenatal->ap }}
		    @endif
		</div>
    </div>
    <br>

    <div class="row">
   <strong><p>III. Fin de Gestaciòn Anterior</p></strong>
   <div class="col-md-3">
   	<strong>Terminaciòn:</strong> {{ $prenatal->terminacion_gestacion }}
   	
   </div>

    <div class="col-md-3">

    <strong>Fecha:</strong> {{ $prenatal->fecha_terminacion }}

   	
   </div>

    <div class="col-md-3">

    <strong>Tipò de Aborto:</strong> {{ $prenatal->aborto_gestacion }}
   	
   </div>

    <div class="col-md-3">

    <strong>RN Mayor Peso:</strong>{{ $prenatal->peso_gestacion }} Kg
   	
   </div>

    </div>
    <br>
    <div class="row">
    <strong><p>IV. Peso y Talla</p></strong>
    	<div class="col-md-3">
    		<strong>Peso:</strong>{{ $prenatal->peso_pregestacional }} Kg
    	</div>

    	<div class="col-md-3">
			<strong>Talla:</strong>{{ $prenatal->talla_pregestacional }} Cms
    	</div>
    	
    	<div class="col-md-3">
    		   <strong>IMC:</strong>{{ $prenatal->imc }}
    	</div>

    	<div class="col-md-3">
    		<strong>Conclusión:</strong>
	    	@if($prenatal->imc <= 24)
	    	<strong>Normal</strong>
	    	@elseif($prenatal->imc <=29)
	    	<strong>Sobrepeso</strong>
	    	@elseif($prenatal->imc <=34)
	    	<strong>Obesidad I</strong>
	    	@elseif($prenatal->imc >= 35)
	    	<strong>Obesidad II</strong>
	    	@endif
    	</div>
    	
    </div>
    <br>
<div class="row">
	<div class="col-md-6">
<strong><p>V. Tipo de Sangre</p></strong>	

	<div class="col-md-3">
		<strong>Grupo</strong>: {{ $prenatal->sangre }}
		
	</div>

	<div class="col-md-3">
		<strong>RH</strong>: {{ $prenatal->sangrerh }}
		
	</div>
	</div>

<div class="col-md-6">
			<strong><p>VI. F.U.M</p></strong>	

	<div class="col-md-2">
		<strong>FUM</strong>: {{ $prenatal->ultima_menstruacion }}
		
	</div>


	<div class="col-md-2">

	<strong>FPP</strong>: {{ $prenatal->parto_probable }}
		
	</div>

	<div class="col-md-4">

	<strong>ECO EG</strong>: {{ $prenatal->eco_eg }}
		{{ $prenatal->eco_eg_text}}
	</div>

	</div>
</div>
<br>
<div class="row">
	<strong><p>Examenes</p></strong>	

	<div class="col-md-2">

		<strong>Orina</strong>: {{ $prenatal->orina }}
		
	</div>

		<div class="col-md-2">
					<strong>Urea</strong>: {{ $prenatal->urea }}

		
	</div>

		<div class="col-md-2">

					<strong>Creatinina</strong>: {{ $prenatal->creatinina }}

		
	</div>

		<div class="col-md-2">

					<strong>BK</strong>: {{ $prenatal->bic }}

		
	</div>

		<div class="col-md-2">

					<strong>Torch</strong>: {{ $prenatal->torch }}

		
	</div>
	
</div>
<br>

	@else
	<h4>Este usuario no cuenta con un historial base, por favor agregue uno</h4>
			<div class="box-content">	
				<form class="form-horizontal" role="form" method="post" action="prenatal/create">
					{{ csrf_field() }}

		             <input type="hidden" name="paciente" value="{{$paciente->id}}">
						<h3>I. Antecedentes Obstetricos</h3>

						<div class="col-sm-8">
              
				            <div class="col-sm-3">
				              <input type="text" class="form-control" name="gesta" placeholder="gesta" data-toggle="tooltip" data-placement="bottom" title="gesta">
				              <label class="col-sm-2 control-label">Gestas</label>
				            </div>

				            
				            <div class="col-sm-3">
				              <input type="text" class="form-control" name="aborto"   placeholder="Noabortombres" data-toggle="tooltip" data-placement="bottom" title="aborto">
				              <label class="col-sm-2 control-label">Aborto</label>
				            </div>

				            
				            <div class="col-sm-3">
				              <input type="text" class="form-control" name="vaginales"   placeholder="vaginales" data-toggle="tooltip" data-placement="bottom" title="vaginales">
				              <label class="col-sm-2 control-label">Vaginales</label>
				            </div>

				            
				            <div class="col-sm-3">
				              <input type="text" class="form-control" name="vivos" placeholder="vivos"  data-toggle="tooltip" data-placement="bottom" title="vivos">
				              <label class="col-sm-2 control-label">Nac.Vivos</label>
				            </div>
				          </div>

				          <div class="col-sm-4">
				            <div class="row">
				            <div class="col-sm-4">
				              <input type="text" class="form-control" name="viven" placeholder="viven"  data-toggle="tooltip" data-placement="bottom" title="viven">
				              <label class="col-sm-2 control-label">Viven</label>
				            </div>
				            </div>
				            <div class="row">
				            <div class="col-sm-4">
				              <input type="text" class="form-control" name="semana1" placeholder="semana1"  data-toggle="tooltip" data-placement="bottom" title="semana1">
				              <label class="col-sm-2 control-label">Mueren.1Sem</label>
				            </div>
				            </div>
				            <div class="row">
				            <div class="col-sm-4">
				              <input type="text" class="form-control" name="semana2" placeholder="semana2"   data-toggle="tooltip" data-placement="bottom" title="semana2">
				              <label class="col-sm-2 control-label">Despues.1Sem</label>
				            </div>
				            </div>

				          </div>

				          <div class="col-sm-8" style="margin-top: -50px;">
				            <div class="col-sm-3">
			                <select id="el1" name="num">
			                	<option value="" disabled hidden selected>Seleccione</option>
			                	<option value="0o+3">0 o +3</option>
								<option value="<2500gr"><2500gr</option>
								<option value="Gemelar">Gemelar</option>
								<option value="37 sem">37 sem</option>           	
			                </select>
				            </div>
				            <div class="col-sm-3">
				                <input type="text" class="form-control" name="parto" placeholder="parto"  data-toggle="tooltip" data-placement="bottom" title="parto">
				                <label class="col-sm-2 control-label">Partos</label>
				            </div>

				            <div class="col-sm-3">
				                <input type="text" class="form-control" name="cesaria" placeholder="cesarea"  data-toggle="tooltip" data-placement="bottom" title="cesaria">
				                <label class="col-sm-2 control-label">Cesarea</label>
				            </div>

				            <div class="col-sm-3">
				                <input type="text" class="form-control" name="muertos" placeholder="muertos"  data-toggle="tooltip" data-placement="bottom" title="muertos">
				                <label class="col-sm-2 control-label">Nac.Muertos</label>
				            </div>
				          </div>

					<br>

					<div class="row">

						<div class="col-md-6">


						   <h3>II. Antecedentes Familiares</h3>
					    <p>
							
                         <div class="col-sm-12">
							<select id="el2" multiple="true" name="af[]" style="width: 350px;">
							<option value="Ninguno">Ninguno</option>
							<option value="Alergias">Alergias</option>
							<option value="Anomalias Congenitas">Anomalias Congenitas</option>
							<option value="Epilepsia">Epilepsia</option>
							<option value="Diabetes">Diabetes</option>
							<option value="Gemelares">Gemelares</option>
							<option value="Hipertension Arterial">Hipertension Arterial</option>
							<option value="Neoplasia">Neoplasia</option>
							<option value="TBC Pulmonar">TBC Pulmonar</option>
							<option value="1">Otro</option>
						    </select>
						</div>
						</p>
						<div class="col-sm-12">
						<br>
							<div id="af1"></div>
						</div>

						</div>

						<div class="col-md-6">


						   <h3>III. Antecedentes Personales</h3>
					    <p>
							
                         <div class="col-sm-12">
							<select id="el3" multiple="true" name="ap[]" style="width: 350px;">
							<option value="Ninguno">Ninguno</option>
							<option value="Alergias">Alergias</option>
							<option value="Anomalias Congenitas">Anomalias Congenitas</option>
							<option value="Epilepsia">Epilepsia</option>
							<option value="Diabetes">Diabetes</option>
							<option value="Gemelares">Gemelares</option>
							<option value="Hipertension Arterial">Hipertension Arterial</option>
							<option value="Neoplasia">Neoplasia</option>
							<option value="TBC Pulmonar">TBC Pulmonar</option>
							<option value="1">Otro</option>
						    </select>
						</div>
						</p>
						<div class="col-sm-12">
						<br>
							<div id="ap1"></div>
						</div>

						</div>


          			</div>

          			<br>

          	<div class="row">


						<h3>IV. Fin Gestacion Anterior</h3>
						<div class="col-md-3">
							<label for="">Terminación de gestación:</label>
							<select id="el4" name="terminacion_gestacion" style="width: 200px;">
								<option value="" disabled selected hidden>Seleccione</option>
								<option value="Parto">Parto</option>
								<option value="Aborto">Aborto</option>
								<option value="Ectopico">Ectopico</option>
								<option value="Molar">Molar</option>
								<option value="Otro">Otro</option>
								<option value="Noaplica">No aplica</option>
						    </select>
						</div>

			          	<div class="col-md-3">


						<label for="">Fecha:</label>
						<div class="row">
							<div class="col-md-3">
								<input type="date" name="fecha_terminacion" style="line-height: 20px">
							</div>
						</div>
						</div>

			          	<div class="col-md-3">

						<label for="">Si fue aborto, qué tipo de aborto:</label>
						<select id="el5" name="aborto_gestacion" style="width: 200px;">
							<option value="" disabled selected hidden>Seleccione</option>
							<option value="Incompleto">Incompleto</option>
							<option value="Completo">Completo</option>
							<option value="Frustro">Frustro</option>
							<option value="Septico">Septico</option>
							<option value="Otro">Otro</option>
							<option value="Noaplica">No aplica</option>
						</select>
						
					</div>

				<div class="col-md-3">

						<label for="">RN de mayor peso:</label>
						<input type="text" name="peso_gestacion">Gr
						<br>
					</div>

			</div>
			<br>
                      
						<div class="row">
						<h3>V. Peso y Talla</h3>
						<div class="col-md-4">
						<label for="">Peso KG.</label>
						<input type="text" name="peso_pregestacional">
					    </div>
					    <div class="col-md-4">
						<label for="">Talla (Cm)</label>
						<input type="text" name="talla_pregestacional">
						</div>

						</div>
						<br>

						<div class="row">
					<div class="col-md-4">		


						<h3>VI. Tipo de Sangre</h3>	
						<div class="col-md-3">	
						<label for="">Grupo</label>
							<p>

					    <select id="el6" name="sangre">
							<option value="A">A</option>
							<option value="B">B</option>
						     <option value="AB">AB</option>
							<option value="O">O</option>
						</select>
						</p>
					     </div>
					     <div class="col-md-6">
						<label for="">RH</label>
							<p>
							
							<select id="el7" name="sangrerh">
							<option value="Rh+">Rh+</option>
							<option value="Rh-Sen Desc">Rh-Sen Desc</option>
						     <option value="Rh-Nosen">Rh-Nosen</option>
							<option value="Rh-Sen">Rh-Sen</option>
						</select>
						</p>
					     </div>
					 </div>
					 <div class="col-md-8">

					     <h3>VI. F.U.M</h3>	

					     <div class="col-md-2">
                        <label for="">FUM</label>
						<input type="date" name="ultima_menstruacion" style="line-height: 20px">
					     </div>


					     <div class="col-md-2">
                        <label for="">FPP</label>
						<input type="date" name="parto_probable" style="line-height: 20px">
					     </div>

					      <div class="col-md-2">
                        <label for="">Eco: EG</label>
						<input type="date" name="eco_eg" style="line-height: 20px; width: 130px;">	
						<input type="text" name="eco_eg_text" style="line-height: 20px; width: 130px;">
					     </div>



					  </div>


					</div>

					<div class="row">

					<div class="col-md-2">

					<h3>Orina</h3>	
					<p>
						<select id="el8" name="orina">
							<option value="Normal">Normal</option>
							<option value="Anormal">Anormal</option>
						    <option value="No">No se hizo</option>
						</select>

						<input type="date" name="orinad" style="line-height: 20px; width: 140px;">	
						</p>

					</div>	

					<div class="col-md-2">

					<h3>Urea</h3>	
					<p>
							
						<input type="text" name="urea" style="line-height: 23px; width: 140px;">	

						<input type="date" name="uread" style="line-height: 20px; width: 140px;">	
						</p>

					</div>	

					<div class="col-md-2">

					<h3>Creati.</h3>	
					<p>
							
						<input type="text" placeholder="creatinina" name="creatinina" style="line-height: 23px; width: 140px;">	

						<input type="date" name="creatininad" style="line-height: 20px; width: 140px;">	
						</p>

					</div>

					<div class="col-md-2">

					<h3>BK</h3>	
					<p>
							
							<select id="el9" name="bic">
							<option value="SinExamen">Sin Examen</option>
							<option value="Neg">Negativo</option>
						     <option value="Pos">Positivo</option>
						     <option value="N/A">N/A</option>
						</select>

						<input type="date" name="bicd" style="line-height: 20px; width: 140px;">	
						</p>

					</div>	

					<div class="col-md-2">

					<h3>TORCH</h3>	
					<p>
							
							<select id="el10" name="torch">
							<option value="Normal">Normal</option>
							<option value="Anormal">Anormal</option>
						     <option value="No">No se hizo</option>
						</select>

						<input type="date" name="torchd" style="line-height: 20px; width: 140px;">	
						</p>

					</div>		


						
					</div>



						
							<input type="button" onclick="form.submit()" class="btn btn-primary" value="Guardar">														
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
	              <select id="el16" name="gesta_semanas">
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
<script src="{{ asset('plugins/sheepit/jquery.sheepItPlugin.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('plugins/multi-select/js/jquery.multi-select.js') }}" type="text/javascript"></script>



<script type="text/javascript">

// Run Select2 on element
function Select2Test(){
	$("#el1").select2();
	$("#el2").select2();
	$("#el3").select2();
	$("#el4").select2();
  	$("#el5").select2();
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

$('#my-select').multiSelect()
$('#my-select2').multiSelect()



</script>



   
@endsection	
@endsection