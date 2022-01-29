<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmaReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firma_reportes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_reporte');
            $table->string('firma1')->nullable();
            $table->string('firma2')->nullable();
            $table->string('firma3')->nullable();
            $table->integer('opcion_firma_enteresado');
            $table->integer('activo_opcion')->default(0);
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
        Schema::dropIfExists('firma_reportes');
    }
}
