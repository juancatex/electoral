<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Models\User;
class UserController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
   
    public function asignarrol(Request $request)
    {
      if (!$request->ajax()) return redirect('/');  
        $user = User::findOrFail($request->iduser); 
        $user->idrol = $request->idrol; 
        $user->save();

    }

    public function getuserRol(Request $request)
    {
      if (!$request->ajax()) return redirect('/'); 
       return  User::select('users.papeleta','users.user','rol.descripcion','users.id') 
        ->join ('rol','users.idrol','=','rol.idrol') 
        ->where('users.activo','=','1')  
        ->where('users.idrol','!=','3')  
        ->orderBy('users.idrol', 'asc')
        ->where('users.idrol','!=','100')->get(); 

    }
    public function updatepass(Request $request)
    {
      if (!$request->ajax()) return redirect('/');  
        $user = User::findOrFail($request->iduser); 
        $user->password = bcrypt($request->pass);
        $user->save();

    }
    public function desactivaruser(Request $request)
    {
      if (!$request->ajax()) return redirect('/');  
        $user = User::findOrFail($request->iduser); 
        $user->activo = 0;
        $user->save();

    }
}
