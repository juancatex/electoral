<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Destinos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('par__destinos', function (Blueprint $table) {
            $table->increments('iddestino');
            $table->integer('idfuerza')->unsigned();
            $table->string('coddestino',10);
            $table->string('nomdestino',50); 
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
        Schema::dropIfExists('par__destinos');
    }
}
