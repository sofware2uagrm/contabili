<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobanteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comprobante', function (Blueprint $table) {
            $table->increments('idComprobante');
            $table->string('codigo')->nullable();
            $table->string('referidoa')->nullable();
            $table->string('numeroDocumento')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('canceladoa')->nullable();
            $table->string('glosa')->nullable();
            $table->decimal('tc');
            $table->date('fecha')->default(date('Y-m-d H:i:s'));
            $table->integer('estado')->unsigned()->default(0);


           
            
            $table->integer('idMoneda')->unsigned()->nullable();
          
            $table->integer('idComprobanteTipo')->unsigned()->nullable();

            $table->integer('idEmpresa')->unsigned()->nullable();

            $table->integer('idUser')->unsigned()->nullable();
            $table->integer('idBanco')->unsigned()->nullable();
            $table->integer('idTipoTransaccion')->unsigned()->nullable();
            $table->integer('idPeriodo')->unsigned()->nullable();
            $table->integer('idTipoPago')->unsigned()->nullable();


            $table->foreign('idBanco')->on('bancos')->references('idBanco')->onDelete('cascade');
            $table->foreign('idTipoTransaccion')->on('tipo_transaccion')->references('idTipoTransaccion')->onDelete('cascade');
            $table->foreign('idPeriodo')->on('periodo')->references('idPeriodo')->onDelete('cascade');
            $table->foreign('idTipoPago')->on('tipo_pago')->references('idTipoPago')->onDelete('cascade');            
            $table->foreign('idMoneda')->on('monedas')->references('idMoneda')->onDelete('cascade');
            $table->foreign('idComprobanteTipo')->on('comprobante_tipo')->references('idComprobanteTipo')->onDelete('cascade');
            $table->foreign('idEmpresa')->on('empresas')->references('idEmpresa')->onDelete('cascade');
            $table->foreign('idUser')->on('users')->references('id')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comprobante');
    }
}
