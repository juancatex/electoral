<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () { 
    if(Auth::check()) 
      return view('home');
    else  
      return redirect()->route('login');
});
Route::get('/registro', function () {
 if(Auth::check()) 
  return view('home');
else  
  return view('registro');
});
Route::get('/dowapp', function () {
  return Storage::download('app.apk');
});
Route::get('/sucess', function () {
  if(Auth::check()) 
   return view('home');
 else  
 return redirect()->route('login')->with('status', 'Registro exitoso!');
 });
//Auth::routes(); 
Auth::routes(['reset' => false,'register' => false]); 
Route::get('/inicio', [App\Http\Controllers\HomeController::class, 'index'])->name('inicio');
Route::get('/getrols', [App\Http\Controllers\RolController::class, 'getrols']);
Route::get('/getvistas', [App\Http\Controllers\VistaController::class, 'getvistas']);
Route::post('/guardarpermisos', [App\Http\Controllers\RolvistaController::class, 'registrovistas']);
Route::post('/borrarpermisos', [App\Http\Controllers\RolvistaController::class, 'eliminavistas']);
Route::get('/getvistasRoles', [App\Http\Controllers\RolvistaController::class, 'getvistasRoles']);
Route::get('/buscasocio', [App\Http\Controllers\SocioController::class, 'buscasocio']);
Route::get('/buscasocioupdate', [App\Http\Controllers\AppMovil::class, 'buscasocioupdate']);
Route::get('/buscasocioupdateci', [App\Http\Controllers\AppMovil::class, 'buscasocioupdateci']);
Route::get('/buscasocioupdateci2', [App\Http\Controllers\AppMovil::class, 'buscasocioupdateci2']);
Route::get('/buscasocio2', [App\Http\Controllers\SocioController::class, 'buscasocio2']);
Route::get('/getdestinos', [App\Http\Controllers\AppMovil::class, 'getdestinos']);
Route::post('/registroUser', [App\Http\Controllers\AppMovil::class, 'registroUser']);
Route::get('/ppppppp', [App\Http\Controllers\AppMovil::class, 'ppppppp']);
Route::post('/asignarrol', [App\Http\Controllers\UserController::class, 'asignarrol']);
Route::get('/getuserRol', [App\Http\Controllers\UserController::class, 'getuserRol']); 
Route::post('/updatepass', [App\Http\Controllers\UserController::class, 'updatepass']);
Route::post('/desactivaruser', [App\Http\Controllers\UserController::class, 'desactivaruser']);
Route::post('/regfrente', [App\Http\Controllers\FrenteController::class, 'regfrente']);
Route::get('/getfrentes', [App\Http\Controllers\FrenteController::class, 'getfrentes']);
Route::get('/getfrentesVoto', [App\Http\Controllers\FrenteController::class, 'getfrentesVoto']);
Route::get('/getfuerzas', [App\Http\Controllers\FuerzasController::class, 'getfuerzas']);
Route::get('/getcargos', [App\Http\Controllers\CargoController::class, 'getcargos']);
Route::post('/desactivarcargo', [App\Http\Controllers\CargoController::class, 'desactivarcargo']);
Route::post('/regcargo', [App\Http\Controllers\CargoController::class, 'regcargo']);
Route::get('/getRequisito', [App\Http\Controllers\RequisitoController::class, 'getRequisito']);
Route::post('/desactivarRequisito', [App\Http\Controllers\RequisitoController::class, 'desactivarRequisito']);
Route::post('/regRequisito', [App\Http\Controllers\RequisitoController::class, 'regRequisito']);
Route::post('/regcandidato', [App\Http\Controllers\CandidatoController::class, 'regcandidato']);
Route::post('/desactivarcandidato', [App\Http\Controllers\CandidatoController::class, 'desactivarcandidato']); 
Route::get('/getCandidatos', [App\Http\Controllers\CandidatoController::class, 'getCandidatos']);
Route::get('/getCandidatosVoto', [App\Http\Controllers\CandidatoController::class, 'getCandidatosVoto']);
Route::get('/getCandidatoRequisitos', [App\Http\Controllers\CandidatoRequisitosController::class, 'getCandidatoRequisitos']);
Route::post('/regCandidatoRequisitos', [App\Http\Controllers\CandidatoRequisitosController::class, 'regCandidatoRequisitos']);
Route::post('/regobs', [App\Http\Controllers\FrentesObservadosController::class, 'regobs']);
Route::get('/getobs', [App\Http\Controllers\FrentesObservadosController::class, 'getobs']);
Route::post('/regconsolidacion', [App\Http\Controllers\FrenteController::class, 'regconsolidacion']);
Route::get('/gettime', [App\Http\Controllers\ParametroVotacionController::class, 'gettime']);
Route::post('/reginicio', [App\Http\Controllers\ParametroVotacionController::class, 'reginicio']);
Route::post('/regvoto', [App\Http\Controllers\VotacionController::class, 'regvoto']);
Route::post('/updateqrvoto', [App\Http\Controllers\VotacionController::class, 'updateqrvoto']);
Route::get('/getvotouser', [App\Http\Controllers\VotacionController::class, 'getvotouser']);
Route::get('/printvoto', [App\Http\Controllers\VotacionController::class, 'printvoto']);
Route::get('/printreporte', [App\Http\Controllers\VotacionController::class, 'printreporte']);
Route::post('/deletefrente', [App\Http\Controllers\FrenteController::class, 'deletefrente']);