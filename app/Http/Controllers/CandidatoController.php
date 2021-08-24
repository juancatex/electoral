<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidato;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\CandidatoRequisitos;

class CandidatoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function regcandidato(Request $request)
    {
        if (!$request->ajax()) return redirect('/');  
        $candidato = new Candidato();
        $candidato->idfrente = $request->idfrente;
        $candidato->nombresocio = $request->nombresocio;
        $candidato->idcargo = $request->idcargo; 
        $candidato->idsocio = $request->idsocio; 
        if($request->foto) {
            $var = Str::random(32);
            $var.='.jpg'; 
            $value = substr($request->foto, strpos($request->foto, ',') + 1); 
            $value = base64_decode($value); 
            Storage::put('public/candidatos/'.$var, $value); 
            $candidato->rutafoto=$var;
            } 
        $candidato->save();

        
         foreach ($request->req as $p) {
            $candidatoreq = new CandidatoRequisitos();
            $candidatoreq->idreq = $p;
            $candidatoreq->idcandidato =  $candidato->idcandidato; 
            $candidatoreq->save();
            }
       

    } 
    public function getCandidatos(Request $request)
    {   
        if (!$request->ajax()) return redirect('/'); 
        return  Candidato::select('idcandidato','idsocio','idfrente','idcargo','nombresocio','rutafoto')  
         ->where('activo','=','1')  
         ->orderBy('idfrente', 'asc')
         ->orderBy('idcargo', 'asc')->get(); 
 
    }
    public function getCandidatosVoto(Request $request)
    {   
        if (!$request->ajax()) return redirect('/'); 
        return  Candidato::select('candidatos.idcandidato','candidatos.idfrente','candidatos.nombresocio','candidatos.idcargo','candidatos.rutafoto','cargos.nombrecargo')  
        ->join ('cargos','candidatos.idcargo','=','cargos.idcargo') 
         ->where('candidatos.activo','=','1')  
         ->where('cargos.activo','=','1')  
         ->orderBy('candidatos.idfrente', 'asc')
         ->orderBy('candidatos.idcargo', 'asc')->get(); 
   
    }
    public function desactivarcandidato(Request $request)
    {   
        if (!$request->ajax()) return redirect('/');  
        $candidato = Candidato::findOrFail($request->idcandidato); 
        $candidato->activo = 0;
        $candidato->save();
      
        CandidatoRequisitos::where('idcandidato', $candidato->idcandidato)
        ->update(['activo' => 0]);
        
    }
}
