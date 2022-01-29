<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            
                $table->increments('idEmpresa');
                $table->string('logo')->nullable();
                $table->string('razonsocial');
                $table->string('licencia')->nullable();
                $table->string('nit');
                $table->string('telefono');
                $table->string('ciudad');
                $table->string('actividad')->nullable();
                $table->string('direccion')->nullable();
                $table->string('responsable')->nullable();
                $table->string('ci_responsable')->nullable();
                $table->string('sucursal')->nullable(); 
               $table->enum('estado',['activo','inactivo']);
                $table->integer('idUser')->unsigned()->nullable();
                $table->foreign('idUser')->on('users')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('empresas');
    }
}
