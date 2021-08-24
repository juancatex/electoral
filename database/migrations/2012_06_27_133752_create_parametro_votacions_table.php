<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateParametroVotacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parametro_votacions', function (Blueprint $table) {
            $table->increments('idvo');
            $table->string('gestion')->default(DB::select('select YEAR(NOW()) as anio')[0]->anio);

            $table->timestamp('inicio')->nullable();
            $table->integer('iduser_inicio')->nullable();     
            $table->string('observacion_inicio')->nullable(); 

            $table->timestamp('final')->nullable();
            $table->integer('iduser_final')->nullable();  
            $table->string('observacion_final')->nullable(); 
              
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
        Schema::dropIfExists('parametro_votacions');
    }
}
