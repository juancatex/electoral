<?php

namespace App\Http\Controllers;

use App\Models\Rolmodel;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getrols(Request $request)
    {   
       if (!$request->ajax()) return redirect('/');
       return Rolmodel::select('idrol','descripcion')->where('activo','=','1')->where('idrol','!=','100')->orderBy('idrol', 'asc')->get(); 
    }
 
}
