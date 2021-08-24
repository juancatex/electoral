<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Requisito;

class RequisitoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function regRequisito(Request $request)
    {
        if (!$request->ajax()) return redirect('/');  
        $frente = new Requisito();
        $frente->nombrereq = $request->nombrereq;
        $frente->codigoreq = $request->codigoreq; 
        $frente->save();
    } 
    public function getRequisito(Request $request)
    {   
        if (!$request->ajax()) return redirect('/'); 
        return  Requisito::select('nombrereq','codigoreq','idreq') 
         ->where('activo','=','1')   
         ->orderBy('nombrereq', 'asc')->get(); 
 
    }
    public function desactivarRequisito(Request $request)
    {   
        if (!$request->ajax()) return redirect('/');  
        $user = Requisito::findOrFail($request->idreq); 
        $user->activo = 0;
        $user->save();
    }
}
