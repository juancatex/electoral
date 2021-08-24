<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Especialidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('par_especialidades', function (Blueprint $table) {
            $table->Increments('idespecialidad');
            $table->integer('idfuerza')->unsigned();
            $table->string('nomespecialidad',50);
            $table->string('abrvesp',20)->nullable();
            $table->boolean('activo')->default(1);
            $table->timestamps();
            $table->foreign('idfuerza')->references('idfuerza')->on('par_fuerzas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('par__destinos');
    }
}
