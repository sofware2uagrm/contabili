<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('facturas', function (Blueprint $table) {
            $table->increments('idFactura');
            $table->string('nro_factura')->nullable();
            $table->string('nit_factura')->nullable();
            $table->string('proveedor')->nullable();
            $table->string('nroautorizacion')->nullable();
            $table->string('codcontrol')->nullable();
            $table->decimal('total_factura')->nullable();
            $table->decimal('ice')->nullable();
            $table->decimal('importes_excentos')->nullable();
            $table->decimal('descuentos')->nullable();
            $table->decimal('credito_fiscal')->nullable();
            
            $table->integer('idComprobanteCuentaDetalle')->unsigned()->nullable();

            $table->foreign('idComprobanteCuentaDetalle')->on('comprobante_cuenta_detalle')->references('idComprobanteCuentaDetalle')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('facturas');
    }
}
