<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\FormularioEntidad;
use App\PlanInstitucional;
use App\UserEntidad;

use App\Accion;

class PlanificacionController extends Controller
{
    //
    public function index()
    {                

        $userEntidad = UserEntidad::where('user_id', \Auth::user()->id)->first();

        $data = FormularioEntidad::where('entidad_id', $userEntidad->entidad_id)->get();
        // return $programatic_structures;
        return view('planificacion.index',compact('data'));
    }

    public function planAcciones($formularioSelectEntidad)
    {   
        $entidadPlan = UserEntidad::where('user_id', \Auth::user()->id)->first();

        $data = PlanInstitucional::where('formulario_entidad_id', $formularioSelectEntidad)->get();

        $acciones = Accion::orWhere('entidad_id', $entidadPlan->entidad_id)->orWhere('tipo_accion_id', 1)->get();
        // return $programatic_structures;
        return view('planificacion.planInstitucional',compact('data','acciones','entidadPlan','formularioSelectEntidad'));
    }


    public function store(Request $request)
     {
         //         


        dd($request->all());

        if($request->descripcion_nueva_accion){
            $accion = new Accion();
            $accion->codigo = 2;
            $accion->descripcion = $request->descripcion_nueva_accion;
            $accion->resultado_id = $request->resultado_id;
            $accion->tipo_accion_id = 2;
            $accion->entidad_id = $request->entidad_id;
            $accion->save();
        }else{

        }

         if($request->has('id')){
             $planInstitucional = PlanInstitucional::find($request->id);
         } else {
             $planInstitucional = new PlanInstitucional();
             
         }
         
         $planInstitucional->codigo = $request->codigo;
         $planInstitucional->descripcion_resultado = ' ';
         $planInstitucional->descripcion_accion = $request->descripcion_accion;
         $planInstitucional->presupuesto_total = $request->presupuesto_total;
         $planInstitucional->formulario_entidad_id= $request->formulario_entidad_id;
         $planInstitucional->accion_id = $request->accion_id;
         $planInstitucional->tipo_plan_institucional_id= $request->tipo_plan_institucional_id;
         $planInstitucional->sector_id= $request->sector_id;
         $planInstitucional->save();
         
         return back()->withInput();
         
     }

        
}

