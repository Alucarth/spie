<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $roles = Rol::all();
        $title ="Lista de Roles";
        return view("roles.index",compact('roles','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "creando un nuevo rol";
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
        $role = new Rol;
        $role->name = $request->name;
        $role->guard_name = 'web';
        $role->save();

        return redirect("roles");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $role = Rol::find($id);
        if($role)
        {
            return response()->json($role);
        }
        return "no se encontrol el rol: ".$id;
    }

    /**
     * Show the form for ed1iting the specified resource.
     *1
     * @param  \App\Rol  $r1ol
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
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rol  $rol
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete(Request $request)
    {
        $structure_programmatic = Rol::find($request->id);
        $structure_programmatic->delete();
        session()->flash('delete','se elimino la estructura');
        return back()->withInput();
    }
}
