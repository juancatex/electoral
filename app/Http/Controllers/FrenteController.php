<?php

namespace App\Http\Controllers;

use App\Models\frente;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class FrenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function regfrente(Request $request)
    {
        if (!$request->ajax()) return redirect('/');  
        $frente = new frente();
        $frente->nombre = $request->nombre;
        $frente->sigla = $request->sigla;
        $frente->descripcion = $request->descripcion; 
        $frente->propuestas = $request->propuestas; 
        $frente->idfuerza = $request->fuerza; 
       
        if($request->fotofrente) {
            $var = Str::random(32);
            $var.='.jpg'; 
            $value = substr($request->fotofrente, strpos($request->fotofrente, ',') + 1); 
            $value = base64_decode($value); 
            Storage::put('public/frente/'.$var, $value); 
            $frente->rutafoto=$var;
            }  
        $frente->save();
    } 
    public function getfrentes(Request $request)
    {
      if (!$request->ajax()) return redirect('/'); 
       return  frente::where('frentes.activo','=','1')  
        ->join ('par_fuerzas','frentes.idfuerza','=','par_fuerzas.idfuerza')
        ->orderBy('idfrente', 'asc')->get(); 

    }
    public function getfrentesVoto(Request $request)
    { 
      if (!$request->ajax()) return redirect('/'); 
       return  frente::where('frentes.activo','=','1')->where('consolidado','=','1') 
       ->where('frentes.idfuerza','=',Auth::user()->idfuerza) 
       ->join ('par_fuerzas','frentes.idfuerza','=','par_fuerzas.idfuerza')
        ->orderBy('idfrente', 'asc')->get(); 

    }
    public function regconsolidacion(Request $request)
    {
        if (!$request->ajax()) return redirect('/');   
        $user = frente::findOrFail($request->idfrente); 
        $user->consolidado = 1;
        $user->save();
    } 
    public function deletefrente(Request $request)
    {
        $var = Str::random(10);
        if (!$request->ajax()) return redirect('/');   
        $frente = frente::findOrFail($request->idfrente);  
        $frente->nombre = $frente->nombre .'('.$var.')';
        $frente->sigla = $frente->sigla.'('.$var.')';
        $frente->activo = 0;
        $frente->save();
    }
}
