<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_plan', function (Blueprint $table) {
            $table->increments('idCuentaPlan');
            
            $table->string('codigo')->nullable();
            $table->string('descripcion');
            $table->integer('estado')->unsigned()->nullable();
            $table->integer('nivel')->unsigned()->nullable();
            
            $table->integer('idPlanCuentaPadre')->unsigned()->nullable();
            $table->integer('idCuentaPlanTipo')->unsigned();

            $table->foreign('idCuentaPlanTipo')->on('cuenta_plan_tipo')->references('idCuentaPlanTipo')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuenta_plan');
    }
}
