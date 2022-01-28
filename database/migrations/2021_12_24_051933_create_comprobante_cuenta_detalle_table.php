<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobanteCuentaDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobante_cuenta_detalle', function (Blueprint $table) {
            $table->increments('idComprobanteCuentaDetalle');
            $table->string('codigo')->nullable();
            $table->string('glosa')->nullable();
            $table->decimal('debe');
            $table->decimal('haber');

            $table->integer('idCuentaPlan')->unsigned()->nullable();
            $table->integer('idComprobante')->unsigned()->nullable();
          
            $table->foreign('idCuentaPlan')->on('cuenta_plan')->references('idCuentaPlan')->onDelete('cascade');
            $table->foreign('idComprobante')->on('comprobante')->references('idComprobante')->onDelete('cascade');

        });
    }

    public function down()
    {
        Schema::dropIfExists('comprobante_cuenta_detalle');
    }
}
