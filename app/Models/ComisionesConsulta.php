<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComisionesConsulta extends Model
{
	protected $table="comisiones_consulta";

    protected $fillable = [
    	'consulta', 'profesional', 'monto','porcentaje','pagar','pagado','fecha_pago','recibo'
    ];
}