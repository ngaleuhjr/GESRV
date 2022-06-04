<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRendezvousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('rendezvouses', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('medecin');
            $table->foreign('medecin')->references('id')->on('medecins');
            $table->unsignedInteger('user');
            $table->foreign('user')->references('id')->on('users');
            $table->text('libelle');
            $table->date('date');
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
        Schema::dropIfExists('rendezvouses');
    }
}
