<?php 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Consulta;
use App\Http\Requests\CreateConsultaRequest;
use Carbon\Carbon;
use App\Historial;
use DB;
use App\Models\ConsultaMateriales;
use App\Models\Existencias\{Producto, Existencia, Transferencia,Historiales};
use App\Models\Pacientes\Paciente;
use App\Models\Personal;
use App\Models\Profesionales\Profesional;
use App\Models\Events\{Event, RangoConsulta};
use App\Models\Creditos;
use App\Models\Ciex;
use Toastr;
use Auth;

class ConsultaController extends Controller
{
   public function index(Request $request){



     if(! is_null($request->fecha)) {

      $f1 = $request->fecha;
      $f2 = $request->fecha2;  


      $atenciones = DB::table('events as a')
      ->select('a.id','a.paciente','a.created_at','a.tipo','a.prox','b.nombres','b.apellidos','a.prox')
      ->join('pacientes as b','b.id','a.paciente')
      ->whereBetween('a.prox', [date('Y-m-d 00:00:00', strtotime($f1)), date('Y-m-d 23:59:59', strtotime($f2))])
      ->get();


    } else {


      $atenciones = DB::table('events as a')
      ->select('a.id','a.paciente','a.created_at','a.tipo','a.prox','b.nombres','b.apellidos','a.prox')
      ->join('pacientes as b','b.id','a.paciente')
      ->whereDate('a.prox', '=',Carbon::today()->toDateString())
      ->orderby('a.id','desc')
      ->get();


      $f1 = Carbon::today()->toDateString();
      $f2 = Carbon::today()->toDateString();  




    }
      
       
        return view('consultas.proxima.index', ["atenciones" => $atenciones]);
    }


  
     public function indexh(Request $request){


      if(!is_null($request->paciente)){

        $historias = DB::table('events as e')
          ->select('e.id','e.paciente','e.title','e.profesional','e.date','e.time','p.dni','p.direccion','p.telefono','p.fechanac','p.gradoinstruccion','p.ocupacion','p.nombres','p.dni','p.apellidos','p.id as pacienteId',
      'a.pa','a.id as consultaid','a.pulso','a.temperatura','a.peso','a.talla','a.fur','a.motivo_consulta','a.presuncion_diagnostica','a.diagnostico_final','a.CIEX','a.CIEX2','a.examen_auxiliar','a.plan_tratamiento','a.observaciones','a.paciente_id','a.profesional_id','a.created_at','a.prox','a.personal','a.card','a.g','a.p','a.fechaemb','a.tiempo_enf','a.rnpeso','a.anticon','a.result','a.gsan','a.antepi','a.ets','a.etsotro','a.exagen','a.exareg','a.so3','a.phpa','a.imc',
      'a.antecedentes_familiar','a.antecedentes_personales','a.antecedentes_patologicos','a.antecedentes_quirurgicos','a.antecedentes_traumaticos','a.alergias','a.menarquia')
      ->join('consultas as a','a.paciente_id','e.paciente')
      ->join('pacientes as p','p.id','=','e.paciente')
      ->where('e.paciente','=',$request->paciente)
      ->orderby('a.id','desc')
      ->groupBy('a.id')
      ->get();

    } else {

      $historias = DB::table('events as e')
          ->select('e.id','e.paciente','e.title','e.profesional','e.date','e.time','p.dni','p.direccion','p.telefono','p.fechanac','p.gradoinstruccion','p.ocupacion','p.nombres','p.dni','p.apellidos','p.id as pacienteId',
      'a.pa','a.id as consultaid','a.pulso','a.temperatura','a.peso','a.talla','a.fur','a.motivo_consulta','a.presuncion_diagnostica','a.diagnostico_final','a.CIEX','a.CIEX2','a.examen_auxiliar','a.plan_tratamiento','a.observaciones','a.paciente_id','a.profesional_id','a.created_at','a.prox','a.personal','a.card','a.g','a.p','a.fechaemb','a.tiempo_enf','a.rnpeso','a.anticon','a.result','a.gsan','a.antepi','a.ets','a.etsotro','a.exagen','a.exareg','a.so3','a.phpa','a.imc',
      'a.antecedentes_familiar','a.antecedentes_personales','a.antecedentes_patologicos','a.antecedentes_quirurgicos','a.antecedentes_traumaticos','a.alergias','a.menarquia')
      ->join('consultas as a','a.paciente_id','e.paciente')
      ->join('pacientes as p','p.id','=','e.paciente')
      ->where('e.paciente','=',$request->paciente)
      ->orderby('a.id','desc')
      ->groupBy('a.id')
      ->get();



    }


    $pacientes = DB::table('pacientes as a')
    ->select('a.id','a.nombres','a.apellidos','a.dni','b.paciente_id')
    ->join('consultas as b','a.id','b.paciente_id')
    ->groupBy('a.id')
    ->get();

    return view('consultas.historias.index', ['historias' => $historias, 'pacientes' => $pacientes]);
	}


     public function indexp(){


      $historias = DB::table('events as e')
        ->select('e.id','e.paciente','e.title','e.profesional','e.date','e.time','p.dni','p.direccion','p.telefono','p.fechanac','p.gradoinstruccion','p.ocupacion','p.nombres','p.dni','p.apellidos','p.id as pacienteId',
    'per.name as nombrePro','per.lastname as apellidoPro','per.id as profesionalId','rg.start_time','rg.end_time','rg.id',
    'a.pa','a.id as consulta','a.pulso','a.temperatura','a.peso','a.talla','a.fur','a.motivo_consulta','a.presuncion_diagnostica','a.diagnostico_final','a.CIEX','a.CIEX2','a.examen_auxiliar','a.plan_tratamiento','a.observaciones','a.paciente_id','a.profesional_id','a.created_at','a.prox','a.personal','a.card','a.g','a.p','a.fechaemb','a.tiempo_enf','a.rnpeso','a.anticon','a.result','a.gsan','a.antepi','a.ets','a.etsotro','a.exagen','a.exareg','a.so3','a.phpa','a.imc','a.pendiente',
    'a.antecedentes_familiar','a.antecedentes_personales','a.antecedentes_patologicos','a.antecedentes_quirurgicos','a.antecedentes_traumaticos','a.alergias','a.menarquia')
    ->where('a.pendiente','=',1)
    ->join('consultas as a','a.paciente_id','e.paciente')
    ->join('pacientes as p','p.id','=','e.paciente')
    ->join('personals as per','per.id','=','e.profesional')
    ->join('rangoconsultas as rg','rg.id','=','e.time')
    ->groupBy('e.paciente')
    ->get();


    
   
        return view('consultas.historiasp.index', ["historias" => $historias]);
  }

   public function af(){
     
      
    return view('consultas.afotros');
  }

  public function ningunof(){
      
    return view('consultas.ningunof');
  }

   public function ap(){
     
      
    return view('consultas.apotros');
  }

    public function ningunop(){
      
    return view('consultas.ningunop');
  }

   public function apa(){
     
      
    return view('consultas.apaotros');
  }

    public function ningunopa(){
      
    return view('consultas.ningunopa');
  }

    public function alsi(){
      
    return view('consultas.alsi');
  }

     public function alno(){
      
    return view('consultas.alno');
  }

    public function aq(){

      return view('consultas.aqotros');
    }

    public function ningunoaq(){

      return view('consultas.ningunoaq');
    }

    public function at(){

      return view('consultas.atotros');
    }

    public function ningunoat(){

      return view('consultas.ningunoat');
    }

    public function ag(){

      return view('consultas.agotros');
    }

    public function ningunoag(){

      return view('consultas.ningunoag');
    }
	
	public function searchh(Request $request)
    {
      $search = $request->dni;
      $split = explode(" ",$search);
    
      if (!isset($split[1])) {
       
        $split[1] = '';
        $historias = $this->elasticSearch1($split[0],$split[1]);
      
        return view('consultas.historias.search', ["historias" => $historias]); 
      }else{
        $historias = $this->elasticSearch1($split[0],$split[1]); 
      
        return view('consultas.historias.search', ["historias" => $historias]);   
      }    
    }
	
  
  
      private function elasticSearch1($dni)
  { 
        $historias = DB::table('events as e')
        ->select('e.id','e.paciente','e.title','e.profesional','e.date','e.time','p.dni','p.direccion','p.telefono','p.fechanac','p.gradoinstruccion','p.ocupacion','p.nombres','p.dni','p.apellidos','p.id as pacienteId',
		'per.name as nombrePro','per.lastname as apellidoPro','per.id as profesionalId','rg.start_time','rg.end_time','rg.id',
		'a.pa','a.pulso','a.temperatura','a.peso','a.talla','a.fur','a.MAC','a.motivo_consulta','a.evolucion_enfermedad','a.examen_fisico_regional','a.presuncion_diagnostica','a.diagnostico_final','a.CIEX','a.CIEX2','a.examen_auxiliar','a.plan_tratamiento','a.observaciones','a.paciente_id','a.profesional_id','a.created_at','a.prox','a.personal','a.apetito','a.sed','a.orina','a.card','a.animo','a.deposiciones','a.g','a.p','a.fechaemb','a.tiempo_enf','a.rnpeso','a.anticon','a.result','a.gsan','a.antepi','a.ets','a.etsotro','a.exagen','a.exareg','a.so3','a.phpa','a.imc',
		'a.antecedentes_familiar','a.antecedentes_personales','a.antecedentes_patologicos','a.antecedentes_quirurgicos','a.antecedentes_traumaticos','a.alergias','a.menarquia')
		->join('consultas as a','a.paciente_id','e.paciente')
		->join('pacientes as p','p.id','=','e.paciente')
		->join('personals as per','per.id','=','e.profesional')
		->join('rangoconsultas as rg','rg.id','=','e.time')
		->where('p.dni','like','%'.$dni.'%')
		->groupBy('e.paciente')
        ->get();
        return $historias;
  }
  
  public function show(Request $request,$id)
  {

    $consultas = Consulta::where('id','=',$id)->first();
    $historial = Historial::where('paciente_id','=',$consultas->paciente_id)->first();
    $data= Paciente::where('id','=',$consultas->paciente_id)->first();
    $personal = Personal::where('estatus','=',1)->get();
    return view('consultas.historias.show',[
      'historial' => $historial,
      'consulta' => $consultas,
      'personal' => $personal,
      'data' => $data
    ]);
  }

   public function report(Request $request,$id)
  {

    $consultas = Consulta::where('id','=',$id)->first();
    $historial = Historial::where('paciente_id','=',$consultas->paciente_id)->first();
    $data= Paciente::where('id','=',$consultas->paciente_id)->first();
    $personal = Personal::where('estatus','=',1)->get();


    $edad = Carbon::parse($data->fechanac)->age;
 
    $view = \View::make('consultas.historias.reporte')->with('consulta', $consultas)->with('historial', $historial)->with('data', $data)->with('edad', $edad);
    $pdf = \App::make('dompdf.wrapper');
    $pdf->loadHTML($view);
    return $pdf->stream('historia_pdf');
  }



   public function editview(Request $request,$id)
  {
  
   /* $historias = DB::table('events as e')
        ->select('e.id','e.paciente','e.title','e.profesional','e.date','e.time','p.dni','p.direccion','p.telefono','p.fechanac','p.gradoinstruccion','p.ocupacion','p.nombres','p.dni','p.apellidos','p.id as pacienteId',
    'per.name as nombrePro','per.lastname as apellidoPro','per.id as profesionalId','rg.start_time','rg.end_time','rg.id',
    'a.pa','a.id as consulta','a.pulso','a.temperatura','a.peso','a.talla','a.fur','a.motivo_consulta','a.pendiente','a.presuncion_diagnostica','a.diagnostico_final','a.CIEX','a.CIEX2','a.examen_auxiliar','a.plan_tratamiento','a.observaciones','a.paciente_id','a.profesional_id','a.created_at','a.andria','a.prox','a.personal','a.card','a.g','a.p','a.fechaemb','a.tiempo_enf','a.rnpeso','a.anticon','a.result','a.gsan','a.antepi','a.ets','a.etsotro','a.exagen','a.exareg','a.so3','a.phpa','a.imc',
    'a.antecedentes_familiar','a.antecedentes_personales','a.antecedentes_patologicos','a.antecedentes_quirurgicos','a.antecedentes_traumaticos','a.alergias','a.menarquia')
    ->join('consultas as a','a.paciente_id','e.paciente')
    ->join('pacientes as p','p.id','=','e.paciente')
    ->join('personals as per','per.id','=','e.profesional')
    ->join('rangoconsultas as rg','rg.id','=','e.time')
    ->where('a.id','=',$id)
    ->first();

    */

    $historias=Consulta::where('id','=',$id)->first();

    $especialistas =  Personal::where('tipo','=','Especialista')->orwhere('tipo','=','Tecnòlogo')->orwhere('tipo','=','ProfSalud')->where('estatus','=','1')->get();

    $tiempos = RangoConsulta::all();

    $productos = Producto::where('almacen','=',1)->where("sede_id", "=", $request->session()->get('sede'))->get();
    
    $ciex = Ciex::all();

        $personal = Personal::where('estatus','=',1)->get();


    return view('consultas.historiasp.edit',[
      'historias' => $historias,
      'especialistas' => $especialistas,
      'tiempos' => $tiempos,
      'ciex' => $ciex,
      'personal' => $personal,
      'productos' => $productos
    ]);   
  
  }




    public function create(Request $request)
    {

  
      $users = DB::table('users')
            ->select('*')
            ->where('id','=',\Auth::user()->id)
            ->first();
    	
		$consulta = new Consulta;
		$consulta->pa =$request->pa;
		$consulta->pulso =$request->pulso;
		$consulta->temperatura =$request->temperatura;
		$consulta->peso =$request->peso;
    $consulta->talla =$request->talla;
		$consulta->fur =$request->fur;
		$consulta->motivo_consulta =$request->motivo_consulta;
    $consulta->andria =$request->andria;
    $consulta->genext =$request->genext;
		$consulta->presuncion_diagnostica =$request->presuncion_diagnostica;
		$consulta->diagnostico_final =$request->diagnostico_final;
		$consulta->ciex =str_replace(["[", "]", '"', ","], ["", ".", "", ", "], json_encode($request->ciex));
		$consulta->ciex2=str_replace(["[", "]", '"', ","], ["", ".", "", ", "], json_encode($request->ciex2));
		$consulta->examen_auxiliar=$request->examen_auxiliar;
		$consulta->plan_tratamiento =$request->plan_tratamiento;
		$consulta->observaciones =$request->observaciones;
		$consulta->paciente_id =$request->paciente_id;
		$consulta->profesional_id =$request->profesional_id;
		$consulta->prox =$request->prox;
		$consulta->personal =$users->name . " " .$users->lastname;
		$consulta->g =$request->g;
		$consulta->p =$request->p;
    $consulta->fechaemb =$request->fechaemb;
		$consulta->card =$request->card;
    $consulta->pendiente =$request->pendiente;
    $consulta->antecedentes_familiar =$request->a_familiares;
    $consulta->antecedentes_personales =$request->a_personales;
    $consulta->antecedentes_patologicos =$request->a_patologicos;
    $consulta->antecedentes_quirurgicos =$request->a_quirurgicos;
    $consulta->antecedentes_traumaticos =$request->a_traumaticos;
    $consulta->antecedentes_geneticos =$request->a_geneticos;
    $consulta->alergias =$request->alergias;
    $consulta->menarquia =$request->menarquia;
    $consulta->prs =$request->prs;
    $consulta->tiempo_enf =$request->tiempo_enf;
    $consulta->rnpeso =$request->rnpeso;
    $consulta->anticon =$request->anticon;
    $consulta->result =$request->result;
    $consulta->gsan =$request->gsan;
    $consulta->antepi =$request->antepi;
    $consulta->ets =$request->ets;
    $consulta->etsotro =$request->etsotro;
    $consulta->exagen =$request->exagen;
    $consulta->exareg =$request->exareg;
    $consulta->so3 =$request->so3;
    $consulta->phpa =$request->phpa;
    $consulta->fecha =$request->fecha;
    $consulta->imc =number_format(($request->peso / ($request->talla * $request->talla)) * 10000, 2);
		$consulta->save();

    $event = Event::find($request->evento);
    $event->atendido=1;
    $prox->prox=$request->prox;
    $event->update();


		
		
	
	  Toastr::success('Registrado Exitosamente.', 'Consulta!', ['progressBar' => true]);
      return redirect()->action('Events\EventController@all', ["edited" => $consulta]);
		 
    }
      public function edit(Request $request)
    {

      $users = DB::table('users')
            ->select('*')
            ->where('id','=',\Auth::user()->id)
            ->first();
      
    $consulta = Consulta::find($request->id);
    $consulta->pa =$request->pa;
    $consulta->pulso =$request->pulso;
    $consulta->temperatura =$request->temperatura;
    $consulta->peso =$request->peso;
    $consulta->talla =$request->talla;
    $consulta->fur =$request->fur;
    $consulta->motivo_consulta =$request->motivo_consulta;
    $consulta->andria =$request->andria;
    $consulta->genext =$request->genext;
    $consulta->presuncion_diagnostica =$request->presuncion_diagnostica;
    $consulta->diagnostico_final =$request->diagnostico_final;
    $consulta->ciex =str_replace(["[", "]", '"', ","], ["", ".", "", ", "], json_encode($request->ciex));
    $consulta->ciex2=str_replace(["[", "]", '"', ","], ["", ".", "", ", "], json_encode($request->ciex2));
    $consulta->examen_auxiliar=$request->examen_auxiliar;
    $consulta->plan_tratamiento =$request->plan_tratamiento;
    $consulta->observaciones =$request->observaciones;
    $consulta->paciente_id =$request->paciente_id;
    $consulta->profesional_id =$request->profesional_id;
    $consulta->prox =$request->prox;
    $consulta->personal =$users->name . " " .$users->lastname;
    $consulta->g =$request->g;
    $consulta->p =$request->p;
    $consulta->fechaemb =$request->fechaemb;
    $consulta->card =$request->card;
    $consulta->pendiente =$request->pendiente;
    $consulta->antecedentes_familiar =$request->a_familiares;
    $consulta->antecedentes_personales =$request->a_personales;
    $consulta->antecedentes_patologicos =$request->a_patologicos;
    $consulta->antecedentes_quirurgicos =$request->a_quirurgicos;
    $consulta->antecedentes_traumaticos =$request->a_traumaticos;
    $consulta->antecedentes_geneticos =$request->a_geneticos;
    $consulta->alergias =$request->alergias;
    $consulta->menarquia =$request->menarquia;
    $consulta->prs =$request->prs;
    $consulta->tiempo_enf =$request->tiempo_enf;
    $consulta->rnpeso =$request->rnpeso;
    $consulta->anticon =$request->anticon;
    $consulta->result =$request->result;
    $consulta->gsan =$request->gsan;
    $consulta->antepi =$request->antepi;
    $consulta->ets =$request->ets;
    $consulta->etsotro =$request->etsotro;
    $consulta->exagen =$request->exagen;
    $consulta->exareg =$request->exareg;
    $consulta->so3 =$request->so3;
    $consulta->phpa =$request->phpa;
    $consulta->fecha =$request->fecha;
    $consulta->save();


    
  
    Toastr::success('Editado Exitosamente.', 'Historia!', ['progressBar' => true]);
      return redirect()->action('ConsultaController@indexp', ["edited" => $consulta]);
     
    }
}
 ?>