@extends('layouts.app')

@section('content')

<body>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-linux"></i>
					<span>Listado de Ventas</span>

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
			{!! Form::open(['method' => 'get', 'route' => ['ventas.index']]) !!}

			<div class="row">
				<div class="col-md-2">
					<label>Fecha Inicio</label>
					<input type="date" value="{{$f1}}" name="fecha" style="line-height: 20px">
				</div>
				<div class="col-md-2">
					<label>Fecha Fin</label>
					<input type="date" value="{{$f2}}" name="fecha2" style="line-height: 20px">
				</div>
				<div class="col-md-3">
					<select name="producto" id="el1">
						<option value="">Seleccione un Producto</option>
						@foreach($productos as $p)
						<option value="{{$p->id}}">{{$p->producto}}</option>
						@endforeach
						
					</select>
					
				</div>
				
				<div class="col-md-2">
					{!! Form::submit(trans('Buscar'), array('class' => 'btn btn-info')) !!}
					{!! Form::close() !!}

				</div>
			</div>	

			<div class="row">
				<div class="col-md-2">
				<strong>Total:</strong>{{$aten->monto}} Soles
			   </div>

			   <div class="col-md-2">
				<strong>Cantidad:</strong>{{$cantidad->cantidad}} Venta
			   </div>
				
			</div>


			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-3">
					<thead>
						<tr>
							<th>Nro</th>
							<th>Paciente</th>
							<th>Productos</th>
							<th>Monto Total</th>
							<th>Usuario</th>
						    <th>Fecha</th>
						    <th>Acciones</th>
						</tr>
					</thead>
					<tbody>
                         @foreach($atenciones as $atec)	

							<tr>
								<td>{{$atec->id}}</td>
						        <td>{{$atec->nombres}},{{$atec->apellidos}}</td>
						        @if($prod)
						        <td>{{$ventas->selectProductos($atec->id,$atec->id_producto)}}<span style="background: #00FF00;"> / {{$atec->producto}}</span></td>
						        @else
						        <td>{{$ventas->selectProductos($atec->id,$atec->id_producto)}}</td>
						        @endif
						        <td>{{$ventasp->montoVenta($atec->id)}}</td>
								<td>{{$atec->name}},{{$atec->lastname}}</td>
								<td>{{$atec->created_at}}</td>
								<td>
									<a target="_blank" href="ticket_ver_ventas-{{$atec->id}}" class="btn btn-success">Ver Ticket</a>
								@if(\Auth::user()->role_id <> 6)
									<a class="btn btn-danger" href="ventas-delete-{{$atec->id3}}"  onclick="return confirm('¿Desea Eliminar este registro?')">Eliminar</a>	
								</td>
								@endif
							</tr>
						@endforeach
					</tbody>
					<tfoot>
					        <th>Nro</th>
							<th>Producto</th>
							<th>Cantidad</th>
							<th>Monto</th>
							<th>Usuario</th>
						    <th>Fecha</th>

					</tfoot>

				</table>
			</div>
		</div>
	</div>
</div>

</body>



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
