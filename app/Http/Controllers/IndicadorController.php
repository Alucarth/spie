<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Eje;
use App\Meta;
use App\Resultado;
use App\Accion;
use App\Indicador;

class IndicadorController extends Controller
{
    //
    public function index($filtro)
    {
        //
        // $pgdes = PgdesStructure::all();
        
        if($filtro == 'todo'){
            $estructura = Indicador::all();
            $padre = [];
        }else{
            $estructura = Indicador::where('accion_id',$filtro)->get();
            $padre = Accion::find($filtro);
            $resultado  = Resultado::find($padre->resultado_id);
            $meta = Meta::find($resultado->meta_id);
        }


        $niveles = [
            ["nombre" => "Ejes", "ruta" => 'pdes/ejes',"active"=> false],
            ["nombre" => "Metas", "ruta" => 'planes/pdes/metas/'.$meta->eje_id,"active"=> false],
            ["nombre" => "Resultados", "ruta" => 'planes/pdes/resultados/'.$resultado->meta_id,"active"=> false],
            ["nombre" => "Acciones", "ruta" => 'planes/pdes/acciones/'.$padre->resultado_id,"active"=> false],
            ["nombre" => "Indicadores", "ruta" => '#',"active"=> true]
        ];

        return view('planes.pdes.indicadores',compact('estructura','niveles','padre'));
    }

    public function show($id)
    {
        //
        $indicador = Indicador::find($id);
        return response()->json($indicador);
    }

    public function store(Request $request)
    {
        //
        if($request->has('id')){
            $eje = Indicador::find($request->id);
        } else {
            $eje = new Indicador();
            $eje->user_id = 1;
        }
        $eje->codigo= $request->codigo;
        $eje->accion_id = $request->padre;
        $eje->descripcion= $request->descripcion;
        $eje->linea_base_unidad = '';
        $eje->linea_base_valor= $request->linea_base_valor;
        $eje->save();
        
        return back()->withInput();
        
    }
}
