<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Practica extends Model
{
    protected $connection = 'istene';
    protected $table = "practica";
    public $timestamps = false;

    public static function consulta($fecha_inicio,$fecha_fin){
		return static::select(DB::raw('count(c.car_id) as numero_carreras'), 'c.car_nombre')
    	->from('practica as p')
    	->join('carrera as c','c.car_id','=','p.car_id')
    	->groupBy('c.car_id')
    	->where('p.pra_fecha_registro',">=", $fecha_inicio)
    	->where('p.pra_fecha_registro',"<=", $fecha_fin)
    	->get();

    }
}
