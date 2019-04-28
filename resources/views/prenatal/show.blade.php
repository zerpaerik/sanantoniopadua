@extends('layouts.app')
@section('content')
<br>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <div class="box-name">
          <i class="fa fa-users"></i>
          <span><strong>Control Prenatal del Paciente: {{$paciente->nombres}},{{$paciente->apellidos}}</strong></span>

        </div>
        <div class="box-icons">
          <a class="collapse-link">
            <i class="fa fa-chevron-up"></i>
          </a>
          <a class="expand-link">
            <i class="fa fa-expand"></i>
          </a>
        </div>
        <div class="no-move"></div>
      </div>
      <div class="box-content"> 
          {{ csrf_field() }}
        <div class="row">

        <h3>II. ANAMNESIS</h3>
        <p class="col-sm-6"><strong>Motivo de Consulta:</strong>{{ $prenatal->motivo_consulta }}</p>
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




            
          </div>
        </div>

           <div class="box-content">
    <div style="background: #eaeaea;">
  <table style="width: 100%;text-align: center;margin: 10px 0;border:1px solid black;">

    <tr>
      <div>

    <th scope="col" style="background: #2E9AFE;">CONTROLES PRENATALES de {{$paciente->nombres}} {{$paciente->apellidos}}
      @foreach($control as $c)
      <td scope="col" style="background: #2E9AFE;"></td>
      @endforeach
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
  
    <label class="col-sm-12" for="">Exámenes de laboratorio</label>
  <div class="row">
    <label class="col-sm-1">Hemoglobina</label>
    <div class="col-sm-3" style="margin-left: 5px;">
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
    <div class="col-sm-3" style="margin-left: -5px;">
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