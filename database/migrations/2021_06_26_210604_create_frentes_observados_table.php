<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrentesObservadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frentes_observados', function (Blueprint $table) {
            $table->increments('idobs');
            $table->integer('idfrente')->unsigned(); 
            $table->string('observacion')->nullable(); 
            $table->integer('iduser');    
            $table->boolean('activo')->default(1);
            $table->timestamps(); 
            $table->foreign('idfrente')->references('idfrente')->on('frentes');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('frentes_observados');
    }
}
