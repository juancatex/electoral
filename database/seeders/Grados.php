<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Grados extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('par_grados')->insert(['nomgrado'=>'SGTO.INL.','abrev'=>'SGI.']);
        DB::table('par_grados')->insert(['nomgrado'=>'SGTO.2DO.','abrev'=>'SG2.']);
        DB::table('par_grados')->insert(['nomgrado'=>'SGTO.1RO.','abrev'=>'SG1.']);
        DB::table('par_grados')->insert(['nomgrado'=>'SOF.INL.','abrev'=>'SOI.']);
        DB::table('par_grados')->insert(['nomgrado'=>'SOF.2DO.','abrev'=>'SO2.']);
        DB::table('par_grados')->insert(['nomgrado'=>'SOF.1RO.','abrev'=>'SO1.']);
        DB::table('par_grados')->insert(['nomgrado'=>'SOF.MY.','abrev'=>'SOM.']);
        DB::table('par_grados')->insert(['nomgrado'=>'SOF.MTRE.','abrev'=>'SMT.']); 
        DB::table('par_grados')->insert(['nomgrado'=>'SGTO.INCL.','abrev'=>'SGI.']); 
        DB::table('par_grados')->insert(['nomgrado'=>'SOF.INCL.','abrev'=>'SOI.']); 
        DB::table('par_grados')->insert(['nomgrado'=>'SOF.INC.','abrev'=>'SOI.']); 
    }
}
