<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidatos', function (Blueprint $table) {
            $table->increments('idcandidato');
            $table->bigInteger('idsocio')->unsigned();   
            $table->string('nombresocio',100)->nullable();   
            $table->integer('idfrente')->unsigned();   
            $table->integer('idcargo')->unsigned();  
            $table->string('rutafoto',100)->nullable(); 
            $table->boolean('activo')->default(1);
            $table->timestamps(); 
            $table->foreign('idsocio')->references('idsocio')->on('socios');
            $table->foreign('idfrente')->references('idfrente')->on('frentes');
            $table->foreign('idcargo')->references('idcargo')->on('cargos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidatos');
    }
}
