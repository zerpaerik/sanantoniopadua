<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Metodos extends Model
{
    protected $fillable = [
    	'id_paciente', 'id_producto', 'monto','proximo','proximo1','id_usuario','estatus','personal'
    ];

   
}
