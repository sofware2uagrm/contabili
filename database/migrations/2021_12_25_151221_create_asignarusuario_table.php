<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignarusuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignarusuario', function (Blueprint $table) {
            $table->id('idasignarusuario');

            $table->integer('fkidusers')->unsigned();
            $table->bigInteger('fkidgrupousuario')->unsigned();
            $table->bigInteger("x_idusuario")->unsigned()->nullable();

            $table->enum("habilitado", ["A", "N"])->default("A");

            $table->date("x_fecha");
            $table->time("x_hora");
            $table->enum("isdelete", ["A", "N"])->default("A");
            $table->enum("estado", ["A", "N"])->default("A");

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('fkidusers')->references('id')->on('users');
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
        Schema::dropIfExists('asignarusuario');
    }
}
