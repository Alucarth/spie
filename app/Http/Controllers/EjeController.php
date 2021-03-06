<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EjePgdes;
use App\Eje;

class EjeController extends Controller
{
    //
    public function index()
    {
        //
        // $pgdes = PgdesStructure::all();
        $estructura = Eje::all();
        $niveles = [
            ["nombre" => "Ejes", "ruta" => 'pdes/ejes',"active"=> true],
        ];
        // return $programatic_structures;
        return view('planes.pdes.ejes',compact('estructura','niveles'));
    }

    public function getAll()
    {
        //
        $ejes = Eje::all();
        return response()->json($ejes);
    }

    public function show($id)
    {
        //
        $eje = Eje::find($id);
        return response()->json($eje);
    }

    public function store(Request $request)
    {
        //
        if($request->has('id')){
            $eje = Eje::find($request->id);
        } else {
            $eje = new Eje();
        }
        $eje->codigo= $request->codigo;
        $eje->descripcion= $request->descripcion;
        $eje->save();
        
        return back()->withInput();
        
    }
}
