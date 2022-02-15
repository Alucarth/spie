<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Eje;
use App\Meta;

class MetaController extends Controller
{
    //
    public function index($filtro)
    {
        //
        // $pgdes = PgdesStructure::all();
        
        
        //dd("aaaa");

       

        if($filtro == 'todo'){
            $estructura = Meta::all();
            $padre = [];
        }else{
            $estructura = Meta::where('eje_id',$filtro)->get();
            $padre = Eje::find($filtro);
        }

        


        $niveles = [
            ["nombre" => "Ejes", "ruta" => 'pdes/ejes',"active"=> false],
            ["nombre" => "Metas", "ruta" => '#',"active"=> true],
            // ["nombre" => "Resultados", "ruta" => '#',"active"=> false],
            // ["nombre" => "Acciones", "ruta" => '#',"active"=> false]
        ];

        return view('planes.pdes.metas',compact('estructura','niveles','padre'));
    }

    public function getFiltro($filtro)
    {
        //
        $metas = Meta::where('eje_id',$filtro)->get();
        return response()->json($metas);
    }

    public function show($id)
    {
        //
        $meta = Meta::find($id);
        return response()->json($meta);
    }

    public function store(Request $request)
    {
        //
        
        if($request->has('id')){
            $eje = Meta::find($request->id);
        } else {
            $eje = new Meta();
        }
        $eje->codigo = $request->codigo;
        $eje->eje_id = $request->padre;
        $eje->descripcion= $request->descripcion;
        $eje->save();
        
        return back()->withInput();
        
    }
}
