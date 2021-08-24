<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Votacion; 
use App\Models\socio;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class VotacionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getvotouser(Request $request)
    {   
       if (!$request->ajax()) return redirect('/');
       return  Votacion::where('iduser','=',Auth::id())->get();  
     }
     public function regvoto(Request $request)
    {
        if (!$request->ajax()) return redirect('/');    
        $frente = new Votacion(); 
        $frente->idvo = DB::select('SELECT idvo FROM parametro_votacions where activo=1 LIMIT 1')[0]->idvo;
        $frente->idfrente = $request->idfrente;
        $frente->iduser = Auth::id();   
        $frente->save();

          
        $usuario= Votacion::join ('users','votacions.iduser','=','users.id') 
        ->where('iduser','=',Auth::id())->limit(1)->get()[0];  

        $socios=Socio::join ('users','socios.numpapeleta','=','users.papeleta')  
        ->select( 'socios.ci','socios.numpapeleta')
        ->where('users.papeleta','=',$usuario->papeleta)
        ->where('socios.idtiposocio','=','1')->limit(1)->get()[0];
        
        return response()->json(array('user' => $frente->iduser,'idvv' => $frente->idvv,'idfrente' => $frente->idfrente,'nom'=>$usuario->user
        ,'ci'=>$socios->ci,'pa'=>$socios->numpapeleta,'dep'=>Auth::user()->dep), 200);
    }
    public function updateqrvoto(Request $request)
    {
        if (!$request->ajax()) return redirect('/');    
        $frente = Votacion::findOrFail($request->idvoto);  
        if($request->qr) {
            $var = Str::random(32);
            $frente->pk=$var;
            $var.='.jpg'; 
            $value = substr($request->qr, strpos($request->qr, ',') + 1); 
            $value = base64_decode($value); 
            Storage::put('qr/'.$var, $value); 
            $frente->qr=$var;
            } 
        $frente->save(); 
    }
    
    public function printvoto(Request $request)
    { 
        $usuario= Votacion::join ('users','votacions.iduser','=','users.id') 
        ->where('iduser','=',Auth::id())->limit(1)->get()[0];  

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
        return $pdf->stream('voto.pdf'); 
    }
    function bm_random_rgb() { 
         return 'rgb(' . rand(0, 255) . ',' . rand(0, 255) . ',' . rand(0, 255) . ')'; 
        }


    public function printreporte(Request $request)
    {
        $votaciones= Votacion::join ('frentes','votacions.idfrente','=','frentes.idfrente') 
        ->select(DB::raw('count(*) as total, sigla,idfuerza'))
        ->groupByRaw('sigla,idfuerza')->get();  
        $socios3=Socio::where('socios.idtiposocio','=','1')->where('socios.activo','=','1')->where('socios.idfuerza','=','3')->count();
            $socios4=Socio::where('socios.idtiposocio','=','1')->where('socios.activo','=','1')->where('socios.idfuerza','=','4')->count();
            $socios5=Socio::where('socios.idtiposocio','=','1')->where('socios.activo','=','1')->where('socios.idfuerza','=','5')->count();
            $sociostotal=Socio::where('socios.idtiposocio','=','1')->where('socios.activo','=','1')->where(function($query) {
                $query->orWhere('socios.idfuerza','=','3')
                      ->orWhere('socios.idfuerza','=','4')
                      ->orWhere('socios.idfuerza','=','5');
                    })->count(); 

            $tablaestadistica = array((object)array("detalle"=>"Efectivo","ejercito"=>$socios3,"aerea"=>$socios4,"armada"=>$socios5,"total"=>$sociostotal));

            $userre3=User::where('users.activo','=','1')->where('users.idfuerza','=','3')->count();  
            $userre4=User::where('users.activo','=','1')->where('users.idfuerza','=','4')->count();  
            $userre5=User::where('users.activo','=','1')->where('users.idfuerza','=','5')->count();  
            $userretotal=User::where('users.activo','=','1')->count(); 
 
            array_push($tablaestadistica,(object)array("detalle"=>"Registro","ejercito"=>$userre3,"aerea"=>$userre4,"armada"=>$userre5,"total"=>$userretotal));

            $user3=User::join ('votacions','users.id','=','votacions.iduser')->where('users.activo','=','1')->where('users.idfuerza','=','3')->count();  
            $user4=User::join ('votacions','users.id','=','votacions.iduser')->where('users.activo','=','1')->where('users.idfuerza','=','4')->count();  
            $user5=User::join ('votacions','users.id','=','votacions.iduser')->where('users.activo','=','1')->where('users.idfuerza','=','5')->count();  
            $usertotal=User::join ('votacions','users.id','=','votacions.iduser')->where('users.activo','=','1')->count(); 
 
            array_push($tablaestadistica,(object)array("detalle"=>"Voto real","ejercito"=>$user3,"aerea"=>$user4,"armada"=>$user5,"total"=>$usertotal));

            $userno3=User::leftjoin('votacions','users.id','=','votacions.iduser')->whereNull('votacions.idvv')->where('users.activo','=','1')->where('users.idfuerza','=','3')->count();   
            $userno4=User::leftjoin('votacions','users.id','=','votacions.iduser')->whereNull('votacions.idvv')->where('users.activo','=','1')->where('users.idfuerza','=','4')->count();   
            $userno5=User::leftjoin('votacions','users.id','=','votacions.iduser')->whereNull('votacions.idvv')->where('users.activo','=','1')->where('users.idfuerza','=','5')->count();   
            $usernototal=User::leftjoin('votacions','users.id','=','votacions.iduser')->whereNull('votacions.idvv')->where('users.activo','=','1')->count();   
 
            array_push($tablaestadistica,(object)array("detalle"=>"Ausentismo","ejercito"=>$userno3,"aerea"=>$userno4,"armada"=>$userno5,"total"=>$usernototal));

            
        $votos_3_ejercito='';
        $votos_4_aerea='';
        $votos_5_armada='';

        $data_3_ejercito="{
            type: 'bar',
            data: {
              labels: ['Ejercito' ],
              datasets: [";
        $data_4_aerea="{
            type: 'bar',
            data: {
              labels: ['Aerea' ],
              datasets: [";
        $data_5_armada="{
            type: 'bar',
            data: {
              labels: ['Armada' ],
              datasets: [";
              $total_3_ejercito=0;
              $total_4_aerea=0;
              $total_5_armada=0;
        
         foreach($votaciones as $voto){ 



            $color=$this->bm_random_rgb();
                switch ($voto->idfuerza) {
                    case 3: 
                        $votos_3_ejercito.="{
                            label: '$voto->sigla',
                            backgroundColor: '$color',
                            data: [$voto->total],
                          },"; 
                          $total_3_ejercito+=$voto->total; 
                        break;
                    case 4:
                        $votos_4_aerea.="{
                            label: '$voto->sigla',
                            backgroundColor: '$color',
                            data: [$voto->total],
                          },"; 
                          $total_4_aerea+=$voto->total;
                        break;
                    case 5:
                        $votos_5_armada.="{
                            label: '$voto->sigla',
                            backgroundColor: '$color',
                            data: [$voto->total],
                          },"; 
                          $total_5_armada+=$voto->total;
                        break;
                } 
            }

            // cambia el vector para mostrar resultados de votacion
            $color1=$this->bm_random_rgb();
            $color2=$this->bm_random_rgb();
            $color3=$this->bm_random_rgb();
            $color4=$this->bm_random_rgb();
            $votos_3_ejercito=" {
                label: 'Registro',
                backgroundColor: '$color2',
                data: [$userre3],
              },{
                label: 'Voto real',
                backgroundColor: '$color3',
                data: [$user3],
              },{
                label: 'Ausentismo',
                backgroundColor: '$color4',
                data: [$userno3],
              }"; 
              $votos_4_aerea=" {
                label: 'Registro',
                backgroundColor: '$color2',
                data: [$userre4],
              },{
                label: 'Voto real',
                backgroundColor: '$color3',
                data: [$user4],
              },{
                label: 'Ausentismo',
                backgroundColor: '$color4',
                data: [$userno4],
              }"; 

              $votos_5_armada=" {
                label: 'Registro',
                backgroundColor: '$color2',
                data: [$userre5],
              },{
                label: 'Voto real',
                backgroundColor: '$color3',
                data: [$user5],
              },{
                label: 'Ausentismo',
                backgroundColor: '$color4',
                data: [$userno5],
              }"; 


            $data_3_ejercito.=$votos_3_ejercito."],
                            },
                            options: {
                            title: {
                                display: true,
                                text: 'Frentes - Ejercito',
                            },
                            tooltips: {
                                mode: 'index',
                                intersect: true,
                            },
                            responsive: true, 
                            plugins: {
                                datalabels: {
                                anchor: 'center',
                                align: 'center',
                                color: 'white',
                                font: {
                                    weight: 'normal',
                                },
                                },
                            }
                            },
                        }";
            $data_4_aerea.=$votos_4_aerea."],
                },
                options: {
                title: {
                    display: true,
                    text: 'Frentes - Aerea',
                },
                tooltips: {
                    mode: 'index',
                    intersect: true,
                },
                responsive: true, 
                plugins: {
                    datalabels: {
                    anchor: 'center',
                    align: 'center',
                    color: 'white',
                    font: {
                        weight: 'normal',
                    },
                    },
                }
                },
            }";
            $data_5_armada.=$votos_5_armada."],
                },
                options: {
                title: {
                    display: true,
                    text: 'Frentes - Armada',
                },
                tooltips: {
                    mode: 'index',
                    intersect: true,
                },
                responsive: true, 
                plugins: {
                    datalabels: {
                    anchor: 'center',
                    align: 'center',
                    color: 'white',
                    font: {
                        weight: 'normal',
                    },
                    },
                }
                },
            }";

 
            $datapie="{type:'doughnut',data:{labels:['January','February','March','April','May'],datasets:[{data:[50,60,70,180,190]}]}, options:{plugins:{doughnutlabel:{labels:[{text:'$userretotal',font:{size:20}},{text:'total'}]}}}}";

 
            $logo = Storage::path('fotos/logo.png');
            $logo64 = base64_encode(Storage::get('fotos/logo.png')); 
       $data=[
           'urlejercito' => $data_3_ejercito,
           'votos' => $votaciones,
           'tablaestadistica' => $tablaestadistica,
           'urlaerea' => $data_4_aerea,
           'urlarmada' => $data_5_armada,
           'foto'=>'data:'.mime_content_type($logo) . ';base64,' . $logo64, 
           't3' => $total_3_ejercito,
           't4' => $total_4_aerea,
           't5' => $total_5_armada ,
           'datapie' =>  $datapie ,
           'userretotal' => $userretotal 
        ];
     
        
          $pdf = PDF::loadView('pdf/reporte', $data); 
         return $pdf->stream('reporte.pdf');  
         // return $tablaestadistica;
    }
}
