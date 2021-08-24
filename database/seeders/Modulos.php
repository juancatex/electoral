<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Modulos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modulos')->insert(['idmodulo'=>1,'icono'=>'admin_panel_settings','descripcion'=>'Administrador']);
        DB::table('modulos')->insert(['idmodulo'=>2,'icono'=>'print','descripcion'=>'Reportes']);
        DB::table('modulos')->insert(['idmodulo'=>3,'icono'=>'rule','descripcion'=>'Proceso Electoral']);
        DB::table('modulos')->insert(['idmodulo'=>4,'icono'=>'manage_accounts','descripcion'=>'Fiscalización']);
    }
}
