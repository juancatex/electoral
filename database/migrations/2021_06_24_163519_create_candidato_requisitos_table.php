<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoRequisitosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato_requisitos', function (Blueprint $table) {
            $table->increments('idcanreq');
            $table->integer('idreq')->unsigned();  
            $table->integer('idcandidato')->unsigned();  
            $table->boolean('activo')->default(1);
            $table->timestamps();
            $table->foreign('idreq')->references('idreq')->on('requisitos');
            $table->foreign('idcandidato')->references('idcandidato')->on('candidatos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('candidato_requisitos');
    }
}
