<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaPlanTipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_plan_tipo', function (Blueprint $table) {
            $table->increments('idCuentaPlanTipo');
            $table->string('descripcion');
            $table->integer('nivel')->unsigned()->nullable();
            $table->integer('estado')->unsigned()->nullable();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('cuenta_plan_tipo');
    }
}
