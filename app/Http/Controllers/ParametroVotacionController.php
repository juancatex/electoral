<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParametroVotacion;   
use Illuminate\Support\Facades\Auth;

class ParametroVotacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getinicio(Request $request)
    {   
       if (!$request->ajax()) return redirect('/');
       return  ParametroVotacion::where('activo','=','1')->limit(1)->get(); 
       
     }
     public function reginicio(Request $request)
    {
        if (!$request->ajax()) return redirect('/');   
        $init = ParametroVotacion::findOrFail(1); 
        $init->inicio = $request->ini;
        $init->final = $request->fin;
        $init->observacion_inicio = $request->obs;
        $init->iduser_inicio = Auth::id(); 
        $init->iduser_final = Auth::id(); 
        $init->save();
    }
    public function gettime(){ 
        // return DB::select('SELECT CURRENT_TIMESTAMP as fecha')->fecha;
        // return "2021-07-03 12:20:00";
        return  ParametroVotacion::where('activo','=','1')->limit(1)->get()[0]; 
    }
}
