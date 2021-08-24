<?php

namespace App\Http\Controllers;

use App\Models\socio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SocioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     
    public function buscasocio(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscararray = array();  
        if(!empty($request->buscar)){
            $buscararray = explode(" ",$request->buscar);
        } 
        if (sizeof($buscararray)>0){
            $sqls=''; 
            foreach($buscararray as $valor){
                if(empty($sqls)){
                    $sqls="(socios.numpapeleta like '%".$valor."%' or socios.nombre like '%".$valor."%' or socios.apaterno like '%".
                    $valor."%' or socios.amaterno like '%".$valor."%' or socios.ci like '%".$valor."%')";
                }else{
                    $sqls.=" and (socios.numpapeleta like '%".$valor."%' or socios.nombre like '%".$valor."%' or socios.apaterno like '%".
                    $valor."%' or socios.amaterno like '%".$valor."%' or socios.ci like '%".$valor."%')";
                } 
            } 
            $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza')
           ->join ('users','socios.numpapeleta','=','users.papeleta') 
            ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
            ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            ->select('users.id','par_departamentos.abrvdep', 'socios.activo','socios.idsocio','socios.nombre','socios.apaterno','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            ->whereraw($sqls) 
            ->where('socios.idtiposocio','=','1')
            ->orderBy('socios.nombre', 'asc')->limit(10)->get();
           
        }else{
            $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza')
           ->join ('users','socios.numpapeleta','=','users.papeleta') 
            ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
            ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            ->where('socios.idtiposocio','=','1')
            ->select('users.id','par_departamentos.abrvdep', 'socios.activo','socios.idsocio','socios.nombre','socios.apaterno','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            ->orderBy('socios.nombre', 'asc')->limit(10)->get();

        }
        return ['socios' => $socios];
    }
    
    public function buscasocio2(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
        $buscararray = array();  
        if(!empty($request->buscar)){
            $buscararray = explode(" ",$request->buscar);
        } 
        if (sizeof($buscararray)>0){
            $sqls=''; 
            foreach($buscararray as $valor){
                if(empty($sqls)){
                    $sqls="(socios.numpapeleta like '%".$valor."%' or socios.nombre like '%".$valor."%' or socios.apaterno like '%".
                    $valor."%' or socios.amaterno like '%".$valor."%' or socios.ci like '%".$valor."%')";
                }else{
                    $sqls.=" and (socios.numpapeleta like '%".$valor."%' or socios.nombre like '%".$valor."%' or socios.apaterno like '%".
                    $valor."%' or socios.amaterno like '%".$valor."%' or socios.ci like '%".$valor."%')";
                } 
            } 
            $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza')
            ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
             ->join ('users','socios.numpapeleta','=','users.papeleta') 
            ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            ->select('users.id','par_departamentos.abrvdep', 'socios.activo','socios.idsocio','socios.nombre','socios.apaterno','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            ->whereraw($sqls) 
            ->where('socios.idtiposocio','=','1')
            ->where('par_fuerzas.idfuerza','=',$request->idfuerza)
            ->orderBy('socios.nombre', 'asc')->limit(10)->get();
           
        }else{
            // $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza')
            // ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
            //  ->join ('users','socios.numpapeleta','=','users.papeleta') 
            // ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            // ->select('users.id','par_departamentos.abrvdep', 'socios.activo','socios.idsocio','socios.nombre','socios.apaterno','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            // ->where('par_fuerzas.idfuerza','!=',$request->idfuerza)
            // ->where('socios.idtiposocio','=','1')
            // ->orderBy('socios.nombre', 'asc')->limit(10)->get();
            $socios=[];
        }
        return ['socios' => $socios];
    }
 
}
