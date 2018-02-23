<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pro_sigla')->unique();
            $table->string('pro_nombre')->unique();
            $table->boolean('pro_estado')->default(true);
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
        Schema::dropIfExists('programas');
    }
}
