<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos', function (Blueprint $table) {
            $table->increments('idcargo');
            $table->integer('idfuerza')->unsigned();   
            $table->string('nombrecargo',100); 
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
        Schema::dropIfExists('cargos');
    }
}
