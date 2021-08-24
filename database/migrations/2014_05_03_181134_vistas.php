<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vistas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vistas', function (Blueprint $table) { 
            $table->increments('idvista'); 
            $table->integer('idmodulo')->unsigned();
            $table->string('nombre')->nullable(); 
            $table->string('template')->nullable(); 
            $table->boolean('activo')->default(1); 
            $table->integer('orden');
            $table->timestamps();
            $table->foreign('idmodulo')->references('idmodulo')->on('modulos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vistas');
    }
}
