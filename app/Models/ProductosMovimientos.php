<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductosMovimientos extends Model
{
	protected $table="productos_movimientos";

    protected $fillable = [
    	'id_producto','cantidad','usuario','accion'
    ];

   
}

