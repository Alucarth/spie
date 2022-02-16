<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Eje;
use App\Meta;
use App\Resultado;

class ResultadoController extends Controller
{
    //
    public function index($filtro)
    {
        //
        // $pgdes = PgdesStructure::all();
        
        if($filtro == 'todo'){
            $estructura = Resultado::all();
            $padre = [];
        }else{
            $estructura = Resultado::where('meta_id',$filtro)->get();
            $padre = Meta::find($filtro);                   
        }


        $niveles = [
            ["nombre" => "Ejes", "ruta" => 'pdes/ejes',"active"=> false],
            ["nombre" => "Metas", "ruta" => 'planes/pdes/metas/'.$padre->eje_id,"active"=> false],
            ["nombre" => "Resultados", "ruta" => '#',"active"=> true],
            // ["nombre" => "Acciones", "ruta" => '#',"active"=> false]
        ];

        return view('planes.pdes.resultados',compact('estructura','niveles','padre'));
    }

    public function getFiltro($filtro)
    {
        //
        $resultados = Resultado::where('meta_id',$filtro)->get();
        return response()->json($resultados);
    }

    public function show($id)
    {
        //
        $resutado = Resultado::find($id);
        return response()->json($resutado);
    }

    public function store(Request $request)
    {
        //
        if($request->has('id')){
            $eje = Resultado::find($request->id);
        } else {
            $eje = new Resultado();
            $eje->user_id = 1;
        }
        $eje->codigo= $request->codigo;
        $eje->meta_id = $request->padre;
        $eje->descripcion= $request->descripcion;
        $eje->save();
        
        return back()->withInput();
        
    }
}
