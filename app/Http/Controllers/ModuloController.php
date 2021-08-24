<?php

namespace App\Http\Controllers;

use App\Models\Modulomodel;
use Illuminate\Http\Request;

class ModuloController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getmodulos(Request $request)
    {   
       if (!$request->ajax()) return redirect('/');

       
     }
}
