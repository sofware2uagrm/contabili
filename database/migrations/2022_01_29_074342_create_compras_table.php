<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->String('especificacion')->nullable();
            $table->String('fecha')->nullable();
            $table->String('sucursal')->nullable();
            $table->String('nit')->nullable();
            $table->String('proveedor')->nullable();
            $table->String('razonSocial')->nullable();
            $table->String('nroFactura')->nullable();
            $table->String('NumeroDUI')->nullable();
            $table->String('nroAutorizacion')->nullable();
            $table->String('importeTotaldeLaCompra')->nullable();
            $table->String('subTotal')->nullable();
            $table->String('importeNoSujetoACreditoFiscal')->nullable();
            $table->String('descuento')->nullable();
            $table->String('importeBaseParaCreditoFiscal')->nullable();
            $table->String('creditoFiscalIva')->nullable();
            $table->String('codigodeControl')->nullable();
            $table->String('tipoCompra')->nullable();
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
        Schema::dropIfExists('compras');
    }
}
