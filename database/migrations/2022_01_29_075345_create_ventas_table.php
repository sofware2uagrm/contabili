<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->String('especificacion')->nullable();
            $table->String('sucursal')->nullable();
            $table->String('fecha')->nullable();
            $table->String('nroFactura')->nullable();
            $table->String('nroAutorizacion')->nullable();
            $table->String('estadoDeFactura')->nullable();
            $table->String('nit')->nullable();
            $table->String('razonSocial')->nullable();
            $table->String('importetotaldeVenta')->nullable();
            $table->String('ice')->nullable();
            $table->String('exportacionesExentas')->nullable();
            $table->String('ventasGrabadasaTasaCero')->nullable();
            $table->String('subtotal')->nullable();
            $table->String('descuento')->nullable();
            $table->String('importeDebitoFiscal')->nullable();
            $table->String('debitoFiscalIva')->nullable();
            $table->String('codigodeControl')->nullable();
            $table->String('contabilizado')->nullable();
            $table->String('cuentaDebe')->nullable();
            $table->String('nombreCuentaDebe')->nullable();
            $table->String('cuentaHaber')->nullable();
            $table->String('nombreCuentaHaber')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
