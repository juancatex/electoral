<?php

namespace App\Http\Controllers;

use App\Models\Vistasmodel;
use App\Models\rolvista;
use Illuminate\Http\Request;

class VistaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getvistas(Request $request)
    {   
       if (!$request->ajax()) return redirect('/');
     $vistas= Vistasmodel::join ('modulos','vistas.idmodulo','=','modulos.idmodulo')
       ->select('idvista','vistas.nombre','vistas.template','modulos.descripcion') 
        ->where('vistas.activo','=','1')  
       ->orderBy('idvista', 'asc')->get(); 


    $vistasrol= rolvista::select('idvista','permisos') 
        ->where('activo','=','1')  
        ->where('idrol','=',$request->rol)  
        ->orderBy('idvista', 'asc')->get(); 

        return ['vistas'=>$vistas,'permisos'=>$vistasrol];
   }
}
