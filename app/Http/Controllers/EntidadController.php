<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Entidad;
use App\FormularioEntidad;

class EntidadController extends Controller
{
    //
    
    public function getAll()
    {
         //
         $entidades = Entidad::all();
         return response()->json($entidades);
    }

    public function asignacionFormularios()
    {
        //
        $formularios = FormularioEntidad::all();
        // return $programatic_structures;
        return view('entidades.addFormulario',compact('formularios'));
    }

    public function asignacionFormulariosStore(Request $request)
     {
         //
         if($request->has('id')){
             $asignacion = FormularioEntidad::find($request->id);
         } else {
             $asignacion = new FormularioEntidad();
             $asignacion->user_id = 1;
         }
         $asignacion->formulario_id= $request->formulario_id;
         $asignacion->entidad_id = $request->entidad_id;
         $asignacion->save();
         
         return back()->withInput();
         
     }
}
