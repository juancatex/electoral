<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Vistarol extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>1,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>2,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>3,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>4,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>5,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>6,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>7,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
        DB::table('rolvistas')->insert(['idrol'=>100,'idvista'=>8,'iduser'=>1,'permisos'=>'{"agr":1,"mod":1,"eli":1}']); 
    }
}
