<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormularioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formulario', function (Blueprint $table) {
            $table->id('idformulario');

            $table->bigInteger('fkidformulariopadre')->unsigned()->nullable();
            $table->integer("x_idusuario")->unsigned()->nullable();

            $table->string('descripcion', 250);
            $table->string('nota', 350)->nullable();

            $table->enum("activo", ["A", "N"])->default("A");

            $table->date("x_fecha");
            $table->time("x_hora");
            $table->enum("isdelete", ["A", "N"])->default("A");
            $table->enum("estado", ["A", "N"])->default("A");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fkidformulariopadre')->references('idformulario')->on('formulario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('formulario');
    }
}
