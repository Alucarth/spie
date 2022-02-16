<?php

namespace App\Http\Controllers;

use App\Entidad;
use Illuminate\Http\Request;
use App\PlanInstitucional;
use App\FormularioEntidad;
use App\UserEntidad;
use App\Formulario;
use Illuminate\Support\Facades\Auth;

class PlanInstitucionalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //donde el id es igual accion_id
        $plan_institucional = PlanInstitucional::where('accion_id',$id)->first();
        $entidad = null;
        $formulario_entidad = null;
        $formulario = null;
        if(Auth::user()->getEntidadId())
        {
            $entidad = Entidad::find(Auth::user()->getEntidadId());
        }
        if($entidad)
        {
            $formulario_entidad = FormularioEntidad::where('entidad_id',$entidad->id)->first();
        }

        if($formulario_entidad)
        {
            $formulario = Formulario::find($formulario_entidad->formulario_id);
        }


        $title = "Plan Institucional";
        // return $plan_institucional;
        return view('plan_institucional.edit',compact('plan_institucional','title','entidad','formulario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
