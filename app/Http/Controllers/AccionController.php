<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Meta;
use App\Resultado;
use App\Accion;
use App\Indicador;

class AccionController extends Controller
{
     //
     public function index($filtro)
     {
         //
         // $pgdes = PgdesStructure::all();
         
         if($filtro == 'todo'){
             $estructura = Accion::all();
             $padre = [];
         }else{
             $estructura = Accion::where('resultado_id',$filtro)->get();
             $padre = Resultado::find($filtro);
             $meta = Meta::find($padre->meta_id);
         }

         $niveles = [
            ["nombre" => "Ejes", "ruta" => 'pdes/ejes',"active"=> false],
            ["nombre" => "Metas", "ruta" => 'planes/pdes/metas/'.$meta->eje_id,"active"=> false],
            ["nombre" => "Resultados", "ruta" => 'planes/pdes/resultados/'.$padre->meta_id,"active"=> false],
            ["nombre" => "Acciones", "ruta" => '#',"active"=> true],
            // ["nombre" => "Indicadores", "ruta" => '#',"active"=> false]
        ];
 
         return view('planes.pdes.acciones',compact('estructura','niveles','padre'));
     }

     public function getFiltro($filtro)
     {
         //
         $acciones = Accion::where('resultado_id',$filtro)->get();
         return response()->json($acciones);
     }

     public function getAll()
     {
         //
         $acciones = Accion::all();
         return response()->json($acciones);
     }
 
     public function show($id)
     {
         //
         $resutado = Accion::find($id);
         return response()->json($resutado);
     }
 
     public function store(Request $request)
     {
         //
         if($request->has('id')){
             $eje = Accion::find($request->id);
         } else {
             $eje = new Accion();
             $eje->user_id = 1;
         }
         $eje->codigo= $request->codigo;
         $eje->resultado_id = $request->padre;
         $eje->descripcion= $request->descripcion;
         $eje->save();
         
         return back()->withInput();
         
     }
}
