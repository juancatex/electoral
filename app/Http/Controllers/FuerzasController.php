<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fuerza;

class FuerzasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getfuerzas(Request $request)
    {   
       if (!$request->ajax()) return redirect('/');
       return Fuerza::select('idfuerza','nomfuerza')->where('activo','=','1')->orderBy('idfuerza', 'asc')->get(); 
    }
}
