<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApiariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apiarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome')->unique();
            $table->date('dataVisita');
            $table->string('localizacao');
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
        Schema::dropIfExists('apiarios');
    }
}
