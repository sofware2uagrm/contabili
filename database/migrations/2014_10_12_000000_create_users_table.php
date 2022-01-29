<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');

            $table->bigInteger('fkidgrupousuario')->unsigned()->nullable();
            $table->bigInteger('x_idusuario')->unsigned()->nullable();

            $table->string('name', 150);
            $table->string('apellido', 250)->nullable();

            $table->string('email', 350);
            $table->string('login', 350);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->longText('imagen')->nullable();

            $table->text('ip')->nullable();

            $table->integer('intentos')->default(0);
            $table->integer('timewait')->default(0);

            $table->dateTime('lastlogin')->nullable();
            $table->dateTime('lastlogout')->nullable();

            $table->text('remembertoken')->nullable();
            $table->text('apitoken')->nullable();

            $table->date("x_fecha");
            $table->time("x_hora");
            $table->enum("isdelete", ["A", "N"])->default("A");
            $table->enum("estado", ["A", "N"])->default("A");

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
