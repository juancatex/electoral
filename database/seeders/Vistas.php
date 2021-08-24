<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Vistas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vistas')->insert(['idvista'=>1,'idmodulo'=>1,'orden'=>1,'nombre'=>'Asignación de Vistas','template'=>'asignacionvista']);  
        DB::table('vistas')->insert(['idvista'=>2,'idmodulo'=>1,'orden'=>2,'nombre'=>'Asignación de rol','template'=>'asignacionrol']);  
        DB::table('vistas')->insert(['idvista'=>3,'idmodulo'=>3,'orden'=>1,'nombre'=>'Registro de cargos','template'=>'regcargos']);  
        DB::table('vistas')->insert(['idvista'=>4,'idmodulo'=>3,'orden'=>2,'nombre'=>'Registro de requisitos','template'=>'regrequisitos']);  
        DB::table('vistas')->insert(['idvista'=>5,'idmodulo'=>3,'orden'=>3,'nombre'=>'Registro de frentes','template'=>'regfrentes']);  
        DB::table('vistas')->insert(['idvista'=>6,'idmodulo'=>3,'orden'=>4,'nombre'=>'Registro de candidatos','template'=>'regcandidatos']);   
        DB::table('vistas')->insert(['idvista'=>7,'idmodulo'=>3,'orden'=>5,'nombre'=>'Consolidar frente','template'=>'revfrente']);   
        DB::table('vistas')->insert(['idvista'=>8,'idmodulo'=>3,'orden'=>6,'nombre'=>'Proceso de votación','template'=>'initvotacion']);   
    }
}
