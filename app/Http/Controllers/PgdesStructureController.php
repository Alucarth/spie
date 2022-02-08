<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\PgdesStructure;


class PgdesStructureController extends Controller
{
    //
    public function index()
    {
        //
        $pgdes = PgdesStructure::all();
        $niveles = array('Ejes', 'Metas', 'Resultados', 'Acciones');
        // return $programatic_structures;
        return view('planes.pgdes.index',compact('pgdes','niveles'));
    }

    public function show($id)
    {
        //
        $pgdes_structure = PgdesStructure::find($id);
        return response()->json($pgdes_structure);
    }

    

    public function store(Request $request)
    {
        //
        if($request->has('id')){
            $pgdes_structure = PgdesStructure::find($request->id);
        } else {
            $pgdes_structure = new PgdesStructure();
        }
        $pgdes_structure->code= $request->code;
        $pgdes_structure->description= $request->description;
        $pgdes_structure->save();
        
        return back()->withInput();
        
    }

    public function update(Request $request)
    {

    }

    public function delete(Request $request)
    {
        $pgdes_structure = PgdesStructure::find($request->id);
        $pgdes_structure->delete();
        session()->flash('delete','Se elimino el Pilar');
        return back()->withInput();
    }
}
