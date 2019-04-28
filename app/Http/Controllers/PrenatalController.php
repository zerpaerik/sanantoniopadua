<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pacientes\Paciente;
use App\Models\Historiales;
use App\Models\ConsultaMateriales;
use App\Models\Events\{Event, RangoConsulta};
use App\Models\Existencias\{Producto, Existencia, Transferencia};
use App\Models\Personal;
use App\Models\Ciex;
use App\Prenatal;
use App\Control;
use App\User;
use DB;
use Toastr;
use Auth;


class PrenatalController extends Controller
{

	public function index(){
    
        $prenatal = $this->elasticSearch('');
   
        return view('prenatal.index', ["prenatal" => $prenatal]);
	}

    public function search(Request $request)
    {
      $search = $request->dni;
      $split = explode(" ",$search);
    

      if (!isset($split[1])) {
       
        $split[1] = '';
        $prenatal = $this->elasticSearch($split[0],$split[1]);
      
        return view('prenatal.search', ["prenatal" => $prenatal]); 

      }else{
        $prenatal = $this->elasticSearch($split[0],$split[1]); 
      
        return view('prenatal.search', ["prenatal" => $prenatal]);   
      }    
    }

      private function elasticSearch($dni)
  {
  		$users = DB::table('users')
            ->select('*')
            ->where('id','=',\Auth::user()->id)
            ->first();

		$prenatal = DB::table('prenatals as a')
    	->select( 'a.id',
    			'a.pa',
				'a.id as consulta',
				'a.pulso',
				'a.temperatura',
				'a.peso',
				'a.talla',
				'a.fur',
				'a.motivo_consulta',
				'a.presuncion_diagnostica',
				'a.diagnostico_final',
				'a.CIEX',
				'a.CIEX2',
				'a.examen_auxiliar',
				'a.plan_tratamiento',
				'a.observaciones',
				'a.paciente_id',
				'a.profesional_id',
				'a.created_at',
				'a.prox',
				'a.personal',
				'a.card',
				'a.g',
				'a.p',
				'a.fechaemb',
				'a.tiempo_enf',
				'a.rnpeso',
				'a.anticon',
				'a.result',
				'a.gsan',
				'a.antepi',
				'a.ets',
				'a.etsotro',
				'a.exagen',
				'a.exareg',
				'a.so3',
				'a.phpa',
				'a.imc',
    			'a.antecedentes_familiar',
    			'a.antecedentes_personales',
    			'a.antecedentes_patologicos',
    			'a.antecedentes_quirurgicos',
    			'a.antecedentes_traumaticos',
    			'a.alergias',
    			'a.menarquia',
				'p.nombres',
				'p.apellidos',
				'p.dni',
				'p.id as idPaciente',
				'per.name as nombrePro',
				'per.lastname as apellidoPro',
				'per.id as profesionalId')
	    	->join('pacientes as p','p.id','a.paciente_id')
	    	->join('personals as per','per.id','=','a.profesional_id')
	        ->where('p.dni','like','%'.$dni.'%')
	        ->groupBy('a.paciente_id')
	        ->get();
	        return $prenatal;
  }

    public function createView(Request $request,$paciente,$evento)
    {
    	$event= Event::where('id','=',$evento)->first();
    	$control  = Control::where('id_paciente','=',$paciente)->get();
    	$prenatal = Prenatal::where('paciente_id',$paciente)->first();
    	$paciente = Paciente::where('id','=',$paciente)->first();
    	$personal = Personal::where('estatus','=',1)->get();
    	$productos = Producto::where('almacen','=',2)->where("sede_id", "=", $request->session()->get('sede'))->get();

    	$ciex = Ciex::all();

    	return view('prenatal.create',[
    		 'paciente' => $paciente,
    		 'prenatal' => $prenatal,
    		 'control' => $control,
    		 'evento' =>$event,
    		 'ciex' => $ciex,
    		 'productos' => $productos,
    		 'personal' => $personal,
    	]); 
    }
	public function createControlView($id)
	{
		$data = Prenatal::where('paciente_id',$id)->first();
		$paciente = Paciente::where('id',$data->paciente)->first();
		
		return view('prenatal.control-create',[
			'data' => $data,
			'paciente' => $paciente
		]);
	}
    public function show($id)
    {
       // $data = Prenatal::where('paciente', $id)->first();
  $paciente = Paciente::where('id',$id)->first();

        $prenatal = DB::table('prenatals as a')
    	->select( 'a.id',
				'a.pa',
				'a.id as consulta',
				'a.pulso',
				'a.temperatura',
				'a.peso',
				'a.talla',
				'a.fur',
				'a.motivo_consulta',
				'a.presuncion_diagnostica',
				'a.diagnostico_final',
				'a.CIEX',
				'a.CIEX2',
				'a.examen_auxiliar',
				'a.plan_tratamiento',
				'a.observaciones',
				'a.paciente_id',
				'a.profesional_id',
				'a.created_at',
				'a.prox',
				'a.personal',
				'a.card',
				'a.g',
				'a.p',
				'a.fechaemb',
				'a.tiempo_enf',
				'a.rnpeso',
				'a.anticon',
				'a.result',
				'a.gsan',
				'a.antepi',
				'a.ets',
				'a.etsotro',
				'a.exagen',
				'a.exareg',
				'a.so3',
				'a.phpa',
				'a.imc',
				'a.prs',
				'a.andria',
				'a.fecha',
    			'a.antecedentes_familiar',
    			'a.antecedentes_personales',
    			'a.antecedentes_patologicos',
    			'a.antecedentes_quirurgicos',
    			'a.antecedentes_traumaticos',
    			'a.antecedentes_geneticos',
    			'a.alergias',
    			'a.menarquia',
				'p.nombres',
				'p.apellidos',
				'p.dni',
				'p.id as idPaciente',
				'per.name as nombrePro',
				'per.lastname as apellidoPro',
				'per.id as profesionalId')
	    	->join('pacientes as p','p.id','a.paciente_id')
	    	->join('personals as per','per.id','=','a.profesional_id')
	        ->where('paciente_id','=',$id)
	        ->first();


       $control = Control::where('id_paciente','=',$id)->get();


       

        return view('prenatal.show',[
        	'prenatal' => $prenatal,
        	'control' => $control,
        	'paciente' => $paciente
        ]);
    }

    public function create(Request $request)
    {

          
    		
    		$users = DB::table('users')
            ->select('*')
            ->where('id','=',\Auth::user()->id)
            ->first();
    	
			$prenatal = new Prenatal;
			$prenatal->pa =$request->pa;
			$prenatal->pulso =$request->pulso;
			$prenatal->temperatura =$request->temperatura;
			$prenatal->peso =$request->peso;
			$prenatal->talla =$request->talla;
			$prenatal->fur =$request->fur;
			$prenatal->motivo_consulta =$request->motivo_consulta;
			$prenatal->andria =$request->andria;
			$prenatal->presuncion_diagnostica =$request->presuncion_diagnostica;
			$prenatal->diagnostico_final =$request->diagnostico_final;
			$prenatal->ciex =str_replace(["[", "]", '"', ","], ["", ".", "", ", "], json_encode($request->ciex));
			$prenatal->ciex2=str_replace(["[", "]", '"', ","], ["", ".", "", ", "], json_encode($request->ciex2));
			$prenatal->examen_auxiliar=$request->examen_auxiliar;
			$prenatal->plan_tratamiento =$request->plan_tratamiento;
			$prenatal->observaciones =$request->observaciones;
			$prenatal->paciente_id =$request->paciente_id;
			$prenatal->profesional_id =$request->profesional_id;
			$prenatal->prox =$request->prox;
			$prenatal->personal =$users->name . " " .$users->lastname;
			$prenatal->g =$request->g;
			$prenatal->p =$request->p;
			$prenatal->fechaemb =$request->fechaemb;
			$prenatal->card =$request->card;
			$prenatal->pendiente =$request->pendiente;
			$prenatal->antecedentes_familiar =$request->a_familiares;
			$prenatal->antecedentes_personales =$request->a_personales;
			$prenatal->antecedentes_patologicos =$request->a_patologicos;
			$prenatal->antecedentes_quirurgicos =$request->a_quirurgicos;
			$prenatal->antecedentes_traumaticos =$request->a_traumaticos;
			$prenatal->antecedentes_geneticos =$request->a_geneticos;
			$prenatal->alergias =$request->alergias;
			$prenatal->menarquia =$request->menarquia;
			$prenatal->prs =$request->prs;
			$prenatal->tiempo_enf =$request->tiempo_enf;
			$prenatal->rnpeso =$request->rnpeso;
			$prenatal->anticon =$request->anticon;
			$prenatal->result =$request->result;
			$prenatal->gsan =$request->gsan;
			$prenatal->antepi =$request->antepi;
			$prenatal->ets =$request->ets;
			$prenatal->etsotro =$request->etsotro;
			$prenatal->exagen =$request->exagen;
			$prenatal->exareg =$request->exareg;
			$prenatal->so3 =$request->so3;
			$prenatal->phpa =$request->phpa;
			$prenatal->fecha =$request->fecha;
			$prenatal->imc =number_format(($request->peso / ($request->talla * $request->talla)) * 10000, 2);
			$prenatal->save();

			$event = Event::find($request->evento);
			$event->atendido=1;
			$event->update();

			

			
			
			

		Toastr::success('Registrado Exitosamente.', 'Consulta Prenatal!', ['progressBar' => true]);

       return back();

		
    }

    public function af(){
     
      
    return view('prenatal.afotros');
  }

  public function ningunof(){
      
    return view('prenatal.ningunof');
  }

   public function ap(){
     
      
    return view('prenatal.apotros');
  }

    public function ningunop(){
      
    return view('prenatal.ningunop');
  }

   public function apa(){
     
      
    return view('prenatal.apaotros');
  }

    public function ningunopa(){
      
    return view('prenatal.ningunopa');
  }

    public function alsi(){
      
    return view('prenatal.alsi');
  }

     public function alno(){
      
    return view('prenatal.alno');
  }

    public function aq(){

      return view('prenatal.aqotros');
    }

    public function ningunoaq(){

      return view('prenatal.ningunoaq');
    }

    public function at(){

      return view('prenatal.atotros');
    }

    public function ningunoat(){

      return view('prenatal.ningunoat');
    }

    public function ag(){

      return view('prenatal.agotros');
    }

    public function ningunoag(){

      return view('prenatal.ningunoag');
    }

    public function verControl($id)
    {

    	$control = Control::where('id_paciente',$id)->get();
    	$paciente = Paciente::where('id',$id)->get();
    	$prenatal = Prenatal::where('paciente',$id)->get();
    	$view = \View::make('prenatal.reporte')->with('controles', $control)->with('pacientes', $paciente)->with('prenatal', $prenatal);
        $pdf = \App::make('dompdf.wrapper');
     //   $pdf->setPaper(array(0,0,867.00,343.80));
        $pdf->loadHTML($view);
        return $pdf->stream('resultados_ver');
    }

    public function createControl(Request $request)
    {

        $usuario = User::where('id','=', Auth::user()->id)->first();





    	Control::create([
    		"id_paciente" => $request->paciente,
			"id_ficha_prenatal" => $request->id_ficha_prenatal,
			"fecha_cont" => $request->fecha_cont,
			"gesta_semanas" => $request->gesta_semanas,
			"temp" => $request->temp,
			"tension" => $request->tension,
			"altura_uterina" => $request->altura_uterina,
			"presentacion" => $request->presentacion,
			"fcf" => $request->fcf,
			"movimiento_fetal" => $request->movimiento_fetal,
			"edema" => $request->edema,
			"pulso_materno" => $request->pulso_materno,
			"consejeria" => $request->consejeria,
			"responsable_control" => $usuario->name.' '.$usuario->lastname,
			"glu" => $request->gluco,
			"glud" => $request->glucod,
			"vih" => $request->vih,
			"vihd" => $request->vihd,
			"hemo" => $request->hemo,
			"hemod" => $request->hemod,
			"peso" => $request->peso,
			"orinap" => $request->orinap,
			"oridate" => $request->oridate,
			"urocultivo" => $request->urocultivo,
			"urodate" => $request->urodate,
			"antigeno_australiano" => $request->antigeno_australiano,
			"antdate" => $request->antdate,
			"vdrl" => $request->vdrl,
			"vdrldate" => $request->vdrldate,
			"plaquetas" => $request->plaquetas,
			"plaqdate" => $request->plaqdate,
			"urea" => $request->urea,
			"uread" => $request->uread,
			"sifi" => $request->sifi,
			"sifid" => $request->sifid,
			"hbsa" => $request->hbsa,
			"hbsad" => $request->hbsad,
			"creati" => $request->creati,
			"creatid" => $request->creatid,
			"tiempoemb" => $request->tiempoemb

    	]);

    	 $event = Event::find($request->evento);
		    $event->atendido=1;
		    $event->update();

    	Toastr::success('Registrado Exitosamente.', 'Control Prenatal!', ['progressBar' => true]);

		return back();

    }
}
