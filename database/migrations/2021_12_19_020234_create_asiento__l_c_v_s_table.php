<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsientoLCVSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asiento__l_c_v_s', function (Blueprint $table) {
            $table->id();
            $table->integer('generar_asientos');
            $table->integer('credito_Fiscal');
            $table->integer('IT');
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
        Schema::dropIfExists('asiento__l_c_v_s');
    }
}
