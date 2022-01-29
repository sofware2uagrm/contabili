<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrupousuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupousuario', function (Blueprint $table) {
            $table->id('idgrupousuario');

            $table->integer("x_idusuario")->unsigned()->nullable();

            $table->string('descripcion', 150);
            $table->string('nota', 300)->nullable();

            $table->enum("issuperadmin", ["A", "N"])->default("N");
            $table->enum("isadmin", ["A", "N"])->default("N");

            $table->date("x_fecha");
            $table->time("x_hora");
            $table->enum("isdelete", ["A", "N"])->default("A");
            $table->enum("estado", ["A", "N"])->default("A");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grupousuario');
    }
}
