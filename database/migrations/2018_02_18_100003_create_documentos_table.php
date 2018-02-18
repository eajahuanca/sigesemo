<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cus',100)->unique();
            $table->string('pre_sigechr',200)->unique();
            $table->string('pre_depto',50);
            $table->integer('identidad')->unsigned();
            $table->string('pre_nota',200)->nullable();
            $table->string('pre_nota_nombre',200)->nullable();
            $table->boolean('pre_nota_check')->default(false);
            $table->string('pre_ficha',200)->nullable();
            $table->string('pre_ficha_nombre',200)->nullable();
            $table->boolean('pre_ficha_check')->default(false);
            $table->string('pre_legal',200)->nullable();
            $table->string('pre_legal_nombre',200)->nullable();
            $table->boolean('pre_legal_check')->default(false);
            $table->enum('pre_estado',['ACEPTADO','PENDIENTE','RECHAZADO']);
            $table->text('pre_obs')->nullable();
            $table->integer('idregistra')->unsigned();
            $table->integer('idactualiza')->unsigned();
            $table->timestamps();

            $table->foreign('identidad')->references('id')->on('entidades');
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
        Schema::dropIfExists('documentos');
    }
}
