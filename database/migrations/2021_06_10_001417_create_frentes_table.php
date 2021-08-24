<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frentes', function (Blueprint $table) {
            $table->increments('idfrente');
            $table->string('nombre')->unique()->nullable()->index();
            $table->string('sigla')->unique()->nullable();
            $table->integer('idfuerza')->unsigned();  
            $table->string('descripcion')->nullable();
            $table->string('propuestas')->nullable();
            $table->string('rutafoto',100)->nullable(); 
            $table->boolean('consolidado')->default(0);     
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
        Schema::dropIfExists('frentes');
    }
}
