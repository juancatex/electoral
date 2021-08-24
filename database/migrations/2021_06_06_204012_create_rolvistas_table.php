<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolvistasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rolvistas', function (Blueprint $table) {
            $table->bigIncrements('idrv');
            $table->integer('idrol')->unsigned();            
            $table->integer('idvista')->unsigned(); 
            $table->string('permisos')->nullable();
            $table->boolean('activo')->default(1); 
            $table->bigInteger('iduser')->unsigned();
            $table->timestamps();
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idrol')->references('idrol')->on('rol');
            $table->foreign('idvista')->references('idvista')->on('vistas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rolvistas');
    }
}
