<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FormularioEntidad;
use App\PlanInstitucional;

use App\Accion;

class PlanificacionController extends Controller
{
    //
    public function index()
    {                  
        $data = FormularioEntidad::where('entidad_id', \Auth::user()->entidad_id)->get();
        // return $programatic_structures;
        return view('planificacion.index',compact('data'));
    }

    public function planAcciones($formularioEntidad)
    {                  
        $data = PlanInstitucional::where('formulario_id', $formularioEntidad)->get();

        $acciones = Accion::orWhere('entidad_id', \Auth::user()->entidad_id)->orWhere('tipo_accion_id', 1)->get();
        // return $programatic_structures;
        return view('planificacion.planInstitucional',compact('data','acciones'));
    }
}

