<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMunicipiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('municipios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mun_depto');
            $table->string('mun_municipio');
            $table->text('mun_descripcion')->nullable();
            $table->boolean('mun_estado')->default(true);
            $table->text('mun_obs')->nullable();
            $table->integer('idregistra')->unsigned();
            $table->integer('idactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('idregistra')->references('id')->on('users');
            $table->foreign('idactualiza')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
