<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rol')->insert(['idrol'=>1,'descripcion'=>'Administrador']);
        DB::table('rol')->insert(['idrol'=>2,'descripcion'=>'Comite Electoral']);
        DB::table('rol')->insert(['idrol'=>3,'descripcion'=>'Socio']);
        DB::table('rol')->insert(['idrol'=>4,'descripcion'=>'Fiscalización']);
        DB::table('rol')->insert(['idrol'=>100,'descripcion'=>'Super Administrador']);
    }
}
