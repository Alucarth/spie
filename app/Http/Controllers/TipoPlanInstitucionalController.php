<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TipoPlanInstitucional;

class TipoPlanInstitucionalController extends Controller
{
    //
    public function index()
    {
        //
        $tipo = TipoPlanInstitucional::all();
        return response()->json($tipo);
    }
}
