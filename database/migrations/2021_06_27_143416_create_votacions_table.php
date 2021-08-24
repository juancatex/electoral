<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVotacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('votacions', function (Blueprint $table) {
            $table->increments('idvv');
            $table->integer('idvo')->unsigned(); 
            $table->integer('idfrente')->unsigned(); 
            $table->bigInteger('iduser')->unsigned()->unique()->index();
            $table->timestamp('date')->useCurrent();
            $table->string('pk',100)->nullable(); 
            $table->string('qr',100)->nullable(); 
            $table->timestamps();
            $table->foreign('idvo')->references('idvo')->on('parametro_votacions');
            $table->foreign('iduser')->references('id')->on('users');
            $table->foreign('idfrente')->references('idfrente')->on('frentes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('votacions');
    }
}
