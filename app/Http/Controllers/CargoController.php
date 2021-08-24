<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\Cargo;

class CargoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function regcargo(Request $request)
    {
        if (!$request->ajax()) return redirect('/');  
        $frente = new Cargo();
        $frente->nombrecargo = $request->nombrecargo;
        $frente->idfuerza = $request->fuerzaid; 
        $frente->save();
    } 
    public function getcargos(Request $request)
    {   
        if (!$request->ajax()) return redirect('/'); 
        return  Cargo::select('cargos.nombrecargo','cargos.idcargo','par_fuerzas.nomfuerza','par_fuerzas.idfuerza') 
         ->join ('par_fuerzas','cargos.idfuerza','=','par_fuerzas.idfuerza') 
         ->where('cargos.activo','=','1')  
         ->orderBy('par_fuerzas.nomfuerza', 'asc')
         ->orderBy('cargos.idcargo', 'asc')->get(); 
 
    }
    public function desactivarcargo(Request $request)
    {   
        if (!$request->ajax()) return redirect('/');  
        $user = Cargo::findOrFail($request->idcargo); 
        $user->activo = 0;
        $user->save();
    }
}
