<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    { 
        $this->call(Init::class);
        $this->call(TipoSocio::class);
        $this->call(Escalafones::class);
        $this->call(Grados::class);
        $this->call(Fuerzass::class);
        $this->call(Destinos::class);
        $this->call(Especialidades::class);
        $this->call(Departamentos::class);
        $this->call(Estadocivil::class);
        $this->call(Modulos::class);
        $this->call(Vistas::class);
        $this->call(Roles::class);
        $this->call(Users::class);
        $this->call(SociosSed::class);
        $this->call(Vistarol::class);
    }
}
