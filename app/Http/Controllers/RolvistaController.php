<?php

namespace App\Http\Controllers;

use App\Models\rolvista;
use App\Models\Modulomodel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RolvistaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function registrovistas(Request $request)
    {
      if (!$request->ajax()) return redirect('/');
      
        $permiso = new rolvista();
        $permiso->idrol = $request->rolin;
        $permiso->idvista = $request->vistas;
        $permiso->permisos = $request->permisos; 
        $permiso->iduser = Auth::id();
        $permiso->save();
    }
    public function eliminavistas(Request $request)
    {
      if (!$request->ajax()) return redirect('/'); 
        rolvista::where('idrol','=',$request->rolin)->update(['activo' => false]); 
    }
    public function getvistasRoles(Request $request)
    {
      if (!$request->ajax()) return redirect('/');  
      $modulos=rolvista::select('modulos.idmodulo','modulos.descripcion','modulos.icono') 
        ->join ('vistas','rolvistas.idvista','=','vistas.idvista')
        ->join ('modulos','vistas.idmodulo','=','modulos.idmodulo')
        ->where('rolvistas.activo','=','1') 
        ->groupBy('modulos.idmodulo','modulos.descripcion','modulos.icono') 
        ->where('rolvistas.idrol','=',Auth::user()->idrol)->get()->toArray();
        $out = [];
        
        foreach($modulos as $indice=>$valor){ 
            $vistas=rolvista::select('vistas.idvista','rolvistas.permisos','vistas.nombre','vistas.template') 
            ->join ('vistas','rolvistas.idvista','=','vistas.idvista') 
            ->where('rolvistas.activo','=','1')  
            ->where('rolvistas.idrol','=',Auth::user()->idrol)
            ->where('vistas.idmodulo','=',$valor['idmodulo'])
            ->orderBy('vistas.orden', 'asc')
            ->orderBy('rolvistas.idvista', 'asc')
            ->get()->toArray(); 
            $out[] = ['id'=>$indice+1504,'form'=>Str::random(40),'icono'=>$valor['icono'],'mod'=>$valor['descripcion'],'menus'=>$vistas];  
        }

        return $out;
    }
}
