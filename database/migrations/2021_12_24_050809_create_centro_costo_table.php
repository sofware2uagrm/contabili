<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCentroCostoTable extends Migration
{

    public function up()
    {
        Schema::create('centro_costo', function (Blueprint $table) {
            $table->increments('idCentroCosto');

            $table->string('codigo')->nullable();
            $table->string('descripcion')->nullable();
            $table->integer('estado')->unsigned()->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('centro_costo');
    }
}
