<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipoSocio extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('par__tiposocios')->insert(['nomtiposocio'=>'Servicio Activo']);
        DB::table('par__tiposocios')->insert(['nomtiposocio'=>'Servicio Pasivo']);        
        DB::table('par__tiposocios')->insert(['nomtiposocio'=>'Retiro Voluntario/Obligado']);
        DB::table('par__tiposocios')->insert(['nomtiposocio'=>'Fallecido']);
    }
}
