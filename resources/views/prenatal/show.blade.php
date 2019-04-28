@extends('layouts.app')
@section('content')
<br>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-name">
          <i class="fa fa-users"></i>
          <span><strong>Control Prenatal del Paciente: {{$data->nombres}},{{$data->apellidos}}</strong></span>
            <span><strong>Fecha: {{$data->created_at}}</strong></span>
    <div class="col-sm-12">
      <div class="rows">

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

           @foreach($control as $c)

    <h2>Control Mensual de {{$data->nombres}} {{$data->apellidos}}</h2>
    <h2>Fecha {{$c->created_at}}</h2>

     <div class="row">

            <label class="col-sm-1 control-label">Gestaciòn</label>
            <div class="col-sm-3">
              {{$c->gesta_semanas}}
            </div>

            <label class="col-sm-1 control-label">PesoMadre.</label>
            <div class="col-sm-3">
             
              {{$c->peso_madre}}
            </div>

            <label class="col-sm-1 control-label">Temp.</label>
            <div class="col-sm-3">
              {{$c->temp}}
            </div>

            </div>
            <div class="row">

            <label class="col-sm-1 control-label">Tensiòn.</label>
            <div class="col-sm-3">
              {{$c->tension}}
            </div>

             <label class="col-sm-1 control-label">Alt.Ute.</label>
            <div class="col-sm-3">
            {{$c->altura_uterina}}
            </div>

            <label class="col-sm-1 control-label">Presentaciòn.</label>
            <div class="col-sm-3">
               {{$c->presentacion}}
            </div>

            </div>

                        <div class="row">


            <label class="col-sm-1 control-label">F.C.F.</label>
            <div class="col-sm-3">
              {{$c->fcf}}
            </div>

             <label class="col-sm-1 control-label">Movimiento.</label>
            <div class="col-sm-3">
               {{$c->movimiento_fetal}}
            </div>

             <label class="col-sm-1 control-label">Edema.</label>
            <div class="col-sm-3">
               {{$c->edema}}
            </div>
        </div>

                    <div class="row">


             <label class="col-sm-1 control-label">Pulso.</label>
            <div class="col-sm-3">
               {{$c->pulso_materno}}
            </div>


             <label class="col-sm-1 control-label">Consejeria</label>
            <div class="col-sm-3">
              {{$c->consejeria}}
            </div>


             <label class="col-sm-1 control-label">Vitaminas.</label>
            <div class="col-sm-3">
              {{$c->sulfato}}
            </div>

        </div>

                    <div class="row">



             <label class="col-sm-1 control-label">Perfil.</label>
            <div class="col-sm-3">
              {{$c->perfil_biofisico}}
            </div>


             <label class="col-sm-1 control-label">Visita.</label>
            <div class="col-sm-3">
               {{$c->visita_domicilio}}
            </div>

             <label class="col-sm-1 control-label">Establ.</label>
            <div class="col-sm-3">
            
               {{$c->establecimiento_atencion}}
            </div>

        </div>

             <label class="col-sm-1 control-label">Responsable.</label>
            <div class="col-sm-3">

                             {{$c->responsable_control}}

            </div> 

            <label class="col-sm-1 control-label">Examenes.</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="EXAMENES" placeholder="EXAMENES" data-toggle="tooltip" data-placement="bottom" title="responsable_control" readonly="true">
            </div> 


            <label class="col-sm-1 control-label">.</label>
            <div class="col-sm-3">
              <input type="text" class="form-control" name="EXAMENES" placeholder="EXAMENES" data-toggle="tooltip" data-placement="bottom" title="responsable_control" readonly="true">
            </div> 



          
                    <div class="row">



             <label class="col-sm-1 control-label">Serologia</label>
            <div class="col-sm-2">
            <strong>Resultado:</strong>:{{$c->sero}}
             <strong>Fecha:</strong>:{{$c->serod}}


            </div>


             <label class="col-sm-1 control-label">Glucosa</label>
            <div class="col-sm-2">
                 <strong>Resultado:</strong>:{{$c->glu}}
             <strong>Fecha:</strong>:{{$c->glud}}

            </div>

             <label class="col-sm-1 control-label">VIH</label>
            <div class="col-sm-2">
                  <strong>Resultado:</strong>:{{$c->vih}}
             <strong>Fecha:</strong>:{{$c->vihd}}

            </div>

            <label class="col-sm-1 control-label">Hemoglobina</label>
            <div class="col-sm-2">
                  <strong>Resultado:</strong>:{{$c->hemo}}
             <strong>Fecha:</strong>:{{$c->hemod}}

            </div>

        </div>


   @endforeach



            
          </div>
          </div>                                                                                                                    
          </div>
        </div>
        </form>
      </div>  
    </div>
  </div>
</div>

@endsection