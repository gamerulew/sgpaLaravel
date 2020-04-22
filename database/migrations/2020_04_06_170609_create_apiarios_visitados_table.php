<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiariosVisitadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apiarios_visitados', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('apiario');
            $table->bigInteger('visita');
            $table->integer('melgueirasAdd')->unsigned();
            $table->integer('ninhosAdd')->unsigned();
            $table->integer('melgueirasRmv')->unsigned();
            $table->integer('ninhosRmv')->unsigned();
            $table->timestamps();
            $table->foreign('apiario')->references('id')->on('apiarios');
            $table->foreign('visita')->references('id')->on('visita_apiario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apiarios_visitados');
    }
}
