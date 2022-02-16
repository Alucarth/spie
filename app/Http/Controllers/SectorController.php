<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Sector;

class SectorController extends Controller
{
    //
    public function index()
    {
        //
        $sector = Sector::all();
        return response()->json($sector);
    }
}
