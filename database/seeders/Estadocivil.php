<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Estadocivil extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('par_estadocivil')->insert(['nomestadocivil'=>'Soltero']);
        DB::table('par_estadocivil')->insert(['nomestadocivil'=>'Casado']);
        DB::table('par_estadocivil')->insert(['nomestadocivil'=>'Divorciado']);
        DB::table('par_estadocivil')->insert(['nomestadocivil'=>'Viudo']);
    }
}
