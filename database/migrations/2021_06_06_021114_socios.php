<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Socios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socios', function (Blueprint $table) {
            $table->bigIncrements('idsocio');
            $table->string('codsocio',15)->nullable();
            $table->string('numpapeleta',8)->index();
            $table->string('nombre',50);
            $table->string('apaterno',50);
            $table->string('amaterno',50);  
            $table->string('carnetmilitar',20)->nullable();
            $table->string('ci',12); 
            $table->integer('iddepartamentoexpedido')->unsigned();  
            $table->date('fechanacimiento')->nullable();  
            $table->integer('idgrado')->unsigned();           
            $table->integer('idfuerza')->unsigned();           
            $table->integer('iddestino')->unsigned();            
            $table->integer('idescalafon')->unsigned();
            $table->integer('idespecialidad')->unsigned()->nullable();
            $table->integer('idestadocivil')->unsigned();
            $table->string('direcciondomicilio',255)->nullable();
            $table->string('telfijo',50)->nullable();
            $table->string('telcelular',50)->nullable();
            $table->string('email',50)->nullable(); 
            $table->string('observaciones',255)->nullable();
            $table->integer('idtiposocio')->unsigned(); 
            $table->string('rutafoto',100)->nullable();   
            $table->boolean('activo')->default(1);   
            $table->timestamps();

            $table->foreign('idgrado')->references('idgrado')->on('par_grados'); 
            $table->foreign('idfuerza')->references('idfuerza')->on('par_fuerzas');
            $table->foreign('idescalafon')->references('idescalafon')->on('par_escalafones');
            $table->foreign('idespecialidad')->references('idespecialidad')->on('par_especialidades');
            $table->foreign('idestadocivil')->references('idestadocivil')->on('par_estadocivil');
            $table->foreign('iddepartamentoexpedido')->references('iddepartamento')->on('par_departamentos');
            $table->foreign('idtiposocio')->references('idtiposocio')->on('par__tiposocios');
			$table->foreign('iddestino')->references('iddestino')->on('par__destinos');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socios');
    }
}
