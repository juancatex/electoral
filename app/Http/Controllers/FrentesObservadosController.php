<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FrentesObservados;
use App\Models\frente;
use Illuminate\Support\Facades\Auth;

class FrentesObservadosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function regobs(Request $request)
    {
        if (!$request->ajax()) return redirect('/');  
        $frente = new FrentesObservados();
        $frente->idfrente = $request->idfrente;
        $frente->observacion = $request->obs;
        $frente->iduser = Auth::id(); 
        $frente->save();
        $user = frente::findOrFail($request->idfrente); 
        $user->consolidado = 2;
        $user->save();
    } 
    public function getobs(Request $request)
    {
      if (!$request->ajax()) return redirect('/'); 
       return  FrentesObservados::select('frentes_observados.idobs','frentes_observados.observacion','users.user') 
         ->join ('users','frentes_observados.iduser','=','users.id') 
         ->where('frentes_observados.idfrente','=',$request->idfrente)  
         ->where('frentes_observados.activo','=','1')  
         ->orderBy('frentes_observados.iduser', 'asc')
         ->orderBy('frentes_observados.idobs', 'asc')->get(); 

    }
}
