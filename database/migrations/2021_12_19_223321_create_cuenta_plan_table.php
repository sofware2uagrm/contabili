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
            $table->integer('id_flujo_efectivo')->unsigned()->nullable();
            $table->integer('id_rubro_ajuste')->unsigned()->nullable();
            $table->integer('idMoneda')->unsigned()->nullable();
            $table->foreign('idCuentaPlanTipo')->on('cuenta_plan_tipo')->references('idCuentaPlanTipo');
            $table->foreign('id_flujo_efectivo')->on('flujo_efectivo')->references('id_flujo_efectivo');
            $table->foreign('id_rubro_ajuste')->on('rubro_ajuste')->references('id_rubro_ajuste');
            $table->foreign('idMoneda')->on('monedas')->references('idMoneda');
      
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
