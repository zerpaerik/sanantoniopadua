@extends('layouts.app')

@section('content')

<body>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-linux"></i>
					<span>Pròximas Citas</span>

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
			{!! Form::open(['method' => 'get', 'route' => ['proximacita.index']]) !!}

			<div class="row">
				<div class="col-md-2">
					<label>Fecha Inicio</label>
					<input type="date" value="{{$f1}}" name="fecha" style="line-height: 20px">
				</div>
				<div class="col-md-2">
					<label>Fecha Fin</label>
					<input type="date" value="{{$f2}}" name="fecha2" style="line-height: 20px">
				</div>
				<div class="col-md-2">
					{!! Form::submit(trans('Buscar'), array('class' => 'btn btn-info')) !!}
					{!! Form::close() !!}

				</div>
			</div>	

		


			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-3">
				<form action="/pagarmultiple" method="post">
					<thead>
						<tr>
							<th>Paciente</th>
							<th>Telèfono</th>
						    <th>Tipo</th>
							<th>Fecha de Pròxima Cita</th>
						</tr>
					</thead>
					<tbody>
                        	@foreach($atenciones as $atec)	

							<tr>
								<td>{{$atec->nombres}},{{$atec->apellidos}}</td>
				                <td>{{$atec->telefono}}</td>
								<td>{{$atec->tipo}}</td>
								<td>{{$atec->prox}}</td>
								
							</tr>
						@endforeach
					</tbody>
					<tfoot>
						<tr>
							<th>Paciente</th>
							<th>Telèfono</th>
						    <th>Tipo</th>
							<th>Fecha de Pròxima Cita</th>
						</tr>
						    

					</tfoot>
											</form>

				</table>
			</div>
		</div>
	</div>
</div>

</body>







<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
	TestTable2();
	TestTable3();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>
@endsection
