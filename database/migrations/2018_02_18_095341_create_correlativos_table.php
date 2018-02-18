<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCorrelativosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('correlativos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cor_cite')->unique();
            $table->integer('cor_valor')->unsigned();
            $table->integer('cor_gestion')->unsigned();
            $table->string('cor_depto',50)->nullable();
            $table->text('cor_descripcion')->nullable();
            $table->boolean('cor_estado')->default(true);
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
        Schema::dropIfExists('correlativos');
    }
}
