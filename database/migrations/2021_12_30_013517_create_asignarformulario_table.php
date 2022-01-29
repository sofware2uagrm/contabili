<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarformularioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignarformulario', function (Blueprint $table) {
            $table->id('idasignarformulario');

            $table->bigInteger('fkidformulario')->unsigned();
            $table->bigInteger('fkidgrupousuario')->unsigned();
            $table->bigInteger("x_idusuario")->unsigned()->nullable();

            $table->enum("visible", ["A", "N"])->default("A");

            $table->date("x_fecha");
            $table->time("x_hora");
            $table->enum("isdelete", ["A", "N"])->default("A");
            $table->enum("estado", ["A", "N"])->default("A");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fkidformulario')->references('idformulario')->on('formulario');
            $table->foreign('fkidgrupousuario')->references('idgrupousuario')->on('grupousuario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('asignarformulario');
    }
}
