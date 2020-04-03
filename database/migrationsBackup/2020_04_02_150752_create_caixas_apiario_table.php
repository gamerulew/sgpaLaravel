<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaixasApiarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caixas_apiario', function (Blueprint $table) {
            $table->id();
            $table->integer('ninhos')->unsigned();
            $table->integer('melgueiras')->unsigned();
            $table->integer('enxames')->unsigned();
            $table->integer('ninhosNovos')->unsigned();
            $table->integer('melgueirasNovas')->unsigned();
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
        Schema::dropIfExists('caixas_apiario');
    }
}
