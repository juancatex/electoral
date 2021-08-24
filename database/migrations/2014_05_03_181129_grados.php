<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Grados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('par_grados', function (Blueprint $table) {
            $table->increments('idgrado'); 
            $table->string('nomgrado',10);
            $table->string('abrev',5)->nullable();
            $table->boolean('activo')->default(1);
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('par_grados');
    }
}
