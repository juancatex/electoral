<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) { 
            $table->bigIncrements('id');
            $table->integer('idrol')->unsigned()->default(3); 
            $table->string('papeleta',8)->unique()->nullable()->default(null);  
            $table->string('email')->unique()->nullable()->default(null);
            $table->string('user')->nullable()->default(null); 
            $table->integer('dep')->default(1); 
            $table->integer('idfuerza')->unsigned();  
            $table->string('password');  
            $table->boolean('activo')->default(1); 
            $table->boolean('nuevouser')->default(1); 
            $table->timestamps(); 
            $table->foreign('idrol')->references('idrol')->on('rol');
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
        Schema::dropIfExists('users');
    }
}
