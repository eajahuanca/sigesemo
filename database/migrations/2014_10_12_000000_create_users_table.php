<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('us_nombre',50);
            $table->string('us_paterno',50);
            $table->string('us_materno',50);
            $table->string('us_carnet',10);
            $table->string('us_expedido',12);
            $table->string('us_telefono',12);
            $table->string('us_genero',15);
            $table->integer('idcargo')->unsigned();
            $table->integer('idprofesion')->unsigned();
            $table->integer('us_ingresoasis')->default(0);
            $table->dateTime('us_fechaingreso')->nullable();
            $table->string('us_imagen',200);
            $table->string('us_nombreimagen',200);
            $table->string('us_cuenta',100)->unique();
            $table->boolean('us_estado')->default(true);
            $table->text('us_observaciones')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
