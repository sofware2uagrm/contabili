<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasEspecificasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas_especificas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo_cuenta')->nullable();
            $table->integer('codigo_nivel')->nullable();

            $table->string('cuenta_especifica')->nullable();
            $table->string('tipo_cuenta')->nullable();
            $table->integer('idCuentaPlan')->unsigned()->nullable();
            $table->foreign('idCuentaPlan')->on('cuenta_plan')->references('idCuentaPlan')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cuentas_especificas');
    }
}
