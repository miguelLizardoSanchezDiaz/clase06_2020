<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Practica;

class IndicadorController extends Controller
{	
	protected $variable='cantidad-practicas-por-carrera';
    protected $permiso='1';

    public function cantidad_practicas_carrera(Request $request){
    	$variable=$this->variable;
    	
    	$fecha_inicio=$request->fecha_inicio;
        if($fecha_inicio=='')
        {
            $fecha_inicio='2019-01-01';
        }
        $fecha_fin=$request->fecha_fin;
        if($fecha_fin=='')
        {
            $fecha_fin='2020-12-31';
        }
        $registros=Practica::consulta($fecha_inicio,$fecha_fin);
    	return view('indicadores.cantidad_practicas_carrera',compact('registros','variable','fecha_inicio','fecha_fin'));
    }
}
