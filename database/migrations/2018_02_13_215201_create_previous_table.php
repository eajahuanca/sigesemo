<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreviousTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pre_sigechr',200);
            $table->string('pre_nota',200);
            $table->string('pre_nota_nombre',200);
            $table->boolean('pre_nota_check')->default(false);
            $table->string('pre_ficha',200);
            $table->string('pre_ficha_nombre',200);
            $table->boolean('pre_ficha_check')->default(false);
            $table->string('pre_legal',200);
            $table->string('pre_legal_nombre',200);
            $table->boolean('pre_legal_check')->default(false);
            $table->boolean('pre_estado')->default(false);
            $table->text('pre_obs')->nullable();
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
        Schema::dropIfExists('previous');
    }
}
