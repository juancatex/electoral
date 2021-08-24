<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatoRequisitos;

class CandidatoRequisitosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function getCandidatoRequisitos(Request $request)
    {   
        if (!$request->ajax()) return redirect('/'); 
        return  CandidatoRequisitos::select('idreq')  
         ->where('activo','=','1')  
         ->where('idcandidato','=',$request->idcandidato) ->get(); 
 
    }
    public function regCandidatoRequisitos(Request $request)
    {
        if (!$request->ajax()) return redirect('/');   
        CandidatoRequisitos::where('activo', 1)->where('idcandidato','=',$request->idcandidato)->delete(); 
        foreach ($request->req as $p) {
            $candidatoreq = new CandidatoRequisitos();
            $candidatoreq->idreq = $p;
            $candidatoreq->idcandidato =  $request->idcandidato; 
            $candidatoreq->save();
            }
    } 
     
}
