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
        $usuario_entidad = UserEntidad::where('user_id',Auth::user()->id)->first();
        $formulario_endidad = FormularioEntidad::where('entidad_id',$usuario_entidad->entidad_id)->first();
        $entidad = Entidad::find($formulario_endidad->entidad_id);
        $formulario = Formulario::find($formulario_endidad->formulario_id);

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
