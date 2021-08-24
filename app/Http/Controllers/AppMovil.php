<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Votacion; 
use App\Models\socio;
use App\Models\User;
use App\Models\Candidato;
use App\Models\frente;

class AppMovil extends Controller
{
    public function login(Request $request)
    {
    if (!Auth::attempt($request->only('papeleta', 'password'))) {
    return response()->json([
    'message' => 'Datos invalidos'
               ], 401);
           }
    
    $user = User::where('papeleta', $request['papeleta'])->firstOrFail(); 
    $token = $user->createToken('auth_token')->plainTextToken;
     
    return response()->json(array('token' => $token,'token_type' => 'Bearer','iduser' => $user->id,'idfuerza' => $user->idfuerza), 200);
    }


    public function regvoto(Request $request)
    { 
        $frente = new Votacion(); 
        $frente->idvo = DB::select('SELECT idvo FROM parametro_votacions where activo=1 LIMIT 1')[0]->idvo;
        $frente->idfrente = $request->idfrente;
        $frente->iduser = $request->idfrente;   
        $frente->save();

        $usuario= Votacion::join ('users','votacions.iduser','=','users.id') 
        ->where('iduser','=',$request->idfrente)->limit(1)->get()[0];  

        $socios=Socio::join ('users','socios.numpapeleta','=','users.papeleta')  
        ->select( 'socios.ci','socios.numpapeleta')
        ->where('users.papeleta','=',$usuario->papeleta)
        ->where('socios.idtiposocio','=','1')->limit(1)->get()[0];
       

        $arr = array('pk' => $frente->idvv, 'user' => $frente->iduser,   'ci' => $socios->ci, 'pa' => $socios->numpapeleta);
        $sssss=json_encode($arr);
 
             $var = Str::random(32);
            $frente->pk=$var;
            $var.='.jpg';   
            $url = "https://chart.googleapis.com/chart?choe=UTF-8&chs=300x300&cht=qr&chl=$sssss";
            $contents = file_get_contents($url); 
            Storage::disk('local')->put('qr/'.$var,$contents);
            $frente->qr=$var;
            $frente->save(); 
               
        return response()->json(array('user' => $frente->iduser,'idvv' => $frente->idvv,'idfrente' => $frente->idfrente,'nom'=>$usuario->user
        ,'ci'=>$socios->ci,'pa'=>$socios->numpapeleta,'dep'=>Auth::user()->dep), 200); 
    }

    public function updateqrvoto(Request $request)
    {
          
        $frente = Votacion::findOrFail($request->idvoto);  
        if($request->datos) {
            $var = Str::random(32);
            $frente->pk=$var;
            $var.='.jpg';   
            $url = "https://chart.googleapis.com/chart?choe=UTF-8&chs=300x300&cht=qr&chl=".$request->datos;
            $contents = file_get_contents($url); 
            Storage::disk('local')->put('qr/'.$var,$contents);
            $frente->qr=$var;
            $frente->save(); 
              return response()->json(array('result' => 'ok'), 200);
            }else{
                return response()->json('Error de registro', 500);
            }
        
    }





    public function getCandidatosVoto(Request $request)
    {    
        $frentes= Candidato::select('candidatos.idcandidato','candidatos.idfrente','candidatos.nombresocio','candidatos.idcargo','cargos.nombrecargo','candidatos.rutafoto')  
        ->join ('cargos','candidatos.idcargo','=','cargos.idcargo') 
         ->where('candidatos.activo','=','1')  
         ->where('cargos.activo','=','1')  
         ->orderBy('candidatos.idfrente', 'asc')
         ->orderBy('candidatos.idcargo', 'asc')->get(); 
         foreach ($frentes as   $value) { 
            $logo = Storage::path('public/candidatos/'.$value->rutafoto);
            $logo64 = base64_encode(Storage::get('public/candidatos/'.$value->rutafoto)); 
            $value->rutafoto='data:'.mime_content_type($logo) . ';base64,' . $logo64;
        }
        return $frentes;
    }
    public function getfrentesVoto(Request $request)
    { 
    //    return  frente::where('activo','=','1')->where('consolidado','=','1') 
    //     ->orderBy('idfrente', 'asc')->get();  

    $frentes=frente::where('frentes.activo','=','1') 
    ->where('consolidado','=','1') 
    // ->where('frentes.idfuerza','=',Auth::user()->idfuerza) 
    ->where('frentes.idfuerza','=',$request->id) 
    ->join ('par_fuerzas','frentes.idfuerza','=','par_fuerzas.idfuerza')
        ->orderBy('idfrente', 'asc')->get();
  
        
        foreach ($frentes as   $value) { 
            $logo = Storage::path('public/frente/'.$value->rutafoto);
            $logo64 = base64_encode(Storage::get('public/frente/'.$value->rutafoto)); 
            $value->rutafoto='data:'.mime_content_type($logo) . ';base64,' . $logo64;
        }
        return $frentes;
    }

    public function getfrentesVotomovil(Request $request)
    { 
    //    return  frente::where('activo','=','1')->where('consolidado','=','1') 
    //     ->orderBy('idfrente', 'asc')->get();  

    $frentes=frente::where('frentes.activo','=','1') 
    ->where('consolidado','=','1') 
    ->where('frentes.idfuerza','=',Auth::user()->idfuerza)  
    ->join ('par_fuerzas','frentes.idfuerza','=','par_fuerzas.idfuerza')
        ->orderBy('idfrente', 'asc')->get();
  
        
        foreach ($frentes as   $value) { 
            $logo = Storage::path('public/frente/'.$value->rutafoto);
            $logo64 = base64_encode(Storage::get('public/frente/'.$value->rutafoto)); 
            $value->rutafoto='data:'.mime_content_type($logo) . ';base64,' . $logo64;
        }
        return $frentes;
    }




    public function registroUser(Request $request)
    {
      if (!$request->ajax()) return redirect('/'); 
      $Socio = Socio::findOrFail($request->idsocio); 
      $Socio->carnetmilitar = $request->carnetmilitar; 
      $Socio->ci = $request->ci; 
      $Socio->iddepartamentoexpedido = $request->iddepartamentoexpedido; 
      $Socio->iddestino = $request->iddestino; 
      $Socio->direcciondomicilio = $request->direcciondomicilio; 
      $Socio->save();

        $user = new User(); 
        $user->papeleta = $request->papeleta; 
        $user->dep = $request->dep;  
        $user->idfuerza = $request->idfuerza;  
        $user->user = $request->usuario;  
        $user->password = bcrypt($request->pass);
        $user->save(); 
    }
    public function ppppppp(Request $request)
    {
        $Socio = Socio::findOrFail($request->idsocio); 
        $Socio->carnetmilitar = $Socio->carnetmilitar;  
        $Socio->save();
        echo $Socio->idsocio;
    }
    public function printvoto(Request $request)
    {

        $usuario= Votacion::join ('users','votacions.iduser','=','users.id') 
        ->where('iduser','=',$request->iduser)->limit(1)->get()[0];  

        $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza')
        ->join ('par__destinos','socios.iddestino','=','par__destinos.iddestino') 
         ->join ('users','socios.numpapeleta','=','users.papeleta') 
        ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
        ->select('par_departamentos.abrvdep',  'socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','socios.carnetmilitar','par__destinos.nomdestino','socios.direcciondomicilio')
        ->where('users.papeleta','=',$usuario->papeleta)
        ->where('socios.idtiposocio','=','1')->limit(1)->get()[0];



 
        $logo = Storage::path('fotos/logo.png');
        $logo64 = base64_encode(Storage::get('fotos/logo.png')); 
        $qr = Storage::path('qr/'.$usuario->qr);
        $qr64 = base64_encode(Storage::get('qr/'.$usuario->qr));
        $data = [
             'foto'=>'data:'.mime_content_type($logo) . ';base64,' . $logo64, 
             'qr'=>'data:'.mime_content_type($qr) . ';base64,' . $qr64,  
             'date' => $usuario->date,
             'pk' => $usuario->pk,
             'user' => $usuario->user,
             'papeleta' => $usuario->papeleta,
             'abrvdep' => $socios->abrvdep ,
             'nomfuerza' => $socios->nomfuerza ,
             'carnetmilitar' => $socios->carnetmilitar ,
             'nomdestino' => $socios->nomdestino ,
             'direcciondomicilio' => $socios->direcciondomicilio ,
             'ci' => $socios->ci 
        ]; 
        $pdf = PDF::loadView('pdf/voto', $data); 
         return $pdf->download('voto.pdf'); 
       // Storage::disk('local')->put('voto.pdf' ,$pdf->output());
    }
  
    public function getdestinos(Request $request)
    {
        if (!$request->ajax()) return redirect('/');  
        return  DB::select('SELECT iddestino,nomdestino FROM par__destinos where idfuerza=? ORDER BY iddestino ASC',[$request->idfuerza]); 
    }
    public function buscasocioupdate(Request $request)
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
            ->leftJoin ('users','socios.numpapeleta','=','users.papeleta') 
            ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
            ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            ->select( 'socios.iddepartamentoexpedido','par_fuerzas.idfuerza','par_departamentos.abrvdep','socios.carnetmilitar', 'socios.activo','socios.idsocio','socios.iddestino','socios.nombre','socios.apaterno','socios.direcciondomicilio','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            ->whereraw($sqls) 
            ->where('socios.idtiposocio','=','1')
            ->orderBy('socios.nombre', 'asc')->limit(5)->get();
           
        }else{
            $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza') 
            ->leftJoin ('users','socios.numpapeleta','=','users.papeleta') 
            ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
            ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            ->where('socios.idtiposocio','=','1')
            ->select( 'socios.iddepartamentoexpedido','par_fuerzas.idfuerza','par_departamentos.abrvdep','socios.carnetmilitar', 'socios.activo','socios.iddestino','socios.idsocio','socios.nombre','socios.apaterno','socios.direcciondomicilio','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            ->orderBy('socios.nombre', 'asc')->limit(5)->get();

        }
        return ['socios' => $socios];
    } 

    public function buscasocioupdateci(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
         
            $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza') 
            ->leftJoin ('users','socios.numpapeleta','=','users.papeleta') 
            ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
            ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            ->where('socios.idtiposocio','=','1')
            ->where('socios.ci','=',$request->ci)
            ->select( 'socios.iddepartamentoexpedido','par_fuerzas.idfuerza','par_departamentos.abrvdep','socios.carnetmilitar', 'socios.activo','socios.iddestino','socios.idsocio','socios.nombre','socios.apaterno','socios.direcciondomicilio','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            ->orderBy('socios.nombre', 'asc')->limit(1)->get();
 
        return ['socio' => $socios];
    }
    public function buscasocioupdateci2(Request $request)
    {
        if (!$request->ajax()) return redirect('/');
 
         
            $socios=Socio::join ('par_fuerzas','socios.idfuerza','=','par_fuerzas.idfuerza') 
            ->leftJoin ('users','socios.numpapeleta','=','users.papeleta') 
            ->join ('par_grados','socios.idgrado','=','par_grados.idgrado') 
            ->join ('par_departamentos','socios.iddepartamentoexpedido','=','par_departamentos.iddepartamento') 
            ->where('socios.idtiposocio','=','1')
            ->where('socios.ci','=',$request->ci)
            ->where('socios.numpapeleta','=',$request->numpapeleta)
            ->select( 'socios.iddepartamentoexpedido','par_fuerzas.idfuerza','par_departamentos.abrvdep','socios.carnetmilitar', 'socios.activo','socios.iddestino','socios.idsocio','socios.nombre','socios.apaterno','socios.direcciondomicilio','socios.amaterno','socios.ci','socios.numpapeleta','par_fuerzas.nomfuerza','par_grados.nomgrado')
            ->orderBy('socios.nombre', 'asc')->limit(1)->get();
 
        return ['socio' => $socios];
    }
}
